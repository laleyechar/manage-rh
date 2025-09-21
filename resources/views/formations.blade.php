<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('images/icone[1].png') }}" />
    <title>HRManager</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

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
                <img src="{{ asset('images/logob.png') }}"
                    class="inline max-h-15 max-w-full transition-all duration-200 ml-4 ease-nav-brand"
                    alt="main_logo"  />
            </a>
        </div>

        <hr
            class="my-4 border-0 h-px mx-4 bg-gradient-to-r from-gray-100 via-black/60 to-gray-200 dark:from-transparent dark:via-white dark:to-transparent" />

        <div class=" items-center block w-auto max-h-screen h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full ">
                    <a class="p-2 dark:text-white dark:opacity-80 py-3 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="{{ route('site') }}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6  ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Tableau de bord</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="p-2 dark:text-white dark:opacity-80 py-3 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="{{ route('liste') }}">
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
                        href="{{ route('afficher.fichier') }}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>

                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Gestion des dossiers</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="bg-[#5e72e4]/10  p-2 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
                        href="{{ route('formations') }}">
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
                        href="{{ route('promotions') }}">
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
                        href="{{ route('Conges') }}">
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
                        href="{{ route('Services') }}">
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
                        href="{{ route('Poste') }}">
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
                @auth
                    @if (Auth::user()->hasRole('admin'))
                        <hr
                            class="border-0 h-px mx-4 bg-gradient-to-r from-gray-100 via-black/60 to-gray-200 dark:from-transparent dark:via-white dark:to-transparent" />


                        <li class="mt-0.5 w-full">
                            <a class="p-2 dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                href="{{ route('admin.users.index') }}">
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
                                href="{{ route('journal') }}">
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
                                href="{{ route('agents.supprimes') }}">
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
                    @endif
                @endauth
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
                            aria-current="page">Formations</li>
                    </ol>
                    <h6 class="mb-0 font-bold text-white capitalize">Formations</h6>
                </nav>

                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">
                        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                            <div class="flex border border-gray-300 bg-white rounded-lg ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="size-7  z-20 flex-auto dark:bg-slate-850 dark:text-white   pt-2  text-gray-500 transition-all ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                                <input type="text" id="input_recherche" type="text"
                                    class="text-sm  focus:outline-none relative  -ml-px block min-w-0 flex-auto   dark:bg-slate-850 dark:text-white  py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500  "
                                    placeholder="Rechercher..." />
                            </div>

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
                                <a href="{{ route('afficherProfil') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    <i class="fas fa-user mr-2"></i> Mon profil
                                </a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form method="POST" action={{ route('logout') }}>
                                    @csrf
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
        <!-- end Navbar -->
        @if ($errors->any())
            <div class="m-5 mb-4 p-4 shadow-lg rounded-lg bg-red-100 text-red-700">
                <strong>Erreur(s) détectée(s) :</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="m-5 my-15 shadow-xl rounded-2xl bg-white p-5">
            <button id="btnFormation" type="submit"
                class="hover:scale-105 flex rounded-xl mt-10 p-5 bg-[#5e72e4] text-white gap-3">
                <h1 class="font-bold">Prévoir une formation</h1>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button>
        </div>
        <div class="m-5">
            @if ($formations->count() > 0)
                <div id="pasdeResultat" style="display: none;" class="text-center text-gray-500 italic mt-4">
                    Aucun résultat trouvé
                </div>
                @foreach ($formations as $formation)
                    <div id=""
                        class="container_formation rounded-b-lg shadow-md m-3 p-5 bg-white border-t-4 border-blue-200">
                        <div class="flex justify-between">
                            <button class="text-blue-500 h over:text-blue-700"
                                onclick='openUpdateFormulaire(
                                        {{ $formation->id }},
                                        @json($formation->nom_Formation),
                                        @json($formation->agents->pluck('matricule_Agent')->toArray()),
                                        @json($formation->Description_Formation),
                                        @json($formation->debut_Formation),
                                        @json($formation->fin_Formation),
                                        @json($formation->pays_Formation),
                                        @json($formation->ville_Formation)
                                    )'>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="size-6 cursor-pointer hover:text-blue-600" id="editbutton">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>


                            <form action="{{ route('Formation.delete', $formation->id) }}" method="POST"
                                onsubmit="return confirm('Voulez-vous vraiment supprimer cet employé ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-6 cursor-pointer hover:text-red-600" id="butSupprimer">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <p class="text-center  uppercase font-semibold"><span
                                class="underline">{{ $formation->type_formation }} : {{ $formation->nom_Formation }}
                            </span> ({{ $formation->pays_Formation }}/{{ $formation->ville_Formation }})
                        </p>
                        <p class="text-center">{{ $formation->Description_Formation }}</p>
                        <p class="text-center">Du <span class="font-bold">{{ $formation->debut_Formation }}</span> au
                            <span class="font-bold">{{ $formation->fin_Formation }}</span>
                        </p>
                        <div class="flex justify-between">
                            <p><span class="font-bold">Participant(s):</span> <br><span>{!! $formation->agents->pluck('nom_Agent')->join('<br>') !!}
                                    {!! $formation->agents->pluck('prenom_Agent')->join('<br>') !!}</span></p>
                            <div>
                                @if ($formation->type_formation === 'Formation évaluante')
                                    <p class="font-bold">Attestation : <br></p>
                                    <a href="{{ route('formation.attestation', $formation->id) }}" target="_blank"
                                        class="text-blue-600 underline">
                                        Cliquer pour ouvrir
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <span class="font-bold text-center m-5 p-5">Aucune formation enregistrée</span>
            @endif
        </div>
    </main>
    </div>



    <div id="overlayFormation" class="fixed inset-0 bg-gray-600 opacity-50 hidden"></div>
    <div class="hidden fixed inset-0 z-50 flex items-center justify-center p-4" id="formulaire_formation">
        <form action="{{ route('create.formation') }}" method="POST" enctype="multipart/form-data"
            class="relative bg-white rounded-lg p-10 max-h-[80vh] max-w-full w-full sm:w-[30em] lg:w-[40em] overflow-auto">
            @csrf
            <button type="button" id="fermerformAbsence"
                class="absolute top-2 right-2 text-gray-500 hover:text-red-500  text-xl">&times;</button>
            <fieldset class="space-y-1">
                <div class="text-center">
                    <legend class="text-lg mb-3 font-bold">Remplissez le formulaire</legend>
                </div>
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700">Entrer le matricule de
                        l'agent concerné</label>
                    <input type="text" name="search" id="search"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 "
                        placeholder="Entrer un matricule">
                    <div class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 overflow-y-auto hidden"
                        id="results">
                        @foreach ($agents as $agent)
                            <div id="agent-{{ $agent->matricule_Agent }}"
                                class="result-item p-1 cursor-pointer hover:bg-gray-100"
                                data-matricule="{{ $agent->matricule_Agent }}"
                                data-name="{{ $agent->nom_Agent }} {{ $agent->prenom_Agent }}">
                                {{ $agent->nom_Agent }} {{ $agent->prenom_Agent }} ({{ $agent->matricule_Agent }})
                            </div>
                        @endforeach
                    </div>
                    <h4 class="mt-4 mb-2">Agents sélectionnés :</h4>
                    <ul id="selected-agents" class="space-y-1"></ul>
                    <input type="hidden" name="agents" id="agents-hidden">
                </div>
                <div>
                    <label for="type_formation" class="block text-sm font-medium text-gray-700">Entrer le type de
                        formation</label>
                    <select name="type_formation" id="type_formation"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 "
                        onchange="toggleNoteField()">
                        <option value="Formation évaluante">Formation Evaluante</option>
                        <option value="sensibilisation">Sensibilisation</option>
                    </select>
                </div>
                <div id="noteField" class="mt-4 hidden">
                    <label for="note" class="block text-sm font-medium text-gray-700">Attestation obtenue</label>
                    <input type="file" name="note" id="note"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm"
                        placeholder="Choisir un fichier">
                </div>
                <div>
                    <label for="nom_Formation" class="block text-sm font-medium text-gray-700">Entrer le nom de la
                        formation</label>
                    <input type="text" name="nom_Formation" id="nom_Formation"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 " required>
                </div>
                <div>
                    <label for="Description_Formation" class="block text-sm font-medium text-gray-700">Description de
                        la formation </label>
                    <textarea name="Description_Formation" id="Description_Formation" rows="3"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required></textarea>
                </div>
                <div class="flex w-full space-x-3">
                    <div class="">
                        <label for="debut_Formation" class="block text-sm font-medium text-gray-700">Date de
                            debut</label>
                        <input type="date" name="debut_Formation" id="debut_Formation"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm pl-20"
                            required>
                    </div>
                    <div class="">
                        <label for="fin_Formation" class="block text-sm font-medium text-gray-700">Date de fin</label>
                        <input type="date" name="fin_Formation" id="fin_Formation"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm pl-20"
                            required>
                    </div>
                </div>
                <div class="flex w-full space-x-3">
                    <div class="">
                        <label for="pays_Formation" class="block text-sm font-medium text-gray-700">Pays</label>
                        <input type="text" name="pays_Formation" id="pays_Formation"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm pl-20"
                            required>
                    </div>
                    <div class="">
                        <label for="ville_Formation" class="block text-sm font-medium text-gray-700">Ville</label>
                        <input type="text" name="ville_Formation" id="ville_Formation"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm pl-20"
                            required>
                    </div>
                </div>
                <div class="text-center block text-sm font-medium text-gray-700 ">
                    <button type="submit"
                        class="rounded bg-sky-600 mt-3 py-3 px-4 text-sm text-white data-[hover]:bg-sky-500 data-[hover]:data-[active]:bg-sky-700">Soumettre</button>
                </div>
        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script>
        const btnFormation = document.getElementById('btnFormation')
        const formulaire_formation = document.getElementById('formulaire_formation')
        const overlayFormation = document.getElementById('overlayFormation')
        const fermerformAbsence = document.getElementById('fermerformAbsence')

        btnFormation.addEventListener("click", () => {
            event.preventDefault()
            formulaire_formation.classList.remove('hidden')
            overlayFormation.classList.remove('hidden')
        })
        fermerformAbsence.addEventListener("click", () => {
            formulaire_formation.classList.add('hidden')
            overlayFormation.classList.add('hidden')
        })
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

    <script>
        function toggleNoteField() {
            const select = document.getElementById('type_formation');
            const noteField = document.getElementById('noteField');
            const noteInput = document.getElementById('note');

            if (select.value === 'Formation évaluante') {
                noteField.classList.remove('hidden');
                noteInput.setAttribute('required', 'required');
            } else {
                noteField.classList.add('hidden');
                noteInput.removeAttribute('required');
            }
        }

        // Exécuter au chargement de la page (ex : si on revient après une erreur)
        window.addEventListener('DOMContentLoaded', toggleNoteField);
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById('search');
            const resultsBox = document.getElementById('results');
            const selectedList = document.getElementById('selected-agents');
            const hiddenInput = document.getElementById('agents-hidden');

            let selectedAgents = [];

            searchInput.addEventListener('input', function() {
                const query = this.value.toLowerCase().trim();

                // Si l'input est vide, cacher les résultats
                if (query === '') {
                    resultsBox.classList.add('hidden');
                    return;
                }

                let found = false;

                // Filtrer et afficher les agents en fonction de la recherche
                document.querySelectorAll('.result-item').forEach(item => {
                    const name = item.dataset.name.toLowerCase();
                    const matricule = item.dataset.matricule.toLowerCase();

                    const match = name.includes(query) || matricule.includes(query);

                    item.style.display = match ? 'block' : 'none';
                    if (match) found = true;
                });

                if (found) {
                    resultsBox.classList.remove('hidden');
                } else {
                    resultsBox.classList.add('hidden');
                }
            });

            // Ajouter un agent à la liste des agents sélectionnés
            resultsBox.addEventListener('click', function(e) {
                if (e.target.classList.contains('result-item')) {
                    const matricule = e.target.dataset.matricule;
                    const name = e.target.dataset.name;

                    if (!selectedAgents.find(a => a.matricule === matricule)) {
                        selectedAgents.push({
                            matricule,
                            name
                        });

                        const li = document.createElement('li');
                        li.className = 'bg-gray-200 px-2 py-1 rounded flex justify-between items-center';

                        const span = document.createElement('span');
                        span.textContent = `${name} (${matricule})`;

                        const removeBtn = document.createElement('button');
                        removeBtn.className = 'ml-2 text-red-500';

                        // Ajouter l'icône SVG pour la suppression
                        removeBtn.innerHTML = `
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                  </svg>
                `;

                        // Supprimer l'agent de la liste
                        removeBtn.addEventListener('click', () => {
                            selectedAgents = selectedAgents.filter(a => a.matricule !== matricule);
                            li.remove();
                            updateHiddenInput();
                        });

                        li.appendChild(span);
                        li.appendChild(removeBtn);
                        selectedList.appendChild(li);

                        updateHiddenInput();
                    }

                    searchInput.value = '';
                    resultsBox.classList.add('hidden');
                }
            });

            // Mettre à jour l'input caché avec les matricules des agents sélectionnés
            function updateHiddenInput() {
                hiddenInput.value = selectedAgents.map(a => a.matricule).join(',');
            }
        });
    </script>

    @foreach ($formations as $formation)
        <div id="updateFormation{{ $formation->id }}" class="fixed inset-0 bg-gray-600 opacity-50 hidden z-40"></div>
        <div class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
            id="update_formulaire{{ $formation->id }}">
            <form action="{{ route('Formation.update', $formation->id) }}" method="POST"
                class="relative bg-white rounded-lg p-10 max-h-[80vh] max-w-full w-full sm:w-[30em] lg:w-[40em] overflow-auto"
                id="edit_formation{{ $formation->id }}">
                @method('PUT')
                @csrf
                <button type="button" onclick="fermerFormEdit({{ $formation->id }})"
                    class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
                <input type="hidden" name="id" id="idFormation{{ $formation->id }}">
                <fieldset class="space-y-1">
                    <div class="text-center">
                        <legend class="text-lg mb-3 font-bold">Remplissez le formulaire</legend>
                    </div>
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700">Entrer le matricule de
                            l'agent concerné</label>
                        <input type="text" name="search" id="search{{ $formation->id }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                            placeholder="Entrer un matricule">
                        <div class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 overflow-y-auto hidden"
                            id="results{{ $formation->id }}">
                            @foreach ($agents as $agent)
                                <div id="agent-{{ $agent->matricule_Agent }}"
                                    class="result-item p-1 cursor-pointer hover:bg-gray-100"
                                    data-matricule="{{ $agent->matricule_Agent }}"
                                    data-name="{{ $agent->nom_Agent }} {{ $agent->prenom_Agent }}">
                                    {{ $agent->nom_Agent }} {{ $agent->prenom_Agent }}
                                    ({{ $agent->matricule_Agent }})
                                </div>
                            @endforeach
                        </div>
                        <h4 class="mt-4 mb-2">Agents sélectionnés :</h4>
                        <ul id="selected-agents{{ $formation->id }}" name="selected-agents" class="space-y-1"></ul>
                        <input type="hidden" name="agents" id="agents-hidden{{ $formation->id }}">
                    </div>
                    <div>
                        <label for="type_formation" class="block text-sm font-medium text-gray-700">Entrer le type de
                            formation</label>
                        <select name="type_formation" id="type_formation"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 "
                            onchange="toggleNoteField()">
                            <option value="Formation évaluante">Formation Evaluante</option>
                            <option value="sensibilisation">Sensibilisation</option>
                        </select>
                    </div>
                    <div id="noteField" class="mt-4 hidden">
                        <label for="note" class="block text-sm font-medium text-gray-700">Attestation
                            obtenue</label>
                        <input type="file" name="note" id="note"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm"
                            placeholder="Choisir un fichier">
                    </div>
                    <div>
                        <label for="nom_Formation" class="block text-sm font-medium text-gray-700">Entrer le nom de la
                            formation</label>
                        <input type="text" name="nom_Formation" id="edit_nom_Formation{{ $formation->id }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 ">
                    </div>
                    <div>
                        <label for="Description_Formation" class="block text-sm font-medium text-gray-700">Description
                            de
                            la formation </label>
                        <textarea name="Description_Formation" id="edit_Description_Formation{{ $formation->id }}" rows="3"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
                    </div>
                    <div class="flex w-full space-x-3">
                        <div class="">
                            <label for="debut_Formation" class="block text-sm font-medium text-gray-700">Date de
                                debut</label>
                            <input type="date" name="debut_Formation"
                                id="edit_debut_Formation{{ $formation->id }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm pl-20 pr-12">
                        </div>
                        <div class="">
                            <label for="fin_Formation" class="block text-sm font-medium text-gray-700">Date de
                                fin</label>
                            <input type="date" name="fin_Formation" id="edit_fin_Formation{{ $formation->id }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm pl-20 pr-12">
                        </div>
                    </div>
                    <div class="flex w-full space-x-3">
                        <div class="">
                            <label for="pays_Formation" class="block text-sm font-medium text-gray-700">Pays</label>
                            <input type="text" name="pays_Formation" id="edit_pays_Formation{{ $formation->id }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm pl-20">
                        </div>
                        <div class="">
                            <label for="ville_Formation" class="block text-sm font-medium text-gray-700">Ville</label>
                            <input type="text" name="ville_Formation"
                                id="edit_ville_Formation{{ $formation->id }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-gray-700 text-sm pl-20">
                        </div>
                    </div>
                    <div class="text-center block text-sm font-medium text-gray-700 ">
                        <button type="submit"
                            class="rounded bg-sky-600 mt-3 py-3 px-4 text-sm text-white data-[hover]:bg-sky-500 data-[hover]:data-[active]:bg-sky-700">Soumettre</button>
                    </div>
            </form>


        </div>
    @endforeach
    <script>
        function openUpdateFormulaire(id, nom_Formation, matricules, Description_Formation, debut_Formation,
            fin_Formation, pays_Formation, ville_Formation) {
            document.getElementById('idFormation' + id).value = id;
            document.getElementById('edit_nom_Formation' + id).value = nom_Formation;
            document.getElementById('edit_Description_Formation' + id).value = Description_Formation;
            document.getElementById('edit_debut_Formation' + id).value = debut_Formation;
            document.getElementById('edit_fin_Formation' + id).value = fin_Formation;
            document.getElementById('edit_pays_Formation' + id).value = pays_Formation;
            document.getElementById('edit_ville_Formation' + id).value = ville_Formation;

            document.getElementById('update_formulaire' + id).classList.remove('hidden');
            document.getElementById('updateFormation' + id).classList.remove('hidden');


            const searchInput = document.getElementById('search' + id);
            const resultsBox = document.getElementById('results' + id);
            const selectedAgentsContainer = document.getElementById('selected-agents' + id);
            const agentsHiddenInput = document.getElementById('agents-hidden' + id);
            // Affiche les agents déjà sélectionnés
            selectedAgentsContainer.innerHTML = ''; // Vide d'abord la liste

            matricules.forEach(matricule => {
                const agentDiv = document.querySelector(`#agent-${matricule}`);
                if (agentDiv) {
                    const name = agentDiv.dataset.name;

                    const li = document.createElement('li');
                    li.textContent = `${name} (${matricule})`;
                    li.className = 'bg-gray-200 px-2 py-1 rounded flex justify-between items-center';
                    li.dataset.matricule = matricule;

                    const removeBtn = document.createElement('button');
                    removeBtn.className = 'ml-2 text-red-500';
                    removeBtn.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
            </svg>
        `;
                    removeBtn.addEventListener('click', () => {
                        selectedAgentsContainer.removeChild(li);
                        updateHiddenInput();
                    });

                    li.appendChild(removeBtn);
                    selectedAgentsContainer.appendChild(li);
                }
            });

            updateHiddenInput(); // Mets à jour le champ caché

            // Affichage des résultats de recherche pour les agents
            searchInput.addEventListener('input', function() {
                const query = searchInput.value.toLowerCase().trim();
                resultsBox.classList.remove('hidden');

                // Filtrer les agents selon la recherche
                const agentItems = resultsBox.querySelectorAll('.result-item');
                agentItems.forEach(agent => {
                    const name = agent.dataset.name.toLowerCase();
                    const matricule = agent.dataset.matricule.toLowerCase();
                    if (name.includes(query) || matricule.includes(query)) {
                        agent.style.display = 'block';
                    } else {
                        agent.style.display = 'none';
                    }
                });
            });

            // Gestion de la sélection des agents
            resultsBox.addEventListener('click', function(e) {
                if (e.target.classList.contains('result-item')) {
                    const matricule = e.target.dataset.matricule;
                    const name = e.target.dataset.name;

                    // Ajouter l'agent sélectionné dans la liste
                    const existingAgent = Array.from(selectedAgentsContainer.querySelectorAll('li'))
                        .find(li => li.dataset.matricule === matricule);
                    if (!existingAgent) {
                        const li = document.createElement('li');
                        li.textContent = `${name} (${matricule})`;
                        li.className = 'bg-gray-200 px-2 py-1 rounded flex justify-between items-center';
                        li.dataset.matricule = matricule;

                        // Ajouter un bouton pour retirer l'agent
                        const removeBtn = document.createElement('button');
                        removeBtn.className = 'ml-2 text-red-500';
                        removeBtn.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                    </svg>
                `;
                        removeBtn.addEventListener('click', () => {
                            selectedAgentsContainer.removeChild(li);
                            updateHiddenInput();
                        });

                        li.appendChild(removeBtn);
                        selectedAgentsContainer.appendChild(li);

                        // Mettre à jour le champ caché avec les matricules des agents sélectionnés
                        updateHiddenInput();
                    }
                }
            });

            // Mettre à jour l'input caché avec les matricules des agents sélectionnés
            function updateHiddenInput() {
                const selectedAgents = Array.from(selectedAgentsContainer.querySelectorAll('li'))
                    .map(li => li.dataset.matricule);
                agentsHiddenInput.value = selectedAgents.join(',');
            }


        }

        function fermerFormEdit(id) {
            document.getElementById('update_formulaire' + id).classList.add('hidden');
            document.getElementById('updateFormation' + id).classList.add('hidden');

        }
    </script>
    <script>
        function toggleNoteField() {
            const select = document.getElementById('type_formation');
            const noteField = document.getElementById('noteField');
            const noteInput = document.getElementById('note');

            if (select.value === 'Formation évaluante') {
                noteField.classList.remove('hidden');
                noteInput.setAttribute('required', 'required');
            } else {
                noteField.classList.add('hidden');
                noteInput.removeAttribute('required');
            }
        }

        // Exécuter au chargement de la page (ex : si on revient après une erreur)
        window.addEventListener('DOMContentLoaded', toggleNoteField);
    </script>

    <script>
        const input_recherche = document.getElementById('input_recherche');
        const container_formation = Array.from(document.querySelectorAll('.container_formation'));
        const pasdeResultat = document.getElementById('pasdeResultat');
        input_recherche.addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            let anyVisible = false;
            container_formation.forEach(div => {
                const text = div.textContent.toLowerCase();
                const isVisible = text.includes(filter);
                div.style.display = isVisible ? '' : 'none';
                if (isVisible) anyVisible = true;
            });
            pasdeResultat.style.display = anyVisible ? 'none' : 'block';
        });
    </script>
</body>
