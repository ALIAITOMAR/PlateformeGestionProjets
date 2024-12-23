<div>
    <form wire:submit.prevent="submit">
        
        <div wire:loading.delay.long>Veuillez patienter pendant la création de votre compte enseignant..</div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="matricule" value="{{ __('Matricule') }}" />
            <x-input id="matricule" type="text" class="mt-1 block w-full" wire:model="state.matricule" />
            <x-input-error for="matricule" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="cadre" value="{{ __('Cadre') }}" />
            <x-input id="cadre" type="text" class="mt-1 block w-full" wire:model="state.cadre" />
            <x-input-error for="cadre" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="date_embauche" value="{{ __('Date Embauche') }}" />
            <x-input id="date_embauche" type="date" class="mt-1 block w-full" wire:model="state.date_embauche" />
            <x-input-error for="date_embauche" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="date_affectation" value="{{ __('Date Affectation') }}" />
            <x-input id="date_affectation" type="date" class="mt-1 block w-full" wire:model="state.date_affectation" />
            <x-input-error for="date_affectation" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="specialite" value="{{ __('Specialité') }}" />
            <x-input id="specialite" type="text" class="mt-1 block w-full" wire:model="state.specialite" />
            <x-input-error for="specialite" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="etablissement" value="{{ __('Etablissement') }}" />
            <x-input id="etablissement" type="text" class="mt-1 block w-full" wire:model="state.etablissement" />
            <x-input-error for="etablissement" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="cycle" value="{{ __('Cycle') }}" />
            <x-input id="cycle" type="text" class="mt-1 block w-full" wire:model="state.cycle" />
            <x-input-error for="cycle" class="mt-2" />
        </div>
        
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="tel" value="{{ __('Téléphone') }}" />
            <x-input id="tel" type="text" class="mt-1 block w-full" wire:model="state.tel" />
            <x-input-error for="tel" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button type="submit" class="ms-4" wire:loading.class="opacity-50">
            <span wire:loading.remove>{{ __('Continue') }}</span>
            <span wire:loading>Veuillez patienter..</span>
            </x-button>
        </div>
        
    </form>
</div>