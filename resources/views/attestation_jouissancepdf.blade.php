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

<body>
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/troisenun.png'))) }}"
        alt="Logo" style="width: 100%; height: 100px; margin-left:auto; margin-right:auto; margin-bottom: 1rem">
    @php
        use Carbon\Carbon;
        Carbon::setLocale('fr');
        $date = Carbon::now();
        $dateDebut = Carbon::parse($congeAnnuel->Date_debut);
        $dateFin = Carbon::parse($congeAnnuel->Date_Fin);
        $dateReprise = $dateFin->addDay();
    @endphp
    <p style="text-align: right; margin-right: 5rem;">Cotonou, {{ $date->translatedFormat('d F Y') }}</p>
    <p style="font-weight: bold; margin-top: 1.25rem;">N° /MCOT/SE/DAAF/SRH/DGC</p>
    <h1
        style="text-transform: uppercase; text-decoration: underline; text-align:center; font-size: 1rem; font-weight: bold; margin-top: 2.5rem; margin-bottom: 2.5rem;">
        Autorisation de jouissance des congés administratifs</h1>
    <p style="text-indent: 2em; line-height: 2; text-align:justify">Le sécrétaire Exécutif de la mairie de Cotonou
        autorise monsieur {{ $agent->nom_Agent }} {{ $agent->prenom_Agent }}, en poste de la mairie de Cotonou,
        bénéficiaire du titre de congés administratifs n° du , à jouir de ses congés administratifs pour une duréz <span
            style="font-weight: bold;">d'un (01) mois, soit trente (30) jours consécutifs</span> au titre de l'année </p>
    <p style="margin-top: 2.5rem;"><span style="text-transform:uppercase; font-weight:bold;">Date de depart :</span>  {{$congeAnnuel ? $dateDebut->translatedFormat('d F Y') : 'Non défini'}}</p>
    <p><span style="text-transform:uppercase; font-weight:bold;">Date d'expiration : </span>{{$congeAnnuel ? $dateFin->translatedFormat('d F Y') : 'Non défini'}}</p>
    <p><span style="text-transform:uppercase; font-weight:bold;">Date de reprise de service :</span> {{$dateReprise->translatedFormat('d F Y')}} </p>
    <div style="display: flex; justify-content: space-between; margin-top: 5rem;">
        <div style="float: left; text-align: left;">
            <p style="text-decoration:underline; font-weight: bold; text-transform:uppercase; font weight: bold;">Ampliations</p>
            <p style="text-transform:uppercase; font-size:0.75rem; line-height:1rem;">se .........................01</p>
            <p style="text-transform:uppercase; font-size:0.75rem; line-height:1rem;">daaf ....................01</p>
            <p style="text-transform:uppercase; font-size:0.75rem; line-height:1rem;">srh/dgc .............01</p>
            <p style="font-size:0.75rem; line-height:1rem;">Interessé(e) ..........01</p>
        </div>
        <div style="float: right; text-align: right;">
            <p style="text-decoration:underline; font-weight: bold;">Anges Paterne AMOUSSOUGA</p>
        </div>
    </div>
</body>

</html>
