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
    <table
        style="width: 90%; max-width: 900px; border-collapse: collapse; margin: 3rem auto 0 auto; margin-left: -20px;">
        <tr>
            <!-- Côté gauche -->
            <td style="width: 50%; vertical-align: top;">
                <table>
                    <tr>
                        <td style="vertical-align: top;">
                            <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('images/republique.jpg'))) }}"
                                style="height: 100px; width: auto; margin-right: 2px; vertical-align: top;  margin-top: -20px;">
                        </td>
                        <td style="vertical-align: top; text-align: left;">
                            <p style="margin: 0; font-weight: bold; white-space: nowrap;">MAIRIE DE PORTO-NOVO</p>

                            <!-- Bande tricolore -->
                            <div style="width: 120px; height: 7px; margin: 5px 0; overflow: hidden;">
                                <div style="background-color: green; width: 40%; height: 100%; float: left;"></div>
                                <div style="background-color: yellow; width: 20%; height: 100%; float: left;"></div>
                                <div style="background-color: red; width: 40%; height: 100%; float: left;"></div>
                            </div>

                            <p style="margin: 0; clear: both; white-space: nowrap;">REPUBLIQUE DU BENIN</p>
                        </td>
                    </tr>
                </table>
            </td>

            <!-- Côté droit -->
            <td style="width: 50%; vertical-align: top; text-align: right; margin-left: 20px;">
                <table>
                    <tr>
                        <td style="text-align: right; vertical-align: top;">
                            <p style="margin: 0; white-space: nowrap;">01 BP 36 Porto-Novo</p>
                            <p style="margin: 0; white-space: nowrap;">Tel : 60939596</p>
                            <p style="margin: 0; white-space: nowrap;">IFU : 6201000032106</p>
                            <p style="margin: 0; white-space: nowrap;">Email : contactportonovo@mairie.bj</p>
                        </td>
                        <td style="vertical-align: top;">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/LOGO_porto-novo.png'))) }}"
                                style="height: 150px; width: auto; vertical-align: top; margin-top: -30px; margin-left: -30px;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
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
        des congés administratifs <span style="font-weight:bold;">n</span>° &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;du relative
        aux titres de congés
        administratifs :</p>

    @foreach ($anneesChoisies as $key => $annee)
        <p style="text-indent: 2em;">
            <span style="font-weight:bold;">- n°&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> du
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $annee }}
            @if ($key < count($anneesChoisies) - 1)
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
