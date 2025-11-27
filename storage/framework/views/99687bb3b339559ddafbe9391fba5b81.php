<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/icone[1].png')); ?>" />
    <title>HRManager</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-7è00 leading-default bg-gray-50 text-slate-600">
    <div class="absolute w-full bg-[#5e72e4] dark:hidden min-h-75"></div>
    <!-- sidenav  -->
    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
        aria-expanded="false">
        <div class="h-25">
            <a class="block px-14 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href=""
                target="_blank">
                <img src="<?php echo e(asset('images/logob.png')); ?>"
                    class="inline max-h-15 max-w-full transition-all duration-200 ml-4 ease-nav-brand"
                    alt="main_logo" />
            </a>
        </div>

        <hr
            class="border-0 h-px my-4 mx-4 bg-gradient-to-r from-gray-100 via-black/60 to-gray-200 dark:from-transparent dark:via-white dark:to-transparent" />


        <div class="items-center block w-auto max-h-screen h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full ">
                    <a class="p-2 dark:text-white dark:opacity-80 py-3 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors "
                        href="<?php echo e(route('site')); ?>">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Tableau de bord</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="p-2 dark:text-white dark:opacity-80 py-3 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="<?php echo e(route('liste')); ?>">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Liste du Personnel</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="p-2 dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="<?php echo e(route('afficher.fichier')); ?>">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 text-purple-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>

                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Gestion des dossiers</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="p-2 dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="<?php echo e(route('formations')); ?>">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Planification des
                            formations</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="p-2 dark:text-white dark:opacity-80 py-3 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="<?php echo e(route('promotions')); ?>">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 3.75v16.5M2.25 12h19.5M6.375 17.25a4.875 4.875 0 0 0 4.875-4.875V12m6.375 5.25a4.875 4.875 0 0 1-4.875-4.875V12m-9 8.25h16.5a1.5 1.5 0 0 0 1.5-1.5V5.25a1.5 1.5 0 0 0-1.5-1.5H3.75a1.5 1.5 0 0 0-1.5 1.5v13.5a1.5 1.5 0 0 0 1.5 1.5Zm12.621-9.44c-1.409 1.41-4.242 1.061-4.242 1.061s-.349-2.833 1.06-4.242a2.25 2.25 0 0 1 3.182 3.182ZM10.773 7.63c1.409 1.409 1.06 4.242 1.06 4.242S9 12.22 7.592 10.811a2.25 2.25 0 1 1 3.182-3.182Z" />
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Enregistrer les
                            promotions</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class=" p-2 dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="<?php echo e(route('Conges')); ?>">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text--500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m4 4V3m-7 4h14a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V13a2 2 0 012-2z" />
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Gestion des congés</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="p-2 bg-[#5e72e4]/10 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
                        href="<?php echo e(route('Services')); ?>">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z"   />
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Gestion des
                            structures</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="p-2 dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors "
                        href="<?php echo e(route('Poste')); ?>">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Gestion des
                            postes</span>
                    </a>
                </li>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->hasRole('admin')): ?>
                        <hr
                            class="border-0 h-px mx-4 bg-gradient-to-r from-gray-100 via-black/60 to-gray-200 dark:from-transparent dark:via-white dark:to-transparent" />

                        <li class="mt-0.5 w-full">
                            <a class="p-2 dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                href="<?php echo e(route('admin.users.index')); ?>">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>

                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Ajouter
                                    utilisateurs</span>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="p-2 dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                href="<?php echo e(route('journal')); ?>">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                    </svg>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Journalisation</span>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="p-2 dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                href="<?php echo e(route('agents.supprimes')); ?>">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM4 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 10.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                    </svg>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Agents
                                    supprimés</span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </aside>

    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- Navbar -->
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="text-white opacity-50" href="javascript:;">Pages</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                            aria-current="page"></li>
                    </ol>
                    <h6 class="mb-0 font-bold text-white capitalize"></h6>
                </nav>
                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">
                        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                            <form action="<?php echo e(route('search')); ?>" method="get" class="">
                                <a href="" id="barreCentrale"
                                    class="flex border border-gray-300 bg-white rounded-lg ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-7  z-20 flex-auto dark:bg-slate-850 dark:text-white   pt-2  text-gray-500 transition-all ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                    <input type="text" onclick="" type="text"
                                        class="caret-transparent pointer-events-none select-none cursor-pointer text-sm  focus:outline-none relative  -ml-px block min-w-0 flex-auto   dark:bg-slate-850 dark:text-white  py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500  "
                                        placeholder="Rechercher..." />
                                </a>
                            </form>

                        </div>
                    </div>

                    <ul class="pl-7 flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                        <li class="flex items-center text-white">
                            <button id="btnuser" onclick="afficherMenu()">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" id="btnuser" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>

                            </button>
                            <div id="userMenu"
                                class="hidden absolute top-4 right-0 mt-10 w-48 bg-white border border-gray-100 rounded-md shadow-lg z-50">
                                <!-- Connecté -->
                                <a href="<?php echo e(route('afficherProfil')); ?>"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    <i class="fas fa-user mr-2"></i> Mon profil
                                </a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form method="POST" action=<?php echo e(route('logout')); ?>>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                        <i class="fas fa-right-from-bracket mr-2"></i> Déconnexion
                                    </button>
                                </form>
                            </div>
                            <script>
                                function afficherMenu() {
                                    const menu = document.getElementById('userMenu');
                                    menu.classList.toggle('hidden');
                                }

                                // Fermer en cliquant en dehors
                                document.addEventListener('click', function(e) {
                                    const btnuser = document.getElementById('btnuser');
                                    const menu = document.getElementById('userMenu');
                                    if (!btnuser.contains(e.target) && !menu.contains(e.target)) {
                                        menu.classList.add('hidden');
                                    }
                                });
                            </script>
                        </li>
                        <li class="flex items-center pl-4 xl:hidden">
                            <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                                sidenav-trigger>
                                <div onclick="toggleMenu()" class="w-4.5 overflow-hidden" id="toggleMenu">
                                    <i
                                        class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i
                                        class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <div id="overlayRecherche" class="fixed inset-0 bg-gray-600 opacity-50 hidden z-40"></div>
        <div id="barreSecond"
            class="hidden fixed left-1/2 transform -translate-x-1/2 top-20 z-50 bg-white rounded-xl w-full max-w-xl h-full overflow-y-auto max-h-90 bg-white rounded-xl mt-7 z-50">
            <div class="flex  shadow-lg w-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 mt-2 ml-2 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input type="text" id="searchInput" class="w-full p-2 rounded-lg outline-none"
                    placeholder="Rechercher..." />
            </div>

            <div id="searchResults" class="  bg-white rounded-b-xl   max-h-80 overflow-y-auto z-50">
                <div class="p-3 font-bold text-xs">Résultats</div>
                <ul id="resultsList" class="hover:text-gray-700"></ul>
            </div>
        </div>
        <div id="overlayRecherche" class="fixed inset-0 bg-gray-600 opacity-50 hidden z-40"></div>
        <div id="barreSecond"
            class="hidden fixed left-1/2 transform -translate-x-1/2 top-20 z-50 bg-white rounded-xl w-full max-w-xl  bg-white rounded-xl mt-7 z-50">
            <div class="flex  shadow-lg w-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 mt-2 ml-2 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input type="text" id="searchInput" class="w-full p-2 rounded-lg outline-none"
                    placeholder="Rechercher..." />
            </div>

            <div id="searchResults" class="  bg-white rounded-b-xl   max-h-80 overflow-y-auto z-50">
                <div class="p-3 font-bold text-xs">Résultats</div>
                <ul id="resultsList" class="hover:text-gray-700"></ul>
            </div>

        </div>
        <?php if($errors->any()): ?>
            <div class="m-5 mb-4 p-4 shadow-lg rounded-lg bg-red-100 text-red-700">
                <strong>Erreur(s) détectée(s) :</strong>
                <ul class="mt-2 list-disc list-inside">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="p-6 bg-white rounded-lg shadow-md mt-10 mr-5 ml-5">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-700">Liste des structures</h2>
                <a href="" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md"
                    id="btn_ajout">
                    + Ajouter
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-[#5e72e4] p-10 text-white text-left text-sm uppercase">
                            <th class="pl-10 py-2">Libellé</th>
                            <th class=" py-2">Description</th>
                            <th class=" py-2">Responsable</th>
                            <th class=" py-2">Poste(s)</th>
                            <th class=" py-2">Statut</th>
                            <th class=" py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gray-300">
                                <td class="py-4 text-left">
                                    <div class="flex space-x-2 items-center">
                                        <button onclick="togglePostes(<?php echo e($service->id); ?>)"
                                            class="text-blue-600 hover:text-blue-900 focus:outline-none"
                                            title="Voir les postes">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5 cursor-pointer text-gray ransition-transform duration-700 ease-in-out transform"
                                                id="icon-<?php echo e($service->id); ?>">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                            </svg>
                                        </button>
                                        <span><?php echo e($service->libelle); ?></span>
                                    </div>
                                </td>
                                <td class="py-4"><?php echo e($service->description); ?></td>
                                <td class="py-4"><?php echo e($service->responsable); ?></td>
                                <td class="py-4"><?php echo e($service->postes_count); ?></td>
                                <td class="py-4">
                                    <?php if($service->statut === 'Actif'): ?>
                                        <span class=" text-green-800 text-xs font-semibold px-2 py-1 ">Actif</span>
                                    <?php else: ?>
                                        <span class=" text-red-800 text-xs font-semibold px-2 py-1 ">Inactif</span>
                                    <?php endif; ?>
                                </td>

                                <td class="flex py-3  text-sm text-center text-gray-900 space-x-5">
                                    <button class="text-blue-500 hover:text-blue-700"
                                        onclick="openUpdateform(<?php echo e($service->id); ?>, '<?php echo e(addslashes($service->libelle)); ?>', '<?php echo e(addslashes($service->description)); ?>')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="size-6 cursor-pointer hover:text-blue-600"
                                            title="Modifier le fichier">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>
                                    <form action="<?php echo e(route('delete.Service', $service->id)); ?>" method="POST"
                                        onsubmit="return confirm('Voulez-vous vraiment supprimer cet employé ?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6 cursor-pointer hover:text-red-600" id="butSupprimer">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <tr id="postes-<?php echo e($service->id); ?>" class="hidden bg-gray-50">
                                <td colspan="6" class="p-4">
                                    <table class=" bg-white w-full text-sm text-left border-gray-300 border-b">
                                        <thead class="bg-gray-100 text-xs uppercase">
                                            <tr>
                                                <th class="px-6 py-3">Libellé</th>
                                                <th class="px-6 py-3">Description</th>
                                                <th class="px-6 py-3">Agent affecté</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $service->postes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr class="">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        <?php echo e($poste->libelle_poste); ?>

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        <?php echo e($poste->description_poste); ?>

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        <?php echo e($poste->agent ? $poste->agent->nom_Agent . ' ' . $poste->agent->prenom_Agent : 'Non attribué'); ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="3"
                                                        class="px-6 py-3 text-center text-sm text-gray-500">
                                                        Aucun poste pour cette structure.
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>
            </div>

        </div>
        <div class="mt-4">
            <?php echo e($services->links()); ?> 

        </div>
        </div>

        <div id="over" class="fixed inset-0 bg-gray-600 opacity-50 hidden"></div>
        <div id="formService" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
            <form action="<?php echo e(route('creerService')); ?>" method="POST"
                class="relative bg-white rounded-lg p-10 max-h-[80vh] max-w-full w-full sm:w-[30em] lg:w-[40em] overflow-auto">
                <?php echo csrf_field(); ?>
                <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Ajouter une structure</h2>
                <button type="button" id="fermerformService"
                    class="absolute top-2 right-2 text-red-500 hover:text-gray-800 text-xl font-bold">
                    &times;
                </button>
                <!-- Libellé du service -->
                <div class="mb-4">
                    <label for="libelle" class="block text-sm font-medium text-gray-700">Libellé</label>
                    <input type="text" id="libelle" name="libelle"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm"
                        value="<?php echo e(old('libelle')); ?>" required>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="3"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm" required><?php echo e(old('description')); ?></textarea>
                </div>

                <!-- Responsable -->
                <div class="mb-4">
                    <label for="responsable" class="block text-sm font-medium text-gray-700">Responsable</label>
                    <select name="responsable" id="responsable"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-sm">
                        <option value="}">-- Sélectionner un agent --</option>
                        <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($agent->nom_Agent); ?> <?php echo e($agent->prenom_Agent); ?>">
                                <?php echo e(old('responsable', $service->responsable) == $agent->nom_Agent . '' . $agent->prenom_Agent ? 'selected' : ''); ?>

                                <?php echo e($agent->nom_Agent); ?> <?php echo e($agent->prenom_Agent); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Statut -->
                <div class="mb-6">
                    <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
                    <select id="statut" name="statut"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm"
                        required>
                        <option value="Actif" <?php echo e(old('statut') == 'Actif' ? 'selected' : ''); ?>>Actif</option>
                        <option value="Inactif" <?php echo e(old('statut') == 'Inactif' ? 'selected' : ''); ?>>Inactif</option>
                    </select>
                </div>

                <div class="text-center block text-sm font-medium text-gray-700 ">
                    <button type="submit"
                        class="rounded bg-sky-600 mt-3 py-3 px-4 text-sm text-white data-[hover]:bg-sky-500 data-[hover]:data-[active]:bg-sky-700">Soumettre</button>
                </div>
            </form>
        </div>

        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Modale -->
            <div class="fixed inset-0 bg-gray-600 opacity-50 hidden z-40" id="updateService<?php echo e($service->id); ?>"
                onclick="closeUpdateForm(<?php echo e($service->id); ?>)">
            </div>
            <div class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
                id="update_formulaire<?php echo e($service->id); ?>">
                <form action="<?php echo e(route('modifier.Service', ['id' => $service->id])); ?>" method="POST"
                    enctype="multipart/form-data"
                    class="relative bg-white rounded-lg p-10 max-h-[80vh] max-w-full w-full sm:w-[30em] lg:w-[40em] overflow-auto">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <input type="hidden" name="id" id="serviceId<?php echo e($service->id); ?>"
                        value="<?php echo e($service->id); ?>">
                    <fieldset class="space-y-1">
                        <button type="button" onclick="fermerformService(<?php echo e($service->id); ?>)"
                            class="absolute top-2 right-2 text-red-500 hover:text-gray-800 text-xl font-bold">
                            &times;
                        </button>
                        <div class="text-center">
                            <legend class="text-lg mb-3 font-bold">Remplissez le formulaire</legend>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label for="libelle" class="block text-sm font-medium text-gray-700">Libellé</label>
                                <input type="text" id="libelle<?php echo e($service->id); ?>" name="libelle"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm"
                                    value="<?php echo e(old('libelle')); ?>" required>
                            </div>
                        </div>
                        <div>
                            <label for="description"
                                class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description<?php echo e($service->id); ?>" name="description" rows="3"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm" required><?php echo e(old('description')); ?></textarea>
                        </div>
                        <div>
                            <label for="responsable"
                                class="block text-sm font-medium text-gray-700">Responsable</label>
                            <select name="agent_id" id="agent_id"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-sm">
                                <option value="">-- Sélectionner un agent --</option>
                                <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($agent->id); ?>"><?php echo e($agent->nom_Agent); ?>

                                        <?php echo e($agent->prenom_Agent); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div>
                            <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
                            <select id="statut" name="statut"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm"
                                required>
                                <option value="Actif" <?php echo e(old('statut') == 'Actif' ? 'selected' : ''); ?>>Actif</option>
                                <option value="Inactif" <?php echo e(old('statut') == 'Inactif' ? 'selected' : ''); ?>>Inactif
                                </option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="rounded bg-sky-600 mt-3 py-3 px-4 text-sm text-white hover:bg-sky-500 active:bg-sky-700">
                                Soumettre
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>

            <script>
                function openUpdateform(id, libelle, description) {
                    // Remplir les champs du formulaire avec les valeurs reçues
                    document.getElementById('serviceId' + id).value = id;
                    document.getElementById('libelle' + id).value = libelle;
                    document.getElementById('description' + id).value = description;

                    // Ouvrir la modale
                    document.getElementById('update_formulaire' + id).classList.remove('hidden');
                    document.getElementById('updateService' + id).classList.remove('hidden');
                }
                function fermerformService(id) {
                    document.getElementById('update_formulaire' + id).classList.add('hidden');
                    document.getElementById('updateService' + id).classList.add('hidden');
                }
            </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <script>
            const formService = document.getElementById('formService')
            const btn_ajout = document.getElementById('btn_ajout')
            const over = document.getElementById('over')
            const fermerformPoste = document.getElementById('fermerformPoste')


            btn_ajout.addEventListener("click", () => {
                event.preventDefault()
                formService.classList.remove('hidden')
                over.classList.remove('hidden')
            })
            fermerformPoste.addEventListener("click", () => {
                formService.classList.add('hidden')
                over.classList.add('hidden')
            })

            function togglePostes(serviceId) {
                const row = document.getElementById('postes-' + serviceId);
                const icon = document.getElementById('icon-' + serviceId);

                // Toggle l’icône en rotation
                icon.classList.toggle('rotate-440');

                // Si caché, on montre avec effet
                if (row.classList.contains('hidden')) {
                    row.classList.remove('hidden');
                    row.style.maxHeight = row.scrollHeight + 'px';
                } else {
                    // Si visible, on cache avec transition douce
                    row.style.maxHeight = '0';
                    setTimeout(() => row.classList.add('hidden'), 300);
                }
            }
        </script>
        <script>
            function toggleMenu() {
                const menu = document.querySelector('aside');
                const isExpanded = menu.getAttribute('aria-expanded') === 'true';

                // Alterner l'état de aria-expanded
                menu.setAttribute('aria-expanded', !isExpanded);

                // Ajouter/retirer la classe de translation pour ouvrir/fermer le menu
                if (isExpanded) {
                    menu.classList.add('-translate-x-full');

                    menu.classList.remove('translate-x-0', 'ml-10');

                } else {
                    menu.classList.remove('-translate-x-full');
                    menu.classList.add('translate-x-0', 'ml-10');
                }
            }
        </script>
<?php /**PATH C:\Users\Sarah\Downloads\MyProject\resources\views/service.blade.php ENDPATH**/ ?>