<!-- evaluation-form.blade.php -->

<div>
    @if (session()->has('message'))
    <div id="toast-bottom-left" class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow bottom-5 left-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>    
    <div class="ms-3 font-normal">{{ session('message') }}</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif

    <ol class="flex items-center whitespace-nowrap">
        <li class="inline-flex items-center">
            <a class="flex items-center text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
            <svg class="flex-shrink-0 me-3 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
                Tableau de bord
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
        <li class="inline-flex items-center">
            <a class="flex items-center text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
            <svg class="flex-shrink-0 me-3 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
                Projets
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
        <li class="inline-flex items-center font-semibold text-gray-800 truncate dark:text-neutral-200" aria-current="page">
            Evaluation
        </li>
    </ol>

        <!-- Card -->
    <div class="mt-5 flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                    
                    <!-- Table -->
                    <div class="px-6 py-4 grid">
                        
                    <ol class="flex items-center w-full mb-4 sm:mb-5 block">
                        <li class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
                            <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
                                <svg class="w-4 h-4 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                    <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"/>
                                </svg>
                            </div>
                        </li>
                        <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                            <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                <svg class="w-4 h-4 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                    <path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM2 12V6h16v6H2Z"/>
                                    <path d="M6 8H4a1 1 0 0 0 0 2h2a1 1 0 0 0 0-2Zm8 0H9a1 1 0 0 0 0 2h5a1 1 0 1 0 0-2Z"/>
                                </svg>
                            </div>
                        </li>
                        <li class="flex items-center w-full">
                            <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                <svg class="w-4 h-4 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                                </svg>
                            </div>
                        </li>
                        <li class="flex items-center w-full">
                            <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                <svg class="w-4 h-4 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                                </svg>
                            </div>
                        </li>
                        <li class="flex items-center w-full">
                            <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                <svg class="w-4 h-4 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                                </svg>
                            </div>
                        </li>
                        <li class="flex items-center w-full">
                            <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                <svg class="w-4 h-4 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                                </svg>
                            </div>
                        </li>
                    </ol>

                    @if ($currentStep === 1)
                        <!-- Step 1: Classe and Projet Selection -->
                         
                        <form wire:submit.prevent="nextStep">
                            <div>
                                <label for="classe">Classe / Groupe:</label>
                                <select id="classe" wire:model.live="classeId" class="form-select mt-1 block w-full">
                                    <option value="">Select Classe</option>
                                    @foreach ($classes as $classe)
                                        <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                                    @endforeach
                                </select>
                                @error('classeId') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mt-4">
                                <label for="apprenant">Apprenant:</label>
                                <select id="apprenant" wire:model.live="apprenantId" class="form-select mt-1 block w-full">
                                    <option value="">Select Apprenant</option>
                                    @foreach ($apprenants as $apprenant)
                                        <option value="{{ $apprenant->id }}">{{ $apprenant->user->nom }} {{ $apprenant->user->prenom }}</option>
                                    @endforeach
                                </select>
                                @error('apprenantId') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mt-4">
                                <label for="projet">Projet:</label>
                                <select id="projet" wire:model="projetId" class="form-select mt-1 block w-full">
                                    <option value="">Select Project</option>
                                    @foreach ($projets as $projet)
                                        <option value="{{ $projet->id }}">{{ $projet->titre }}</option>
                                    @endforeach
                                </select>
                                @error('projetId') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Suivant
                                </button>
                            </div>
                        </form>

                    @elseif ($currentStep === 2)

                    <!-- Step 2: Note Produit -->

                    <form wire:submit.prevent="nextStep">
                        <h3 class="mb-4 text-lg font-bold font-medium leading-none text-gray-900 dark:text-white">Note Produit</h3>
                        @foreach ($criteres as $critere)
                            <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">{{ $critere->libelle }}</h3>
                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                @foreach ($critere->indicateurs as $indicateur)
                                    <div>
                                        <label for="indicateur_{{ $indicateur->id }}" class="block mb-2 font-medium text-gray-900 dark:text-white">{{ $indicateur->libelle }}</label>
                                        <input type="text" wire:model.lazy="state.notesProduit.{{ $critere->id }}.{{ $indicateur->id }}" id="notesProduit.{{ $critere->id }}.{{ $indicateur->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error for="notesProduit.{{ $critere->id }}.{{ $indicateur->id }}" class="mt-2" />
                                        <span for="email" class="block mb-2 font-medium text-gray-900 dark:text-white">Barème: {{ $indicateur->bareme }}</label>
                                    </div>
                                    <div>
                                        <label for="commentairesProduit.{{ $critere->id }}.{{ $indicateur->id }}" class="block mb-2 font-medium text-gray-900 dark:text-white">Commentaires</label>
                                        <textarea id="commentairesProduit.{{ $critere->id }}.{{ $indicateur->id }}" rows="5" wire:model="state.commentairesProduit.{{ $critere->id }}.{{ $indicateur->id }}"  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </textarea>
                                        <x-input-error for="commentairesProduit.{{ $critere->id }}.{{ $indicateur->id }}" class="mt-2" />
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        <div class="mt-6">
                            <button wire:click="previousStep" type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Précédent
                            </button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Suivant
                            </button>
                        </div>
                    </form>
                
                    @elseif ($currentStep === 3)

                    <!-- Step 3: Note Processus -->

                    <form wire:submit.prevent="nextStep">
                        <h3 class="mb-4 text-lg font-bold font-medium leading-none text-gray-900 dark:text-white">Note Processus</h3>
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <label for="noteProcessus" class="block mb-2 font-medium text-gray-900 dark:text-white">Note</label>
                                <input type="text" id="noteProcessus" wire:model="state.noteProcessus" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                <x-input-error for="noteProcessus" class="mt-2" />

                                <label for="commentaireProcessus" class="mt-2 block mb-2  font-medium text-gray-900 dark:text-white">Commentaires</label>
                                <textarea id="commentaireProcessus" wire:model="state.commentaireProcessus" rows="5" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                <x-input-error for="commentaireProcessus" class="mt-2" />
                            </div>
                        </div>
                        <div class="mt-6">
                            <button wire:click="previousStep" type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Précédent
                            </button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Suivant
                            </button>
                        </div>
                    </form>

                    @elseif ($currentStep === 4)
                        <!-- Step 4: Note Propos -->

                        <form wire:submit.prevent="nextStep">
                        <h3 class="mb-4 text-lg font-bold font-medium leading-none text-gray-900 dark:text-white">Note Propos</h3>
                        @foreach ($questions as $question)
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <h3 class="text-lg font-bold mb-1">{{ $question->question }}</h3>
                                @if ($question->reponses->isEmpty())
                                    <span class="mt-2 italic text-red-500">Aucune réponse.</span>
                                    <label for="notesPropos.{{ $question->id }}.0" class="block mb-2 font-medium text-gray-900 dark:text-white">Note</label>
                                    <input type="text" id="notesPropos.{{ $question->id }}.0" wire:model.lazy="state.notesPropos.{{ $question->id }}.0" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                    <x-input-error for="notesPropos.{{ $question->id }}.0" class="mt-2" />

                                    <label for="commentairesPropos.{{ $question->id }}.0" class="mt-2 block mb-2 font-medium text-gray-900 dark:text-white">Commentaires</label>
                                    <textarea id="commentairesPropos.{{ $question->id }}.0" rows="5" wire:model.lazy="state.commentairesPropos.{{ $question->id }}.0" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </textarea>
                                    <x-input-error for="commentairesPropos.{{ $question->id }}.0" class="mt-2" />
                                @else
                                    @foreach ($question->reponses as $reponse)

                                        <span class="italic">{{ $reponse->reponse }}</span>
                                        <label for="notesPropos.{{ $question->id }}.{{ $reponse->id }}" class="block mb-2 font-medium text-gray-900 dark:text-white">Note</label>
                                        <input type="text" id="notesPropos.{{ $question->id }}.{{ $reponse->id }}" wire:model.lazy="state.notesPropos.{{ $question->id }}.{{ $reponse->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                        <x-input-error for="notesPropos.{{ $question->id }}.{{ $reponse->id }}" class="mt-2" />

                                        <label for="commentairesPropos.{{ $question->id }}.{{ $reponse->id }}" class="mt-2 block mb-2 font-medium text-gray-900 dark:text-white">Commentaires</label>
                                        <textarea id="commentairesPropos.{{ $question->id }}.{{ $reponse->id }}" rows="5" wire:model.lazy="state.commentairesPropos.{{ $question->id }}.{{ $reponse->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </textarea>
                                        <x-input-error for="commentairesPropos.{{ $question->id }}.{{ $reponse->id }}" class="mt-2" />
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @endforeach
                        <div class="mt-6">
                            <button wire:click="previousStep" type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Précédent
                            </button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Suivant
                            </button>
                        </div>
                    </form>
                    
                    @elseif ($currentStep === 5)

                    <!-- Step 3: Note Processus -->

                    <form wire:submit.prevent="nextStep">
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <label for="appreciation" class="mt-2 block mb-2 font-medium text-gray-900 dark:text-white">Appréciation</label>
                                <textarea id="appreciation" wire:model="state.appreciation" rows="5" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                <x-input-error for="appreciation" class="mt-2" />
                            </div>
                        </div>
                        <div class="mt-6">
                            <button wire:click="previousStep" type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Précédent
                            </button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Suivant
                            </button>
                        </div>
                    </form>

                    @elseif ($currentStep === 6)
                        <!-- Step 4: Examiner les données et enregistrer -->
                        <div>
                            <h1 class="text-lg font-bold mb-2">Examiner les données et enregistrer</h1>

                            <div class="mt-6">
                                <h2 class="text-lg font-bold mb-2 border-b-2 border-gray-300 pb-2">Note Produit</h2>
                                @foreach ($criteres as $critere)
                                    <div class="mb-6">
                                        <h3 class="text-lg font-bold mb-2">{{ $critere->libelle }}</h3>
                                        @foreach ($critere->indicateurs as $indicateur)
                                                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                    <div>
                                                        <label for="review_indicateur_{{ $indicateur->id }}" id="" class="block mb-2 font-medium text-gray-900 dark:text-white">{{ $indicateur->libelle }}</label>
                                                        <span id="review_indicateur_{{ $indicateur->id }}" class="block mb-2 font-medium text-gray-900 dark:text-white">{{ $state['notesProduit'][$critere->id][$indicateur->id] ?? '' }}</span>
                                                        <span id="review_indicateur_{{ $indicateur->id }}" class="block mb-2 font-medium text-gray-900 dark:text-white">{{ $state['commentairesProduit'][$critere->id][$indicateur->id] ?? '' }}</span>
                                                    </div>
                                                </div>
                                        @endforeach
                                    </div>
                                @endforeach

                                <h2 class="text-lg font-bold mt-6 mb-2 border-b-2 border-gray-300 pb-2">Note Processus</h2>

                                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                    <div>
                                        <span id="review_noteProcessus" class="block mb-2 font-medium text-gray-900 dark:text-white">{{ $state['noteProcessus'] ?? ''}}</span>
                                        <span id="review_commentaireProcessus" class="block mb-2 font-medium text-gray-900 dark:text-white">{{ $state['commentaireProcessus'] ?? '' }}</span>
                                    </div>
                                </div>

                                <h2 class="text-lg font-bold mt-6 mb-2 border-b-2 border-gray-300 pb-2">Note Propos</h2>
                                @foreach ($questions as $question)
                                    <div class="mb-6">
                                        <h3 class="text-lg font-bold mb-2">{{ $question->question }}</h3>
                                        @if ($question->reponses->isEmpty())
                                            <p class="italic text-red-500">Aucune réponse.</p>
                                            @if (isset($state['notesPropos'][$question->id]))
                                                @foreach ($state['notesPropos'][$question->id] as $note)
                                                <div class="flex items-center mb-4">
                                                    <span class="w-2/3">{{ $note }}</span>
                                                </div>
                                                @endforeach
                                            @endif
                                            @if (isset($state['commentairesPropos'][$question->id]))
                                                @foreach ($state['commentairesPropos'][$question->id] as $commentaire)
                                                <div class="flex items-center mb-4">
                                                    <span class="w-2/3">{{ $commentaire }}</span>
                                                </div>
                                                @endforeach
                                            @endif
                                        @else
                                            @foreach ($question->reponses as $reponse)

                                                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                    <div>
                                                        <label for="review_reponse_{{ $reponse->id }}" id="" class="block mb-2 font-medium text-gray-900 dark:text-white">{{ $reponse->reponse }}</label>
                                                        <span id="review_reponse_{{ $reponse->id }}" class="block mb-2 font-medium text-gray-900 dark:text-white">{{ $state['notesPropos'][$question->id][$reponse->id] ?? '' }}</span>
                                                        <span id="review_reponse_{{ $reponse->id }}" class="block mb-2 font-medium text-gray-900 dark:text-white">{{ $state['commentairesPropos'][$question->id][$reponse->id] ?? '' }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach

                                <h2 class="text-lg font-bold mt-6 mb-2 border-b-2 border-gray-300 pb-2">Appréciation</h2>
                                <div class="flex items-center mb-4">
                                    <span id="review_appreciation" class="w-2/3">{{ $state['appreciation'] ?? '' }}</span>
                                </div>
                            </div>
                            <div class="mt-6">
                                <button wire:click="previousStep" type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Précédent
                                </button>
                                
                                <button wire:click="generatePdf"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:loading.class="opacity-50">
                                    <span wire:loading.remove>{{ __('Générer le rapport') }}</span>
                                    <div wire:loading class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full dark:text-white-500" role="status" aria-label="loading">
                                    </div>
                                </button>
                            </div>
                        </div>   
                    @endif
                    </div>
                    <!-- End Table -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>


