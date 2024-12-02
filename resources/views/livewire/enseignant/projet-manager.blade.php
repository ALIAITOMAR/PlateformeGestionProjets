<div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    
    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            {{-- Add Button Action --}}
            <div class="relative">
                <x-button wire:click="confirmProjetAdd" class="bg-indigo-700 hover:bg-indigo-900">
                    Ajouter Projet
                </x-button>
            </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" wire:model="search" id="table-search-projets" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rechercher des projets">
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Titre
                </th>
                <th scope="col" class="px-6 py-3">
                    Module
                </th>
                <th scope="col" class="px-6 py-3">
                    Date Creation
                </th>
                <th scope="col" class="px-6 py-3">
                    Etat
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
        @forelse ($projets as $projet)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                <td class="px-6 py-4">
                    {{ $projet->titre }}
                </td>
                
                <td class="px-6 py-4">
                    {{ $projet->module }}
                </td>

                <td class="px-6 py-4">
                    {{ $projet->created_at->format('d-m-Y') }}
                </td>

                
                <td class="px-6 py-4">
                    <div class="flex flex-col gap-y-2">
                    <div>
                        @if($projet->etat == 'Affecté')
                        <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                            <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            {{ $projet->etat }}
                        </span>
                        @endif

                        @if($projet->etat == 'Non Affecté')
                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full dark:bg-yellow-500/10 dark:text-yellow-500">
                            <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" x2="12" y1="2" y2="6"></line>
                            <line x1="12" x2="12" y1="18" y2="22"></line>
                            <line x1="4.93" x2="7.76" y1="4.93" y2="7.76"></line>
                            <line x1="16.24" x2="19.07" y1="16.24" y2="19.07"></line>
                            <line x1="2" x2="6" y1="12" y2="12"></line>
                            <line x1="18" x2="22" y1="12" y2="12"></line>
                            <line x1="4.93" x2="7.76" y1="19.07" y2="16.24"></line>
                            <line x1="16.24" x2="19.07" y1="7.76" y2="4.93"></line>
                            </svg>
                            {{ $projet->etat }}
                        </span>
                        @endif

                        @if($projet->etat == 'Clôturé')
                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                            <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                            <path d="M12 9v4"></path>
                            <path d="M12 17h.01"></path>
                            </svg>
                            {{ $projet->etat }}
                        </span>
                        @endif
                    </div>
                    </div>
                </td>

                <td class="px-6 py-4">
                    {{-- Edit Button Action --}}
                    <x-button wire:click="confirmProjetEdit({{ $projet->id }})"
                        class="mr-2 bg-orange-500 hover:bg-orange-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                        </svg>
                    </x-button>
                    {{-- Delete Button Action --}}
                    <x-danger-button class="px-2" wire:click="confirmProjetDeletion({{ $projet->id }})"
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
    {{ $projets->links() }}
    </div>

    {{-- Modal Section --}}
    <x-dialog-modal wire:model="confirmingProjetAdd">
        <x-slot name="title">
            {{ __('Ajouter Projet') }}
        </x-slot>
        <x-slot name="content">

            {{-- Projet input --}}
            <div class="col-span-6 sm:col-span-4">
                <x-label for="titre" value="{{ __('titre') }}" />
                <x-input id="titre" type="text" class="mt-1 block w-full" wire:model="state.titre" />
                <x-input-error for="titre" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="description" value="{{ __('Description') }}" />
                <textarea id="description" type="text" class="mt-1 block w-full" wire:model="state.description"></textarea>
                <x-input-error for="description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="module" value="{{ __('Module') }}" />
                <x-input id="module" type="text" class="mt-1 block w-full" wire:model="state.module" />
                <x-input-error for="module" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="competence" value="{{ __('Competence (Séparées par des virgules)') }}" />
                <x-input id="competence" type="text" class="mt-1 block w-full" wire:model="state.competence" />
                <x-input-error for="competence" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">

                <x-label for="" value="{{ __('Liste des tâches') }}" />

                @foreach ($state['taches'] as $index => $tache)
                <div class="mt-2">
                    <x-label for="taches.{{ $index }}.titre" value="{{ __('Tâche ') . $index+1 }}" />
                    <x-input for="taches.{{ $index }}.titre" type="text" class="mt-1 block w-full" wire:model="state.taches.{{ $index }}.titre"/>
                    <x-input-error for="taches.{{ $index }}.titre" class="mt-2" />
                </div>

                <div class="mt-2">
                    <x-label for="taches.{{ $index }}.description" value="{{ __('Description Tâche ') . $index+1 }}" />
                    <textarea id="taches.{{ $index }}.description" rows="4" class="block mt-1 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" wire:model="state.taches.{{ $index }}.description"></textarea>
                    <x-input-error for="taches.{{ $index }}.description" class="mt-2" />
                </div>

                <div wire:click="removeTache({{ $index }})" wire:loading.attr="disabled" class="mt-2 flex justify-end gap-x-2">
                    <span class="inline-flex justify-center items-center size-[46px] rounded-full text-blue-600 dark:text-blue-500">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"> <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/> </svg>
                    </span>
                </div>
                @endforeach

                <div wire:click="addTache" wire:loading.attr="disabled" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    <p class="ml-2">Ajouter Tâche</p>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="etat" value="{{ __('Etat') }}" />
                <select id="etat" class="mt-1 block w-full" wire:model="state.etat">
                    <option value="" selected="selected">-- Etat --</option>   
                        <option value="Affecté">Affecté</option>
                        <option value="Non Affecté">Non Affecté</option>
                        <option value="Clôturé">Clôturé</option>
                    <x-input-error for="etat" class="mt-2" />
                </select>
            </div>
            
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingProjetAdd', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-button class="ml-2" wire:click="createProjet" wire:loading.attr="disabled">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>    
            {{ __('Enregister') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="confirmingProjetUpdate">
        <x-slot name="title">
            {{ __('Modifier Projet') }}
        </x-slot>

        <x-slot name="content">

            {{-- Projet input --}}
            <div class="col-span-6 sm:col-span-4">
                <x-label for="titre" value="{{ __('titre') }}" />
                <x-input id="titre" type="text" class="mt-1 block w-full" wire:model="state.titre" />
                <x-input-error for="titre" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="description" value="{{ __('Description') }}" />
                <textarea id="description" type="text" class="mt-1 block w-full" wire:model="state.description"></textarea>
                <x-input-error for="description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="module" value="{{ __('Module') }}" />
                <x-input id="module" type="text" class="mt-1 block w-full" wire:model="state.module" />
                <x-input-error for="module" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="competence" value="{{ __('Competence') }}" />
                <x-input id="competence" type="text" class="mt-1 block w-full" wire:model="state.competence" />
                <x-input-error for="competence" class="mt-2" />
                @if ($state['competence'])
                <div class="mt-2">
                    @foreach ($state['competence'] as $value)
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                            {{ $value }}
                        </span>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">

                <x-label for="" value="{{ __('Liste des tâches') }}" />

                @foreach ($state['taches'] as $index => $tache)
                <div class="mt-2">
                    <x-label for="taches.{{ $index }}.titre" value="{{ __('Tâche ') . $index+1 }}" />
                    <x-input for="taches.{{ $index }}.titre" type="text" class="mt-1 block w-full" wire:model="state.taches.{{ $index }}.titre"/>
                    <x-input-error for="taches.{{ $index }}.titre" class="mt-2" />
                </div>

                <div class="mt-2">
                    <x-label for="taches.{{ $index }}.description" value="{{ __('Description Tâche ') . $index+1 }}" />
                    <textarea id="taches.{{ $index }}.description" rows="4" class="block mt-1 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" wire:model="state.taches.{{ $index }}.description"></textarea>
                    <x-input-error for="taches.{{ $index }}.description" class="mt-2" />
                </div>

                <div wire:click="removeTache({{ $index }})" wire:loading.attr="disabled" class="mt-2 flex justify-end gap-x-2">
                    <span class="inline-flex justify-center items-center size-[46px] rounded-full text-blue-600 dark:text-blue-500">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"> <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/> </svg>
                    </span>
                </div>
                @endforeach

                <div wire:click="addTache" wire:loading.attr="disabled" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    <p class="ml-2">Ajouter Tâche</p>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="etat" value="{{ __('Etat') }}" />
                <select id="etat" class="mt-1 block w-full" wire:model="state.etat">
                    <option value="" selected="selected">-- Etat --</option>   
                        <option value="Affecté">Affecté</option>
                        <option value="Non Affecté">Non Affecté</option>
                        <option value="Clôturé">Clôturé</option>
                    <x-input-error for="etat" class="mt-2" />
                </select>
            </div>
        
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingProjetUpdate', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-button class="ml-2" wire:click="updateProjet" wire:loading.attr="disabled">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>    
            {{ __('Enregistrer') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Supprimer Projet Confirmation Modal -->
    <x-confirmation-modal wire:model.live="confirmingProjetDeletion">
        <x-slot name="title">
            {{ __('Supprimer Projet') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Etes-vous sûr de vouloir supprimer le Projet ?') }}
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingProjetDeletion')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-danger-button class="ml-2" wire:click="deleteProjet" wire:loading.attr="disabled">
                {{ __('Supprimer') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>