<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/icone[1].png')); ?>" />
    <title>HRManager</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>

<body class="bg-gray-100">
    
    
    <div
        class="flex flex-col md:flex-row max-w-6xl mx-auto mt-10 shadow-xl h-auto md:h-[80vh] rounded-xl overflow-hidden">
        <!-- Image à gauche -->
        <div class="md:w-1/2 w-full h-64 md:h-full bg-left bg-no-repeat bg-cover"
            style="background-image: url('<?php echo e(asset('images/image3.jpg')); ?>');">
        </div>

        <!-- Section droite avec boutons -->
        <div class="md:w-1/2 w-full flex items-center justify-center bg-slate-50 p-6">
            <div class="text-center space-y-6">
                <h1 class="text-3xl font-bold text-gray-800">Bienvenue sur HRManager</h1>
                <p class="text-gray-600 max-w-md mx-auto">Gérez efficacement les carrières, absences, congés et
                    formations du personnel municipal.</p>
                <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-6">
                    <a href="<?php echo e(route('login')); ?>">
                        <button
                        class="py-3 px-8 shadow-md bg-blue-500 text-white font-bold rounded-full hover:scale-105 transition-transform duration-300">
                        Se connecter
                    </button>
                    </a>
                    <a href="<?php echo e(route('register')); ?>">
                        <button
                        class="py-3 px-8 shadow-md bg-white font-bold rounded-full hover:scale-105 transition-transform duration-300">
                        S'inscrire
                    </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php /**PATH C:\Users\Sarah\Downloads\MyProject\resources\views/accueil.blade.php ENDPATH**/ ?>