@component('mail::message')
# Bonjour {{ $user->nom_complet }},

Nous avons reçu une demande de réinitialisation de votre mot de passe. Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer cet email.

@component('mail::button', ['url' => route('password.reset', ['token' => $token])])
Réinitialiser le mot de passe
@endcomponent

Ce lien expirera dans 60 minutes.

Si vous avez des questions, n'hésitez pas à nous contacter.

Cordialement,  
L'équipe de {{ config('app.name') }}
@endcomponent
