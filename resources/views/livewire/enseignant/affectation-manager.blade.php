<div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">


@if (session()->has('message'))
<div id="toast-bottom-left" class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow bottom-5 left-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
        </svg>
        <span class="sr-only">Check icon</span>
    </div>    
<div class="ms-3 text-sm font-normal">{{ session('message') }}</div>
<button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
@endif
    
    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            {{-- Add Button Action --}}
            <div class="relative">
                <x-button wire:click="confirmAffectationAdd" class="bg-indigo-700 hover:bg-indigo-900">
                    Affecter un projet
                </x-button>
            </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" wire:model.live="search" id="table-search-affectations" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rechercher des affectations">
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Titre Projet
                </th>
                <th scope="col" class="px-6 py-3">
                    Classe
                </th>
                <th scope="col" class="px-6 py-3">
                    Date Echeance
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
        @forelse ($affectations as $affectation)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                <td class="px-6 py-4">
                    {{ $affectation->id }}
                </td>
                <td class="px-6 py-4">
                {{ $affectation->projet->titre }}
                </td>
                <td class="px-6 py-4">
                {{ $affectation->classe->nom }}
                </td>
                <td class="px-6 py-4">
                {{ $affectation->date_echeance->format('d/m/Y') }}
                </td>

                <td class="px-6 py-4">
                    {{-- Edit Button Action --}}
                    <x-button wire:click="confirmAffectationEdit({{ $affectation->id }})"
                        class="mr-2 bg-orange-500 hover:bg-orange-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                        </svg>
                    </x-button>
                    {{-- Delete Button Action --}}
                    <x-danger-button class="px-2" wire:click="confirmAffectationDeletion({{ $affectation->id }})"
                        wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                        </svg>
                    </x-danger-button>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="9">{{ __('Aucun enregistrement trouvé') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Footer Section --}}
    <div class="mt-4">
    {{ $affectations->links() }}
    </div>

    {{-- Modal Section --}}
    <x-dialog-modal wire:model="confirmingAffectationAdd">
        <x-slot name="title">
            {{ __('Affecter un Projet') }}
        </x-slot>
        <x-slot name="content">

            {{-- Affectation input --}}
             <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="projet_id" value="{{ __('Projet') }}" />
                <select id="projet_id" class="mt-1 block w-full" wire:model.lazy="state.projet_id">
                    <option value="" selected="selected">-- Veuillez sélectionner un projet --</option>    
                    @foreach($projets as $projet)
                        <option value="{{ $projet->id }}">
                            {{ $projet->titre }}
                        </option>
                    @endforeach
                    <x-input-error for="projet_id" class="mt-2" />
                </select>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="classe_id" value="{{ __('Classe') }}" />
                <select id="classe_id" class="mt-1 block w-full" wire:model.lazy="state.classe_id">
                <option value="" selected="selected">-- Veuillez sélectionner une classe --</option>
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id }}">
                            {{ $classe->nom }}
                        </option>
                    @endforeach
                    <x-input-error for="classe_id" class="mt-2" />
                </select>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="date_echeance" value="{!! __('Date d\'échéance') !!}" />
                <x-input id="date_echeance" type="date" class="mt-1 block w-full" wire:model="state.date_echeance" />
                <x-input-error for="date_echeance" class="mt-2" />
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingAffectationAdd', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-button class="ml-2" wire:click="createAffectation" wire:loading.attr="disabled">
                {{ __('Enregister') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="confirmingAffectationUpdate">
        <x-slot name="title">
            {{ __('Modifier Affectation') }}
        </x-slot>

        <x-slot name="content">

            {{-- Affectation input --}}

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="projet_id" value="{{ __('Projet') }}" />
                <select id="projet_id" class="mt-1 block w-full" wire:model="state.projet_id">
                    @foreach($affectations->pluck('projet')->unique() as $projet)
                        <option value="{{ $projet->id }}">{{ $projet->titre }}</option>
                    @endforeach
                    <x-input-error for="projet_id" class="mt-2" />
                </select>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="classe_id" value="{{ __('Classe') }}" />
                <select id="classe_id" class="mt-1 block w-full" wire:model="state.classe_id">
                    @foreach($affectations->pluck('classe')->unique() as $classe)
                        <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                    @endforeach
                    <x-input-error for="classe_id" class="mt-2" />
                </select>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="date_echeance" value="{{ __('Date Fin') }}" />
                <x-input id="date_echeance" type="date" class="mt-1 block w-full" wire:model="state.date_echeance" />
                <x-input-error for="date_echeance" class="mt-2" />
            </div>
        
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="etat" value="{{ __('Etat') }}" />
                <select id="etat" class="mt-1 block w-full" wire:model="state.etat">
                        <option value="Actif">Actif</option>
                        <option value="Clôturé">Clôturé</option>
                    <x-input-error for="etat" class="mt-2" />
                </select>
            </div>
            
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingAffectationUpdate', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-button class="ml-2" wire:click="updateAffectation" wire:loading.attr="disabled">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>    
            {{ __('Enregistrer') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Supprimer Affectation Confirmation Modal -->
    <x-confirmation-modal wire:model.live="confirmingAffectationDeletion">
        <x-slot name="title">
            {{ __('Supprimer Affectation') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Etes-vous sûr de vouloir supprimer le Affectation ?') }}
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingAffectationDeletion')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-danger-button class="ml-2" wire:click="deleteAffectation" wire:loading.attr="disabled">
                {{ __('Supprimer') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>