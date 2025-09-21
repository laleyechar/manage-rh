<?php

namespace App\Console\Commands;

use App\Models\Agent;
use Illuminate\Console\Command;

class MettreAJourRetraites extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mettre-a-jour-retraites';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $agentRetraite = Agent::whereDate('date_depart_retraite', '<=', now())
            ->where('statut', '!=', 'Retraité')
            ->update(['statut' => 'Retraité']);
        if ($agentRetraite->poste) {
            $agentRetraite->poste->agent_id = null;
            $agentRetraite->poste->save();
        }
        $this->info("$agentRetraite agent(s) mis à jour comme retraité(s).");
    }
}
