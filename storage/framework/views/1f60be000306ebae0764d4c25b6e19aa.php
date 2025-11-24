<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/icone[1].png')); ?>" />
    <title>HRManager</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css' rel='stylesheet' />

    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <style>
        .fc-prev-button,
        .fc-next-button {
            background-image: linear-gradient(to top left, #5e72e4, #5e72e4) !important;
            color: white !important;
            border: none !important;
            border-radius: 0.5rem !important;
            padding: 0.4rem 0.8rem !important;
            font-weight: 600;
            box-shadow: none !important;
            outline: none !important;
            transition: opacity 0.3s;
        }

        /* Effet au survol */
        .fc-prev-button:hover,
        .fc-next-button:hover {
            opacity: 0.85;
        }


        .fc {
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
        }

        .fc-toolbar-title {
            font-weight: 00;
            font-size: 1.25rem;
            color: #1f2937;
            /* Gray-800 */
        }

        .fc-button {
            background-color: #3b82f6;
            /* Blue-500 */
            border: none;
            border-radius: 0.5rem;
            padding: 0.25rem 0.75rem;
            color: white;
            cursor: pointer;
            transition: background 0.3s;
        }

        .fc-button:hover {
            background-color: #2563eb;
            /* Blue-600 */
        }

        .fc-daygrid-event {
            background-color: transparent !important;
            /* Enlève le fond */
            color: #1f2937;
            /* Gray-800 */
            border: none;
            /* Enlève la bordure */
            border-radius: 0.375rem;
            /* Coins arrondis */
            padding: 2px 4px;
            /* Ajuste le padding */
            font-size: 0.85rem;
            /* Police plus petite */
            font-weight: 500;
            /* Poids de la police */
        }
    </style>


</head>

<body
    class="overflow-hidden m-0 font-sans text-base antialiased font-normal dark:bg-slate-7è00 leading-default bg-gray-50 text-slate-600">
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
                    alt="main_logo"  />
            </a>
        </div>

        <hr
            class="my-4 border-0 h-px mx-4 bg-gradient-to-r from-gray-100 via-black/60 to-gray-200 dark:from-transparent dark:via-white dark:to-transparent" />

        <div class=" items-center block w-auto max-h-screen h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full ">
                    <a class=" p-2 bg-[#5e72e4]/10 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
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
                                stroke-width="1.5" stroke="currentColor" class="size-6">
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
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>

                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Gestion des
                            documents</span>
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
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Planificaton des formations
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
                    <a class="p-2 dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
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
                    <a class="p-2 dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
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
                            services</span>
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

    <main
        class=" overflow-y-scroll relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
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
                            <button id="btnuser" onclick="afficherMenu()" class="cursor-pointer">
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

            <div id="searchResults" class="  bg-white rounded-b-xl    overflow-y-auto z-50">
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
        <div class="flex flex-wrap -mx-3 px-6 py-6 mx-auto">
            <!-- card1 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/3 sm:flex-none xl:mb-0 xl:w-1/3">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full  px-3">
                                <div>
                                    <p
                                        class="mb-0 font-sans text-sm text-center font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                        Total agents : <span
                                            class="font-bold dark:text-white text-center text-orange-500"><?php echo e($agents->count()); ?></span>
                                    </p>
                                    <h5 class=""></h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12  text-center rounded-full bg-gradient-to-tl from-blue-500 to-violet-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-6  m-3 leading-none text-center text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card2 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/3 sm:flex-none xl:mb-0 xl:w-1/3">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full  px-3">
                                <div>
                                    <p
                                        class=" font-sans text-center text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                        Congés en attente: <span
                                            class="font-bold text-center text-emerald-500"><?php echo e($nombretotal); ?></span>
                                    </p>
                                    <h5 class=" "></h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-full bg-gradient-to-tl from-red-600 to-orange-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-6  m-3 leading-none text-center text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card3 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/3 sm:flex-none xl:mb-0 xl:w-1/3">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full  px-3">
                                <div>
                                    <?php if($promotions->count() > 0): ?>
                                        <p
                                            class=" font-sans text-sm text-center font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                            <span class="text-violet-500"><?php echo e($promotions->count()); ?></span>
                                            promotion(s) accordée(s).
                                        </p>
                                    <?php else: ?>
                                        <p
                                            class=" font-sans text-sm text-center font-semibold leading-normal uppercase dark:text-white dark:opacity-60">

                                            Aucune promotion accordée.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-full bg-gradient-to-tl from-emerald-500 to-teal-400">
                                    <i
                                        class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 mt-3 mb-3 gap-3 -mx-3 px-6 py-6 mx-auto">

            <div class="flex flex-col text-center space-y-4">

                <a class="shadow-lg text-sm ease-in-out transform transition-all  duration-300 my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white hover:bg-gradient-to-r hover:from-blue-200 hover:to-[#5e72e4] font-semibold text-slate-700 hover:text-"
                    href="<?php echo e(route('agentRetraite')); ?>">

                    <span class="ml-1 py-3 duration-300 select-none opacity-100 pointer-events-none  ease-soft">Agents
                        à la retraite</span>
                </a>
            </div>

            <div class="flex flex-col space-y-4">

                <a class=" shadow-lg text-sm ease-in-out transform transition-all duration-300 my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white  hover:bg-gradient-to-r hover:from-blue-200 hover:to-[#5e72e4]  font-semibold text-slate-700 hover:text-"
                    href="<?php echo e(route('agentActif')); ?>">
                    <span class="ml-1 py-3 duration-300 select-none opacity-100 pointer-events-none ease-soft">Agents
                        actifs</span>
                </a>
            </div>


            <div class="">

                <a class=" shadow-lg text-sm ease-in-out transform transition-all duration-300 my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white  hover:bg-gradient-to-r hover:from-blue-200 hover:to-[#5e72e4]  font-semibold text-slate-700 hover:text-"
                    href="<?php echo e(route('agentDemissionaire')); ?>">

                    <span
                        class="ml-1 py-3 duration-300 select-none opacity-100 pointer-events-none ease-soft">Démissionnaires</span>
                </a>
            </div>





            <div class="flex flex-col space-y-4">

                <a class=" shadow-lg text-sm ease-in-out transform transition-all duration-300 my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white  hover:bg-gradient-to-r hover:from-blue-200 hover:to-[#5e72e4]  font-semibold text-slate-700 hover:text-"
                    href="<?php echo e(route('agentmutes')); ?>">

                    <span class="py-3 ml-1 duration-300 select-none opacity-100 pointer-events-none ease-soft">Agents
                        mutés</span>
                </a>
            </div>

        </div>
        <div>
            <div class="p-8 bg-white m-9 shadow-lg ">
                <?php if(session('error')): ?>
                    <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
                <?php if(!empty($alertes) && count($alertes) > 0): ?>
                    <?php $__currentLoopData = $alertes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alerte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $agent = \App\Models\Agent::find($alerte['id']);
                        ?>

                        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded mb-4">
                            <h2 class="font-bold mb-2">Monté de grade à venir</h2>
                            <ul class="list-disc list-inside">
                                <a href="<?php echo e(route('ajouter.grade', $agent->id)); ?>">
                                    <li>
                                        <strong><?php echo e($alerte['nom']); ?> </strong>
                                        aura une montée de grade le <?php echo e($alerte['date']); ?>.
                                    </li>
                                </a>

                            </ul>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    Aucune montée en grade à venir.
                <?php endif; ?>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2  mx-3 px-9 py-6 mx-auto gap-4">
            <div class="p-4 bg-white rounded-2xl shadow-md">
                <div id="calendar"></div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const calendarEl = document.getElementById('calendar');

                    const calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        locale: 'fr',
                        height: 'auto',
                        eventSourceSuccess: function(content, xhr) {
                            console.log('Événements chargés une seule fois');
                        },
                        headerToolbar: {
                            left: 'prev',
                            center: 'title',
                            right: 'next'
                        },

                        buttonText: {
                            today: 'Aujourd\'hui',
                            month: 'Mois',
                            week: 'Semaine',
                            day: 'Jour'
                        },

                        // events: '/api/evenements',

                        eventContent: function(arg) {
                            const startDate = new Date(arg.event.start);
                            const endDate = arg.event.end ? new Date(arg.event.end.getTime() - 86400000) : null;
                            const eventDate = new Date(arg.event.startStr);

                            const isStart = eventDate.toDateString() === startDate.toDateString();
                            const isEnd = endDate && eventDate.toDateString() === endDate.toDateString();

                            if (!isStart && !isEnd) {
                                return {
                                    domNodes: []
                                };
                            }

                            const fullName = arg.event.title;

                            // Conteneur principal
                            const eventElement = document.createElement('div');
                            eventElement.classList.add('relative', 'group', 'flex', 'justify-center',
                                'items-center');

                            // SVG sans fond (juste l’icône verte)
                            const svgWrapper = document.createElementNS("http://www.w3.org/1999/xhtml", "div");
                            svgWrapper.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="green" class="size-6 hover:scale-110 transition-transform duration-150">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25
                              M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25
                              m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75
                              m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>
                `;

                            // Tooltip style "bulle de messagerie"
                            const tooltip = document.createElement('div');
                            tooltip.className = `
                    absolute bottom-full mb-3 hidden group-hover:flex
                bg-white text-gray-800 text-xs w-45 text-center break-words rounded-xl px-3 py-2 shadow-lg
                before:content-[''] before:absolute before:top-full before:left-1/2 before:-translate-x-1/2
                before:border-8 before:border-transparent before:border-t-white
                `.replace(/\s+/g, ' ').trim();
                            tooltip.innerHTML = fullName.replace(/<br>/g, '<br>');
                            eventElement.appendChild(svgWrapper);
                            eventElement.appendChild(tooltip);

                            return {
                                domNodes: [eventElement]
                            };
                        }


                    });

                    calendar.render();
                });
            </script>



            <div class="break-word p-6 bg-white rounded-2xl shadow-xl max-h-150 overflow-y-auto">
                <h1 class="pb-2 text-center text-[#5e72e4]">Congés en attente de validation</h1>
                <?php if($conges->isEmpty()): ?>
                    <p>Aucun congé en attente de validation.</p>
                <?php else: ?>
                    <ul class="">
                        <?php $__currentLoopData = $conges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="text-red-500 text-xs">Congé</span>
                            <a href="<?php echo e(route('Conges')); ?>" class="py-3">
                                <li class="p-2 border border-gray-300 rounded-lg shadow-md">
                                    <?php
                                        $agent = $conge->agents->first(); // pas agents()
                                    ?>

                                    <p>Un <?php echo e($conge->Type_conge); ?> est demandé par
                                        <?php if($agent): ?>
                                            l'agent <?php echo e($agent->nom_Agent); ?> <?php echo e($agent->prenom_Agent); ?>

                                        <?php else: ?>
                                            un agent inconnu
                                        <?php endif; ?>
                                    </p>

                                    <span class="text-sm">Statut: <?php echo e($conge->statut_conge); ?></span>
                                </li>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </ul>
                <?php endif; ?>
            </div>
        </div>




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
<?php /**PATH C:\Users\Sarah\Downloads\MyProject\resources\views/site.blade.php ENDPATH**/ ?>