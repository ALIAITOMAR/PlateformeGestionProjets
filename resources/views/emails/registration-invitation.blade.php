<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation à rejoindre notre plateforme [Nom de votre plateforme]</title>
</head>
<body>
    <p>Bonjour,</p>

    <p>Vous avez été invité à vous inscrire en tant qu'enseignant sur notre plateforme. Veuillez utiliser le code d\'invitation suivant pour terminer votre inscription.</p>
    
    <p><strong>Code d'invitation :</strong> {{ $invitation->token }}</p>
    
    <p>Vous pouvez vous inscrire en utilisant le lien ci-dessous :</p>
    
    <p><a href="{{ url('/register') }}">S'inscrire</a></p>
    
    <p>Ce code d\'invitation expire le : {{ $invitation->expires_at->format('Y-m-d') }}</p>
    
    <p>Cordialement,<br>L'équipe de [Nom de votre plateforme]</p>
</body>
</html>
