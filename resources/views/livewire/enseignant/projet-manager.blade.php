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

    <div class="flex mt-4 items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
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
                    Module / Unité
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
                        @if($projet->etat == 'Actif')
                        <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                            <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            {{ $projet->etat }}
                        </span>
                        @endif

                        @if($projet->etat == 'Brouillon')
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

                        @if($projet->etat == 'Archivé')
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
                <textarea id="description" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3"  wire:model="state.description"></textarea>
                <x-input-error for="description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="module" value="{{ __('Module / Unité') }}" />
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
                    @foreach ($state['criteres'] as $critereIndex => $critere)
                    <div class="mt-3 px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">

                        <div class="flex items-center mb-2">
                            <x-input wire:model="state.criteres.{{ $critereIndex }}.libelle" id="criteres.{{ $critereIndex }}.libelle" type="text" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Libelle critère ') . $critereIndex+1 }}" />
                            
                            <button wire:click="removeCritere({{ $index }})" wire:loading.attr="disabled" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                </svg>
                                <span class="sr-only">Supprimer Critère</span>
                            </button>
                        </div>
                        <div class="mt-0 px-4">
                            <x-input-error for="criteres.{{ $critereIndex }}.libelle" class="mt-2" />
                        </div>
                        <div>
                            @foreach ($critere['indicateurs'] as $indicateurIndex => $indicateur)
                            <div class="flex items-center mb-2">
                                <x-input wire:model="state.criteres.{{ $critereIndex }}.indicateurs.{{ $indicateurIndex }}.libelle" id="indicateurs.{{ $critereIndex }}.{{ $indicateurIndex }}.libelle" type="text" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-blue-500" placeholder="{{ __('Indicateur ') . $indicateurIndex+1 }}" />
                                
                                <x-input wire:model="state.criteres.{{ $critereIndex }}.indicateurs.{{ $indicateurIndex }}.bareme" id="indicateurs.{{ $critereIndex }}.{{ $indicateurIndex }}.bareme" type="text" class="block mx-4 p-2.5 w-25 text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-blue-500" placeholder="{{ __('Barème') }}" />
                                <button wire:click="removeIndicateur({{ $critereIndex }}, {{ $indicateurIndex }})" wire:loading.attr="disabled" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                    <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                    </svg>
                                    <span class="sr-only">Supprimer Indicateur</span>
                                </button>
                            </div>
                            <div class="mt-0 px-4">
                                <x-input-error for="criteres.{{ $critereIndex }}.indicateurs.{{ $indicateurIndex }}.libelle" class="mt-2" />
                                <x-input-error for="criteres.{{ $critereIndex }}.indicateurs.{{ $indicateurIndex }}.bareme" class="mt-2" />    
                            </div>
                            @endforeach
                            <div wire:click="addIndicateur({{ $critereIndex }})" wire:loading.attr="disabled" class="flex items-center justify-center text-blue-600 text-sm py-2 cursor-pointer">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                                <span class="ml-2">Ajouter Indicateur</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                <div wire:click="addCritere" wire:loading.attr="disabled" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    <span class="ml-2">Ajouter Critère</span>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="" value="{{ __('Liste des Questions') }}" />
                @if(count($state['questions']) > 0)
                    @foreach ($state['questions'] as $index => $tache)           
                    <div class="flex items-center mt-3 px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                
                        <x-input wire:model="state.questions.{{ $index }}.question" id="questions.{{ $index }}.question" type="text" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Question ') . $index+1 }}" />
                        <x-input-error for="questions.{{ $index }}.question" class="mt-2" />
                    
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
                <x-label for="create-file" value="{{ __('Pièces jointes') }}" />
                <div
                    x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = true; progress = 0;"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                    x-on:livewire-upload-cancel="isUploading = false; progress = 0;"
                    @dragover.prevent
                    @drop.prevent="isUploading = true; $refs.fileInput.files = $event.dataTransfer.files; $refs.fileInput.dispatchEvent(new Event('change'));"
                >
                    <label class="group p-4 mt-3 sm:p-7 block cursor-pointer text-center border-2 border-dashed border-gray-200 rounded-lg focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 dark:border-neutral-700">
                        <input id="create-file" name="file" type="file" wire:model="file" class="sr-only">
                        <svg class="size-10 mx-auto text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                        </svg>
                        <span class="mt-2 block text-sm text-gray-800 dark:text-neutral-200">
                            Parcourir votre appareil <span class="group-hover:text-blue-700 text-blue-600">Faire glisser-déposer</span>
                        </span>
                        <span class="mt-1 block text-xs text-gray-500 dark:text-neutral-500">
                            Taille maximale du fichier est de 2 MB
                        </span>
                    </label>
                    <div x-show="isUploading">
                        <div class="mb-2 flex justify-between items-center">
                            <div class="flex items-center mt-3 gap-x-3">
                                <span class="size-8 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg dark:border-neutral-700 dark:text-neutral-500">
                                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" x2="12" y1="3" y2="15"></line>
                                    </svg>
                                </span>
                                <div>
                                    @if ($file)
                                    <p class="text-sm font-medium text-gray-800 dark:text-white">{{ $file->getClientOriginalName() }}</p>
                                    <p class="text-xs text-gray-500 dark:text-neutral-500">{{ formatBytes($file->getSize()) }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="inline-flex items-center gap-x-2">
                                @if($file && $file->getSize() > 0)
                                <svg class="flex-shrink-0 size-4 text-teal-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                </svg>
                                @else
                                <a wire:click="$cancelUpload('file')" class="text-gray-500 hover:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200" href="#">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18"></path>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                    <line x1="10" x2="10" y1="11" y2="17"></line>
                                    <line x1="14" x2="14" y1="11" y2="17"></line>
                                    </svg>
                                </a>
                                <span class="text-sm text-gray-800 dark:text-white" x-text="progress"></span>%
                                @endif
                            </div>
                        </div>
                        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500" :style="{ width: `${progress}%` }">
                            </div>
                        </div>
                    </div>
                </div>
                <x-input-error for="file" class="mt-2" />
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
                <x-label for="titre" value="{{ __('Titre') }}" />
                <x-input id="titre" type="text" class="mt-1 block w-full" wire:model="state.titre" />
                <x-input-error for="titre" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="description" value="{{ __('Description') }}" />
                <textarea id="description" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3" wire:model="state.description"></textarea>
                <x-input-error for="description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="module" value="{{ __('Module / Unité') }}" />
                <x-input id="module" type="text" class="mt-1 block w-full" wire:model="state.module" />
                <x-input-error for="module" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="competence" value="{{ __('Competences') }}" />
                <x-input id="competence" type="text" class="mt-1 block w-full" wire:model="state.competence" />
                <x-input-error for="competence" class="mt-2" />
                @if(isset($state['competence']))
                <div class="mt-2">
                    @foreach (explode(',', $state['competence']) as $value)
                        <span class="mt-1 inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">
                            <span class="size-1.5 inline-block rounded-full bg-blue-800 dark:bg-blue-500"></span>
                            {{ $value }}
                        </span>
                    @endforeach
                </div>
                @endif
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
                    @foreach ($state['criteres'] as $critereIndex => $critere)
                    <div class="mt-3 px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">

                        <div class="flex items-center mb-2">
                            <x-input wire:model="state.criteres.{{ $critereIndex }}.libelle" id="criteres.{{ $critereIndex }}.libelle" type="text" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Libelle critère ') . $critereIndex+1 }}" />
                            
                            <button wire:click="removeCritere({{ $index }})" wire:loading.attr="disabled" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                </svg>
                                <span class="sr-only">Supprimer Critère</span>
                            </button>
                        </div>
                        <div class="mt-0 px-4">
                            <x-input-error for="criteres.{{ $critereIndex }}.libelle" class="mt-2" />
                        </div>
                        <div>
                            @foreach ($critere['indicateurs'] as $indicateurIndex => $indicateur)
                            <div class="flex items-center mb-2">
                                <x-input wire:model="state.criteres.{{ $critereIndex }}.indicateurs.{{ $indicateurIndex }}.libelle" id="indicateurs.{{ $critereIndex }}.{{ $indicateurIndex }}.libelle" type="text" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-blue-500" placeholder="{{ __('Indicateur ') . $indicateurIndex+1 }}" />
                                
                                <x-input wire:model="state.criteres.{{ $critereIndex }}.indicateurs.{{ $indicateurIndex }}.bareme" id="indicateurs.{{ $critereIndex }}.{{ $indicateurIndex }}.bareme" type="text" class="block mx-4 p-2.5 w-25 text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-blue-500" placeholder="{{ __('Barème') }}" />
                                <button wire:click="removeIndicateur({{ $critereIndex }}, {{ $indicateurIndex }})" wire:loading.attr="disabled" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                    <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                    </svg>
                                    <span class="sr-only">Supprimer Indicateur</span>
                                </button>
                            </div>
                            <div class="mt-0 px-4">
                                <x-input-error for="criteres.{{ $critereIndex }}.indicateurs.{{ $indicateurIndex }}.libelle" class="mt-2" />
                                <x-input-error for="criteres.{{ $critereIndex }}.indicateurs.{{ $indicateurIndex }}.bareme" class="mt-2" />    
                            </div>
                            @endforeach
                            <div wire:click="addIndicateur({{ $critereIndex }})" wire:loading.attr="disabled" class="flex items-center justify-center text-blue-600 text-sm py-2 cursor-pointer">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                                <span class="ml-2">Ajouter Indicateur</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                <div wire:click="addCritere" wire:loading.attr="disabled" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    <span class="ml-2">Ajouter Critère</span>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="" value="{{ __('Liste des Questions') }}" />
                @if(count($state['questions']) > 0)
                    @foreach ($state['questions'] as $index => $tache)           
                    <div class="flex items-center mt-3 px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                
                        <x-input wire:model="state.questions.{{ $index }}.question" id="questions.{{ $index }}.question" type="text" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Question ') . $index+1 }}" />
                        <x-input-error for="questions.{{ $index }}.question" class="mt-2" />
                    
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
            
            @if(isset($projet->piece_jointe))
            <span class="flex items-center gap-2 text-sm font-medium text-gray-900 dark:text-white pb-2">
                <button type="button" class="flex items-center gap-x-2 text-gray-500 hover:text-blue-600 whitespace-nowrap dark:text-neutral-500 dark:hover:text-blue-500">
                    <svg class="flex-shrink-0 w-[18px] h-[18px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
                    </svg>                                 
                    <a href="#" wire:click.prevent="telechargerFichier('{{ $projet->piece_jointe }}')">
                        {{ basename($projet->piece_jointe) }}
                    </a>
                </button>
                ({{ formatBytes(Storage::size($projet->piece_jointe)) }})
            </span>
            @endif

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="edit-file" value="{{ __('Pièces jointes') }}" />
                <div
                    x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = true; progress = 0;"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                    x-on:livewire-upload-cancel="isUploading = false; progress = 0;"
                    @dragover.prevent
                    @drop.prevent="isUploading = true; $refs.fileInput.files = $event.dataTransfer.files; $refs.fileInput.dispatchEvent(new Event('change'));"
                >
                    <label class="group p-4 mt-3 sm:p-7 block cursor-pointer text-center border-2 border-dashed border-gray-200 rounded-lg focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 dark:border-neutral-700">
                        <input id="edit-file" name="file" type="file" wire:model="file" class="sr-only">
                        <svg class="size-10 mx-auto text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                        </svg>
                        <span class="mt-2 block text-sm text-gray-800 dark:text-neutral-200">
                            Parcourir votre appareil <span class="group-hover:text-blue-700 text-blue-600">Faire glisser-déposer</span>
                        </span>
                        <span class="mt-1 block text-xs text-gray-500 dark:text-neutral-500">
                            Taille maximale du fichier est de 2 MB
                        </span>
                    </label>
                    <div x-show="isUploading">
                        <div class="mb-2 flex justify-between items-center">
                            <div class="flex items-center mt-3 gap-x-3">
                                <span class="size-8 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg dark:border-neutral-700 dark:text-neutral-500">
                                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" x2="12" y1="3" y2="15"></line>
                                    </svg>
                                </span>
                                <div>
                                    @if ($file)
                                    <p class="text-sm font-medium text-gray-800 dark:text-white">{{ $file->getClientOriginalName() }}</p>
                                    <p class="text-xs text-gray-500 dark:text-neutral-500">{{ formatBytes($file->getSize()) }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="inline-flex items-center gap-x-2">
                                @if($file && $file->getSize() > 0)
                                <svg class="flex-shrink-0 size-4 text-teal-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                </svg>
                                @else
                                <a wire:click="$cancelUpload('file')" class="text-gray-500 hover:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200" href="#">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18"></path>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                    <line x1="10" x2="10" y1="11" y2="17"></line>
                                    <line x1="14" x2="14" y1="11" y2="17"></line>
                                    </svg>
                                </a>
                                <span class="text-sm text-gray-800 dark:text-white" x-text="progress"></span>%
                                @endif
                            </div>
                        </div>
                        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500" :style="{ width: `${progress}%` }">
                            </div>
                        </div>
                    </div>
                </div>
                <x-input-error for="file" class="mt-2" />
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