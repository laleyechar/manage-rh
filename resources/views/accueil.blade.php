<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('images/icone[1].png') }}" />
    <title>HRManager</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    {{-- <div class="flex mt-10  ml-50 mr-50 shadow-xl h-[100vh] w-">
        <div class="w-1/2 bg-left bg-no-repeat bg-contain  " style="background-image: url('{{ asset('images/123757.jpg') }}');">
        </div>
        <div class="w-1/2">
            <div class="w-full py-100 justify-self-center flex justify-evenly">
                <button class="py-5 px-20 shadow-lg bg-white font-bold rounded-full hover:scale-110 transition-transform duration-300">S'inscrire</button>
                <button class="py-5 px-15 shadow-lg bg-blue-500 text-white font-bold rounded-full hover:scale-110 transition-transform duration-300">Se connecter</button>
            </div>
        </div>
    </div> --}}
    {{-- <div class="flex max-w-6xl mx-auto mt-10 shadow-xl h-[80vh] rounded-xl overflow-hidden">
        <!-- Image à gauche -->
        <div class="w-1/2 bg-left h-full bg-no-repeat bg-contain bg-cover"
            style="background-image: url('{{ asset('images/image3.jpg') }}');">
        </div>

        <!-- Section droite avec boutons -->
        <div class="w-1/2 flex items-center justify-center bg-slate-50">
            <div class="text-center space-y-6">
                <h1 class="text-3xl font-bold text-gray-800">Bienvenue sur HRManager</h1>
                <p class="text-gray-600 max-w-md mx-auto">Gérez efficacement les carrières, absences, congés et
                    formations du personnel municipal.</p>
                <div class="flex justify-center space-x-6">
                    <button
                        class="py-5 px-15 shadow-lg bg-blue-500 text-white font-bold rounded-full hover:scale-110 transition-transform duration-300">Se
                        connecter</button>

                    <button
                        class="py-5 px-20 shadow-lg bg-white font-bold rounded-full hover:scale-110 transition-transform duration-300">S'inscrire</button>
                </div>
            </div>
        </div>
    </div> --}}
    <div
        class="flex flex-col md:flex-row max-w-6xl mx-auto mt-10 shadow-xl h-auto md:h-[80vh] rounded-xl overflow-hidden">
        <!-- Image à gauche -->
        <div class="md:w-1/2 w-full h-64 md:h-full bg-left bg-no-repeat bg-cover"
            style="background-image: url('{{ asset('images/image3.jpg') }}');">
        </div>

        <!-- Section droite avec boutons -->
        <div class="md:w-1/2 w-full flex items-center justify-center bg-slate-50 p-6">
            <div class="text-center space-y-6">
                <h1 class="text-3xl font-bold text-gray-800">Bienvenue sur HRManager</h1>
                <p class="text-gray-600 max-w-md mx-auto">Gérez efficacement les carrières, absences, congés et
                    formations du personnel municipal.</p>
                <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-6">
                    <a href="{{ route('login') }}">
                        <button
                        class="py-3 px-8 shadow-md bg-blue-500 text-white font-bold rounded-full hover:scale-105 transition-transform duration-300">
                        Se connecter
                    </button>
                    </a>
                    <a href="{{ route('register') }}">
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
