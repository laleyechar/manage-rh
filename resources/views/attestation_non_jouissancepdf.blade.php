<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attestation de jouissance</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }

        .header,
        .footer {
            text-align: center;
        }

        .content {
            margin-top: 20px;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
        }
    </style>
</head>

<body> <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/troisenun.png'))) }}"
        alt="Logo" style="width: 100%; height: 100px; margin-left:auto; margin-right:auto; margin-bottom: 1rem">
    @php
        use Carbon\Carbon;
        Carbon::setLocale('fr');
        $date = Carbon::now();
    @endphp <p style="text-align: right; margin-right: 5rem;">
        Cotonou, {{ $date->translatedFormat('d F Y') }}</p>
    <p style="font-weight:bold; margin-top: 1.25rem">N°&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; /MCOT/SE/DAAF/SRH/DGC</p>
    <h1
        style="text-transform:uppercase; text-decoration:underline; text-align:center; font-size:1rem; font-weight:bold; margin-top: 2.5rem; margin-bottom: 2.5rem;">
        Autorisation de non jouissance des
        congés administratifs</h1>
    <p style="text-indent: 2em; line-height: 2; text-align: justify;">Le sécrétaire Exécutif de la mairie de
        Cotonou autorise monsieur {{ $agent->nom_Agent }} {{ $agent->prenom_Agent }}, en poste
        {{ $agent->poste?->description_poste ?? 'Poste non défini' }}, bénéficiaire de l'attestation de non jouissance
        des congés administratifs <span style="font-weight:bold;">n</span>° &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;du relative aux titres de congés
        administratifs :</p>

    @foreach ($anneesChoisies as $key => $annee)
        <p style="text-indent: 2em;">
            <span style="font-weight:bold;">- n°&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> du
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $annee }}
            @if ( $key < count($anneesChoisies) - 1 )
                 et
            @endif
        </p>
    @endforeach

    <p style="line-height: 2; text-align:justify">à jouir de ses congés administratifs pour une durée de
        ({{ count($anneesChoisies) }})
        mois, soit {{ $dureeTotale }} jours consécutifs aux titres des années @if (count($anneesChoisies) > 0)
            @foreach ($anneesChoisies as $key => $annee)
                @if ($key == count($anneesChoisies) - 1 && $key != 0)
                    et {{ $annee }}
                @elseif($key == 0)
                    {{ $annee }}
                @else
                    , {{ $annee }}
                @endif
            @endforeach
        @endif
    </p>
    <p style="margin-top:2.5rem;"> <span style="text-transform:uppercase; font-weight:bold;">Date de depart :
        </span>{{ $dateDebut ? $dateDebut->translatedFormat('d F Y') : 'Non défini' }} </p>
    <p><span style="text-transform:uppercase; font-weight:bold; font-size: 1rem;">Date d'expiration : </span>
        {{ $datefin ? $datefin->translatedFormat('d F Y') : 'Non défini' }}</p>
    <p><span style="text-transform:uppercase; font-weight:bold; font-size: 1rem;">Date de reprise de service :</span>
        {{ $datefin->addDay(1)->translatedFormat('d F Y') }}</p>
    <div style="margin-top: 5rem;">
        <div style="float: left; text-align: left;">
            <p style="text-decoration:underline; font-weight:bold; text-transform:uppercase; font bold">Ampliations</p>
            <p style="text-transform:uppercase; font-size:0.75rem; line-height:1rem">se .........................01</p>
            <p style="text-transform:uppercase; font-size:0.75rem; line-height:1rem">daaf ....................01</p>
            <p style="text-transform:uppercase; font-size:0.75rem; line-height:1rem">srh/dgc .............01</p>
            <p style="font-size:0.75rem; line-height:1rem">Interessé(e) ..........01</p>
        </div>
        <div style="float: right; text-align: right;">
            <p style="text-decoration:underline; font-weight:bold;">Anges Paterne AMOUSSOUGA</p>
        </div>
    </div>
</body>

</html>
