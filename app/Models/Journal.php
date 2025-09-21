<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $table = 'activity_logs';

    protected $fillable = ['user_id', 'user_type', 'action', 'details'];

    public static function log($action, $model = null)
    {
        if (auth()->check()) {
            $details = null;

            // Générer des détails automatiques si un modèle est fourni
            if ($model) {
                $modelType = class_basename($model); // ex: User, Post, etc.
                $primaryKey = $model->getKey(); // ID
                $details = "$modelType (ID: $primaryKey)";

                // Ajouter des infos spécifiques selon le type d'action
                if ($action === 'création') {
                    $details = "Création de $details";
                } elseif ($action === 'modification') {
                    $details = "Modification de $details";
                } elseif ($action === 'suppression') {
                    $details = "Suppression de $details";
                }
            }
            $role = auth()->user()->getRoleNames()->first() ?? 'inconnu';

            self::create([
                'user_id' => auth()->id(),
                'user_type' => $role,
                'action' => $action,
                'details' => $details,
            ]);
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
