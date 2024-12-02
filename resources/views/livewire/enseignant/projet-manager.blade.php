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
            <input type="search" wire:model.live="search" id="table-search-projets" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rechercher des projets">
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
                    {{ $projet->created_at->format('d/m/Y') }}
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
                <x-label for="titre" value="{{ __('Titre') }}" />
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
                @if(count($state['taches']) > 0)
                    @foreach ($state['taches'] as $index => $tache)           
                    <div class="flex items-center mt-3 px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                
                        <x-input wire:model="state.taches.{{ $index }}.titre" id="taches.{{ $index }}.titre" type="text" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Tâche ') . $index+1 }}" />
                        <x-input-error for="taches.{{ $index }}.titre" class="mt-2" />
                    
                        <textarea wire:model="state.taches.{{ $index }}.description" id="taches.{{ $index }}.description" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Description Tâche ') . $index+1 }}"></textarea>
                        <x-input-error for="taches.{{ $index }}.description" class="mt-2" />
                
                        <button wire:click="removeTache({{ $index }})" wire:loading.attr="disabled" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                            <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                            </svg>
                            <span class="sr-only">Supprimer Tâche</span>
                        </button>
                    </div>
                    @endforeach
                @endif
                <div wire:click="addTache" wire:loading.attr="disabled" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    <p class="ml-2">Ajouter Tâches</p>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="" value="{{ __('Liste des Critères') }}" />
                @if(count($state['criteres']) > 0)
                    @foreach ($state['criteres'] as $index => $tache)           
                    <div class="flex items-center mt-3 px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                
                        <x-input wire:model="state.criteres.{{ $index }}.libelle"  id="criteres.{{ $index }}.libelle" type="text" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Libelle critère ') . $index+1 }}" />
                        <x-input-error for="criteres.{{ $index }}.libelle" class="mt-2" />
                    
                        <button wire:click="removeCritere({{ $index }})" wire:loading.attr="disabled" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                            <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                            </svg>
                            <span class="sr-only">Supprimer Question</span>
                        </button>
                    </div>
                    @endforeach
                @endif
                <div wire:click="addCritere" wire:loading.attr="disabled" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    <p class="ml-2">Ajouter Critères</p>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="" value="{{ __('Liste des Questions') }}" />
                @if(count($state['questions']) > 0)
                    @foreach ($state['questions'] as $index => $tache)           
                    <div class="flex items-center mt-3 px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                
                        <x-input wire:model="state.questions.{{ $index }}.titre" id="questions.{{ $index }}.titre" type="text" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Question ') . $index+1 }}" />
                        <x-input-error for="questions.{{ $index }}.titre" class="mt-2" />
                    
                        <button wire:click="removeQuestion({{ $index }})" wire:loading.attr="disabled" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                            <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                            </svg>
                            <span class="sr-only">Supprimer Question</span>
                        </button>
                    </div>
                    @endforeach
                @endif
                <div wire:click="addQuestion" wire:loading.attr="disabled" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    <p class="ml-2">Ajouter Questions</p>
                </div>
            </div>
            
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="etat" value="{{ __('Pièces jointes') }}" />
                <div class="flex items-center mt-3 justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div> 
            </div>
            
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingProjetAdd', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-button class="ml-2" wire:click="createProjet" wire:loading.attr="disabled">
                {{ __('Enregistrer') }}
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

            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="" value="{{ __('Liste des tâches') }}" />
                @if(count($state['taches']) > 0)
                    @foreach ($state['taches'] as $index => $tache)           
                    <div class="flex items-center mt-3 px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                
                        <x-input wire:model="state.taches.{{ $index }}.titre" id="taches.{{ $index }}.titre" type="text" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Tâche ') . $index+1 }}" />
                        <x-input-error for="taches.{{ $index }}.titre" class="mt-2" />
                    
                        <textarea wire:model="state.taches.{{ $index }}.description" id="taches.{{ $index }}.description" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Description Tâche ') . $index+1 }}"></textarea>
                        <x-input-error for="taches.{{ $index }}.description" class="mt-2" />
                
                        <button wire:click="removeTache({{ $index }})" wire:loading.attr="disabled" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                            <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                            </svg>
                            <span class="sr-only">Supprimer Tâche</span>
                        </button>
                    </div>
                    @endforeach
                @endif
                <div wire:click="addTache" wire:loading.attr="disabled" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    <p class="ml-2">Ajouter Tâches</p>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="" value="{{ __('Liste des Critères') }}" />
                @if(count($state['criteres']) > 0)
                    @foreach ($state['criteres'] as $index => $tache)           
                    <div class="flex items-center mt-3 px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                
                        <x-input wire:model="state.criteres.{{ $index }}.libelle"  id="criteres.{{ $index }}.libelle" type="text" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Libelle critère ') . $index+1 }}" />
                        <x-input-error for="criteres.{{ $index }}.libelle" class="mt-2" />
                    
                        <button wire:click="removeCritere({{ $index }})" wire:loading.attr="disabled" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                            <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                            </svg>
                            <span class="sr-only">Supprimer Question</span>
                        </button>
                    </div>
                    @endforeach
                @endif
                <div wire:click="addCritere" wire:loading.attr="disabled" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    <p class="ml-2">Ajouter Critères</p>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="" value="{{ __('Liste des Questions') }}" />
                @if(count($state['questions']) > 0)
                    @foreach ($state['questions'] as $index => $tache)           
                    <div class="flex items-center mt-3 px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                
                        <x-input wire:model="state.questions.{{ $index }}.titre" id="questions.{{ $index }}.titre" type="text" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Question ') . $index+1 }}" />
                        <x-input-error for="questions.{{ $index }}.titre" class="mt-2" />
                    
                        <button wire:click="removeQuestion({{ $index }})" wire:loading.attr="disabled" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                            <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                            </svg>
                            <span class="sr-only">Supprimer Question</span>
                        </button>
                    </div>
                    @endforeach
                @endif
                <div wire:click="addQuestion" wire:loading.attr="disabled" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    <p class="ml-2">Ajouter Questions</p>
                </div>
            </div>
        
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingProjetUpdate', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-button class="ml-2" wire:click="updateProjet" wire:loading.attr="disabled">
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