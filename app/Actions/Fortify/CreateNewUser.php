<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\Invitation;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Carbon;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Vérifiez le code
        $invitation = Invitation::where('token', $input['token'])
        ->where('email', $input['email'])
        ->where('statut', 'Actif')
        ->first();

        if (!$invitation) {
            throw ValidationException::withMessages([
                'token' => __('Code de jeton invalide.'),
            ]);
        }

        // Vérifiez si le code a expiré
        if ($invitation->expires_at && $invitation->expires_at < Carbon::now()) {
            throw ValidationException::withMessages([
                'token' => __('Le jeton saisi a expiré.'),
            ]);
        }

        // Marquer le code comme utilisé
        $invitation->update(['statut' => 'Utilisé']);

        User::create([
            'nom' => $input['nom'],
            'prenom' => $input['prenom'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => 'enseignant',
        ]);

        return redirect()->route('enseignant.onboarding');
        
    }
}
