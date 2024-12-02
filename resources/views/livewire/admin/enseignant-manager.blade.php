<div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex mt-8 mr-2 ml-2 items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            {{-- Add Button Action --}}
            <div class="ml-2">
                <x-button wire:click="confirmEnseignantAdd" class="bg-indigo-700 hover:bg-indigo-900">
                    Ajouter Enseignant
                </x-button>
            </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" wire:model="search" id="table-search-enseignants" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rechercher des enseignants">
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Matricule
                </th>
                <th scope="col" class="px-6 py-3">
                    User
                </th>
                <th scope="col" class="px-6 py-3">
                    Etablissement
                </th>
                <th scope="col" class="px-6 py-3">
                    Statut
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
        @forelse ($enseignants as $enseignant)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                <td class="px-6 py-4">
                    {{ $enseignant->id }}
                </td>
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src="{{$enseignant->user->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{$enseignant->user->nom}} {{$enseignant->user->prenom }}</div>
                        <div class="font-normal text-gray-500">{{$enseignant->user->email }}</div>
                    </div>  
                </th>
                <td class="px-6 py-4">
                    {{ $enseignant->etablissement }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                    </div>
                </td>
                <td class="px-6 py-4">
                    {{-- Edit Button Action --}}
                    <x-button wire:click="confirmEnseignantEdit({{ $enseignant->id }})"
                        class="mr-2 bg-orange-500 hover:bg-orange-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                        </svg>
                    </x-button>
                    {{-- Delete Button Action --}}
                    <x-danger-button class="px-2" wire:click="confirmEnseignantDeletion({{ $enseignant->id }})"
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
    {{ $enseignants->links() }}
    </div>

    {{-- Modal Section --}}
    <x-dialog-modal wire:model="confirmingEnseignantAdd">
        <x-slot name="title">
            {{ __('Ajouter Enseignant') }}
        </x-slot>
        <x-slot name="content">

            {{-- User input --}}

            <div class="col-span-6 sm:col-span-4">
                <x-label for="nom" value="{{ __('Nom') }}" />
                <x-input id="nom" type="text" class="mt-1 block w-full" wire:model="nom" />
                <x-input-error for="nom" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="prenom" value="{{ __('Prenom') }}" />
                <x-input id="prenom" type="text" class="mt-1 block w-full" wire:model="prenom" />
                <x-input-error for="prenom" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" type="email" class="mt-1 block w-full" wire:model="email" />
                <x-input-error for="email" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="password" value="{{ __('Mot de passe') }}" />
                <x-input id="password" type="password" class="mt-1 block w-full" wire:model="password" />
                <x-input-error for="password" class="mt-2" />
            </div>

            {{-- Enseignant input --}}
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="cadre" value="{{ __('Cadre') }}" />
                <x-input id="cadre" type="text" class="mt-1 block w-full" wire:model="cadre" />
                <x-input-error for="cadre" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="date_embauche" value="{{ __('Date Embauche') }}" />
                <x-input id="date_embauche" type="date" class="mt-1 block w-full" wire:model="date_embauche" />
                <x-input-error for="date_embauche" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="date_affectation" value="{{ __('date_affectation') }}" />
                <x-input id="date_affectation" type="date" class="mt-1 block w-full" wire:model="date_affectation" />
                <x-input-error for="date_affectation" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="specialite" value="{{ __('Specialite') }}" />
                <x-input id="specialite" type="text" class="mt-1 block w-full" wire:model="specialite" />
                <x-input-error for="specialite" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="etablissement" value="{{ __('Etablissement') }}" />
                <x-input id="etablissement" type="text" class="mt-1 block w-full" wire:model="etablissement" />
                <x-input-error for="etablissement" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="cycle" value="{{ __('Cycle') }}" />
                <x-input id="cycle" type="text" class="mt-1 block w-full" wire:model="cycle" />
                <x-input-error for="cycle" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="tel" value="{{ __('Tel') }}" />
                <x-input id="tel" type="text" class="mt-1 block w-full" wire:model="tel" />
                <x-input-error for="tel" class="mt-2" />
            </div>
        
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingEnseignantAdd', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="store()" wire:loading.attr="disabled">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>    
            {{ __('Enregister') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="confirmingEnseignantUpdate">
        <x-slot name="title">
            {{ __('Modifier Enseignant') }}
        </x-slot>

        <x-slot name="content">

            {{-- User input --}}
            <div class="col-span-6 sm:col-span-4">
                <x-label for="nom" value="{{ __('Nom') }}" />
                <x-input id="nom" type="text" class="mt-1 block w-full" wire:model="nom" />
                <x-input-error for="nom" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="prenom" value="{{ __('Prenom') }}" />
                <x-input id="prenom" type="text" class="mt-1 block w-full" wire:model="prenom" />
                <x-input-error for="prenom" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" type="email" class="mt-1 block w-full" wire:model="email" />
                <x-input-error for="email" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="password" value="{{ __('Mot de passe') }}" />
                <x-input id="password" type="password" class="mt-1 block w-full" wire:model="password" />
                <x-input-error for="password" class="mt-2" />
            </div>

            {{-- Enseignant input --}}
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="cadre" value="{{ __('Cadre') }}" />
                <x-input id="cadre" type="text" class="mt-1 block w-full" wire:model="cadre" />
                <x-input-error for="cadre" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="date_embauche" value="{{ __('Date Embauche') }}" />
                <x-input id="date_embauche" type="date" class="mt-1 block w-full" wire:model="date_embauche" />
                <x-input-error for="date_embauche" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="date_affectation" value="{{ __('date_affectation') }}" />
                <x-input id="date_affectation" type="date" class="mt-1 block w-full" wire:model="date_affectation" />
                <x-input-error for="date_affectation" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="specialite" value="{{ __('Specialite') }}" />
                <x-input id="specialite" type="text" class="mt-1 block w-full" wire:model="specialite" />
                <x-input-error for="specialite" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="etablissement" value="{{ __('Etablissement') }}" />
                <x-input id="etablissement" type="text" class="mt-1 block w-full" wire:model="etablissement" />
                <x-input-error for="etablissement" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="cycle" value="{{ __('Cycle') }}" />
                <x-input id="cycle" type="text" class="mt-1 block w-full" wire:model="cycle" />
                <x-input-error for="cycle" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="tel" value="{{ __('Tel') }}" />
                <x-input id="tel" type="text" class="mt-1 block w-full" wire:model="tel" />
                <x-input-error for="tel" class="mt-2" />
            </div>
        
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingEnseignantUpdate', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-danger-button class="ml-2" wire:click="update()" wire:loading.attr="disabled">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>    
            {{ __('Enregistrer') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    <x-confirmation-modal wire:model="confirmingEnseignantDeletion">
        <x-slot name="title">
            {{ __('Supprimer Enseignant') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Etes-vous sûr de vouloir supprimer Enseignant ?') }}
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingEnseignantDeletion', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-danger-button class="ml-2" wire:click="deleteEnseignant({{ $enseignantIdBeingRemoved }})"
                wire:loading.attr="disabled">
                {{ __('Supprimer') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>

