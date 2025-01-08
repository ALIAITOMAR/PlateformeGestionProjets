<div>
    <form wire:submit.prevent="submit">

        <div wire:loading.delay.long class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            Votre compte enseignant est en cours de création. Merci de patienter..
        </div>

        
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
            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <textarea id="etablissement" wire:model="state.etablissement" rows="3"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                    ></textarea>
            </div>
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
            <x-button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" wire:loading.class="opacity-50">
            <span wire:loading.remove>{{ __('Continue') }}</span>
            <div wire:loading class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full dark:text-white-500" role="status" aria-label="loading">
                    <span class="sr-only">Chargement...</span>
                </div>
            </x-button>
        </div>

    </form>
</div>