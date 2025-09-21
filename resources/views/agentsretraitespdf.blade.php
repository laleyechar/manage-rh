<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des agents à la retraite</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 5px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>Liste des agents à la retraite</h2>
    <table>
        <thead>
            <tr>
                
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Poste</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agents as $agent)
                <tr>
                   
                    <td>{{ $agent->matricule_Agent }}</td>
                    <td>{{ $agent->nom_Agent }}</td>
                    <td>{{ $agent->prenom_Agent }}</td>
                    <td>{{ $$agent->poste->libelle_poste }}</td>
                    <td><p
                                                    class="">
                                                    Catégorie <span
                                                        class="font-semibold text-blue-600">{{ $agent->categorie }}</span>,
                                                    Classe <span
                                                        class="font-semibold text-green-600">{{ $agent->classe }}</span>,
                                                    Échelon <span
                                                        class="font-semibold text-purple-600">{{ $agent->echelon }}</span>
                                                </p></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
