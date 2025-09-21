<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('images/icone[1].png') }}" />
    <title>HRManager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="  bg-gradient-to-br from-[#f0f4f8] via-[#e0eafc] to-[#cfdef3] font-sans">
    <div class="flex min-h-screen  items-center justify-center p-6 md:p-10">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg flex flex-col  ">
            <h2 class="text-2xl font-bold mb-4 text-center">Réinitialiser le mot de passe</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('modifier.motdepasse') }}"
                class="flex flex-col gap-6 p-6 md:p-8 gap-6">
                @csrf

                <input type="hidden" name="token" value="{{ request()->route('token') }}">


                <div class="grid gap-2 ">
                    <label for="password" class="text-sm font-semibold leading-none">Nouveau mot de passe</label>
                    <input type="password" name="new_password" id="password" required
                        class="flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50">
                    @error('password')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="grid gap-2 ">
                    <label for="password_confirmation" class="text-sm font-semibold leading-none">Confirmer le mot de
                        passe</label>
                    <input type="password" name="new_password_confirmation" id="password_confirmation" required
                        class="flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50">

                </div>
                <button type="submit"
                    class="inline-flex h-9 items-center justify-center whitespace-nowrap rounded-md text-white px-4 py-2 text-sm font-medium bg-[#5e72e4] text-primary-foreground shadow transition-colors hover:bg-[#5e72e4]/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 w-full">
                    Réinitialiser
                </button>
            </form>
        </div>
    </div>
</body>
</html>
