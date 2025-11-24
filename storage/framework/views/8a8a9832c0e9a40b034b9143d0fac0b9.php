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

<body class="bg-gray-50">
    <div
        class="flex flex-col md:flex-row max-w-6xl mx-auto mt-10 shadow-xl h-auto md:h-[80vh] rounded-xl overflow-hidden">
        <!-- Image à gauche -->

        <div class="flex  flex-col items-center justify-center p-6 md:p-10">
            <div class="w-full max-w-sm md:max-w-xl">
                <div class="flex flex-col gap-6">
                    <div class="  bg-card text-card-foreground ">
                        <div class="">
                            <?php if(session('success')): ?>
                                <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>
                            <form class="p-6 md:p-8" method="POST" action="<?php echo e(route('login.post')); ?>">
                                <?php echo csrf_field(); ?>
                                <?php if($errors->any()): ?>
                                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                                        <p class="font-bold">Error</p>
                                        <ul class="list-disc pl-5">
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <div class="flex flex-col gap-6">
                                    <div class="flex flex-col items-center text-center">
                                        <h1 class="text-2xl font-bold">Content de vous revoir</h1>
                                        <p class="text-balance text-muted-foreground">Connectez-vous à votre compte.</p>
                                    </div>
                                    <div class="grid gap-2">
                                        <label for="email" class="text-sm font-semibold leading-none">Email</label>
                                        <input name="email" id="email" type="email" placeholder="m@example.com"
                                            required
                                            class="flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50" />
                                    </div>
                                    <div class="grid gap-2">
                                        <div class="flex items-center">
                                            <label for="password"
                                                class="text-sm font-semibold leading-none">Password</label>
                                        </div>
                                        <input name="password" id="password" type="password" required
                                            class="flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50" />
                                    </div>
                                    <button type="submit"
                                        class="inline-flex h-9 items-center justify-center whitespace-nowrap rounded-md text-white px-4 py-2 text-sm font-medium bg-[#5e72e4] text-primary-foreground shadow transition-colors hover:bg-[#5e72e4]/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 w-full">
                                        Connexion
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-balance text-center text-xs text-muted-foreground">
                        En cliquant sur Continuer, vous acceptez nos <a href="#"
                            class="underline underline-offset-4 hover:text-primary">Conditions d'utilisation</a> et <a
                            href="#" class="underline underline-offset-4 hover:text-primary">politique de
                            confidentialité</a>.
                    </div>
                </div>
            </div>
        </div>
        <div class="md:w-1/2 w-full h-64 md:h-full bg-left bg-no-repeat bg-cover"
            style="background-image: url('<?php echo e(asset('images/image4.jpg')); ?>');">
        </div>
    </div>
</body>

</html>




<?php /**PATH C:\Users\Sarah\Downloads\MyProject\resources\views/login.blade.php ENDPATH**/ ?>