<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('images/icone[1].png')}}" />
    <title>HRManager</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen flex-col items-center justify-center p-6 md:p-10">
        <div class="w-full max-w-sm md:max-w-xl">
            <div class="flex flex-col gap-6">
                <div class="overflow-hidden rounded-lg  bg-card text-card-foreground shadow-xl bg-white">
                    <div class="">
                        <form class="p-6 md:p-8" method="POST" action="{{ route('register.post') }}"> 
                            @csrf
                            @if ($errors->any())
                                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                                    <p class="font-bold">Error</p>
                                    <ul class="list-disc pl-5">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="flex flex-col gap-6">
                                <div class="flex flex-col items-center text-center">
                                    <h1 class="text-2xl font-bold">Content de vous revoir</h1>
                                    <p class="text-balance text-muted-foreground">Connectez-vous à votre compte.</p>
                                </div>
                                <div class="grid gap-2">
                                    <label for="nom_complet" class="text-sm font-semibold leading-none">Nom et prenom</label>
                                    <input
                                        name="nom_complet"
                                        id="nom_complet"
                                        type="text"
                                        placeholder="Doe"
                                        required
                                        class="flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                                       
                                    />
                                </div>
                                
                                <div class="grid gap-2">
                                    <label for="email" class="text-sm font-semibold leading-none">Email</label>
                                    <input
                                        name="email"
                                        id="email"
                                        type="email"
                                        placeholder="m@example.com"
                                        required
                                        class="flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                                       
                                    />
                                </div>
                                <div class="grid gap-2">
                                    <div class="flex items-center">
                                        <label for="password" class="text-sm font-semibold leading-none">Entrer votre mot de passe</label>
                                        {{-- <a href="#" class="ml-auto text-sm underline-offset-2 hover:underline">
                                            Mot de passe oublier ?
                                        </a> --}}
                                    </div>
                                    <input
                                        name="password"
                                        id="password"
                                        type="password"
                                        required
                                        class="flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                                    />
                                </div>
                                <div class="grid gap-2">
                                    <div class="flex items-center">
                                        <label for="password_confirmation" class="text-sm font-semibold leading-none">Confirmer votre mot de passe</label>
                                        {{-- <a href="#" class="ml-auto text-sm underline-offset-2 hover:underline">
                                            Mot de passe oublier ?
                                        </a> --}}
                                    </div>
                                    <input
                                        name="password_confirmation"
                                        type="password"
                                        required
                                        class="flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                                    />
                                </div>
                                <button
                                    type="submit"
                                    class="inline-flex h-9 items-center justify-center whitespace-nowrap rounded-md bg-[#5e72e4] text-white px-4 py-2 text-sm font-medium text-primary-foreground shadow transition-colors hover:bg-[#5e72e4]/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 w-full"
                                    
                                >
                                    Connexion
                                </button>
                                <div class="relative flex items-center justify-center my-4">
                                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                      <div class="w-full border-t border-gray-300"></div>
                                    </div>
                                    <div class="relative px-4 text-sm text-gray-500 bg-white">
                                      Ou
                                    </div>
                                </div>
                                  
                                
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-balance text-center text-xs text-muted-foreground">
                    En cliquant sur Continuer, vous acceptez nos <a href="#" class="underline underline-offset-4 hover:text-primary">Conditions d'utilisation</a> et <a href="#" class="underline underline-offset-4 hover:text-primary">politique de confidentialité</a>.
                </div>
            </div>
        </div>
    </div>
</body>
</html>
