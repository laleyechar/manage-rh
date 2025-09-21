<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche Agent</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            line-height: 1.4;
        }
        .title {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 15px;
        }
        .field {
            display: inline-block;
            width: 46.5%;
            vertical-align: top;
            margin-bottom: 10px;
            margin-right: 3%;
        }
        .label {
            font-weight: bold;
            display: block;
            margin-bottom: 3px;
        }
        .value {
            background-color: #e5e7eb;
            padding: 6px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            color: #374151;
        }
        .full-width {
            width: 100%;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #d1d5db;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f3f4f6;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="title">Fiche d'informations de l'agent</div>
    <br>

    <div class="section">
        <div class="field">
            <span class="label">Nom :</span>
            <div class="value">{{ $employe->nom_Agent }}</div>
        </div>
        <div class="field">
            <span class="label">Prénom :</span>
            <div class="value">{{ $employe->prenom_Agent }}</div>
        </div>
        <div class="field">
            <span class="label">Matricule :</span>
            <div class="value">{{ $employe->matricule_Agent }}</div>
        </div>
        <div class="field">
            <span class="label">Téléphone :</span>
            <div class="value">{{ $employe->tel_Agent }}</div>
        </div>
        <div class="field">
            <span class="label">Date de naissance :</span>
            <div class="value">{{ $employe->date_naissance }}</div>
        </div>
        <div class="field">
            <span class="label">Lieu de naissance :</span>
            <div class="value">{{ $employe->lieu_naissance }}</div>
        </div>
        <div class="full-width">
            <span class="label">Situation matrimoniale :</span>
            <div class="value">{{ $employe->situation_matrimoniale }}</div>
        </div>
        <div class="full-width">
            <span class="label">Poste actuel :</span>
            <div class="value">{{ $employe->poste_Agent }}</div>
        </div>
    </div>

    <div class="section">
        <span class="label">Historique des postes :</span>
        <table>
            <thead>
                <tr>
                    <th>Ancien poste</th>
                    <th>Date promotion</th>
                    <th>Nouveau poste</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employe->promotions as $promotion)
                    <tr>
                        <td>{{ $promotion->Ancien_poste }}</td>
                        <td>{{ $promotion->Date_promotion }}</td>
                        <td>{{ $promotion->Nouveau_poste }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <span class="label">Grade actuel :</span>
        <div class="value">{{ $employe->grade_Agent }}</div>
    </div>

    <div class="section">
        <span class="label">Historique des grades :</span>
        <table>
            <thead>
                <tr>
                    <th>Ancien grade</th>
                    <th>Date promotion</th>
                    <th>Nouveau grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employe->promotions as $promotion)
                    <tr>
                        <td>{{ $promotion->Ancien_grade }}</td>
                        <td>{{ $promotion->Date_promotion }}</td>
                        <td>{{ $promotion->Nouveau_grade }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="field">
            <span class="label">Date de prise de service :</span>
            <div class="value">{{ $employe->date_prise_service }}</div>
        </div>
        <div class="field">
            <span class="label">Date de départ à la retraite :</span>
            <div class="value">{{ $employe->date_depart_retraite }}</div>
        </div>
        <div class="field">
            <span class="label">N° affiliation CNSS :</span>
            <div class="value">{{ $employe->num_affiliation_cnss }}</div>
        </div>
        <div class="field">
            <span class="label">Type de contrat :</span>
            <div class="value">{{ $employe->statut_Agent }}</div>
        </div>
        <div class="field">
            <span class="label">Statut de l'agent :</span>
            <div class="value">{{ $employe->statut }}</div>
        </div>
    </div>

</body>
</html>
