<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des agents actifs</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 5px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>Liste des agents actifs</h2>
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
            <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                   
                    <td><?php echo e($agent->matricule_Agent); ?></td>
                    <td><?php echo e($agent->nom_Agent); ?></td>
                    <td><?php echo e($agent->prenom_Agent); ?></td>
                    <td><?php echo e($agent->poste->libelle_poste); ?></td>
                    <td><span
                                            class="inline break-word">
                                                <p
                                                    class="">
                                                    Catégorie <span
                                                        class="font-semibold text-blue-600"><?php echo e($agent->categorie); ?></span>,
                                                    Classe <span
                                                        class="font-semibold text-green-600"><?php echo e($agent->classe); ?></span>,
                                                    Échelon <span
                                                        class="font-semibold text-purple-600"><?php echo e($agent->echelon); ?></span>
                                                </p>
                                            </span></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\Users\Sarah\Downloads\MyProject\resources\views/agentsactifspdf.blade.php ENDPATH**/ ?>