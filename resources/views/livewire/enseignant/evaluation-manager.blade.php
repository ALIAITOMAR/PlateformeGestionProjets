<!-- evaluation-form.blade.php -->

<div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">

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
            <h1 class="text-lg font-bold mb-2">Note Produit</h1>
            @foreach ($criteres as $critere)
                <div class="mb-6">
                    <h3 class="text-lg font-bold mb-2">{{ $critere->libelle }}</h3>
                    @foreach ($critere->indicateurs as $indicateur)
                        <div class="flex items-center mb-4">
                            <label for="indicateur_{{ $indicateur->id }}" class="w-1/3">{{ $indicateur->libelle }}:</label>
                            <input id="notesProduit.{{ $critere->id }}.{{ $indicateur->id }}"
                                   type="text"
                                   wire:model.lazy="state.notesProduit.{{ $critere->id }}.{{ $indicateur->id }}"
                                   class="form-input rounded-md shadow-sm w-2/3"
                                   placeholder="Enter note">
                                   <x-input-error for="notesProduit.{{ $critere->id }}.{{ $indicateur->id }}" class="mt-2" />
                            <p class="text-gray-500 ml-2">Bareme: {{ $indicateur->bareme }}</p>
                            <label for="commentairesProduit.{{ $critere->id }}.{{ $indicateur->id }}" class="w-1/3">Commentaires</label>
                            <textarea id="commentairesProduit.{{ $critere->id }}.{{ $indicateur->id }}" wire:model="state.commentairesProduit.{{ $critere->id }}.{{ $indicateur->id }}" rows="2"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                required></textarea>
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
        <!-- Step 3: Note Propos -->
        <form wire:submit.prevent="nextStep">
            <h1 class="text-lg font-bold mb-2">Note Processus</h1>
            <input type="text" id="noteProcessus" wire:model="state.noteProcessus" class="mt-1 block w-full">
            <x-input-error for="noteProcessus" class="mt-2" />
            <textarea id="commentaireProcessus" wire:model="state.commentaireProcessus" rows="2"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                    required></textarea>
                    <x-input-error for="commentaireProcessus" class="mt-2" />

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
        <!-- Step 3: Note Propos -->
        <form wire:submit.prevent="nextStep">
            <h1 class="text-lg font-bold mb-2">Note Propos</h1>
            @foreach ($questions as $question)
            <div class="mb-6">
                <h3 class="text-lg font-bold mb-2">{{ $question->question }}</h3>
                @if ($question->reponses->isEmpty())
                    <div class="flex items-center mb-4">
                        <span class="italic text-red-500">Aucune réponse.</span>
                        <input id="notesPropos.{{ $question->id }}.0" type="text" wire:model.lazy="state.notesPropos.{{ $question->id }}.0" class="form-input rounded-md shadow-sm w-full mt-2" placeholder="Enter notes">
                        <x-input-error for="notesPropos.{{ $question->id }}.0" class="mt-2" />
                        
                        <textarea id="commentairesPropos.{{ $question->id }}.0" wire:model.lazy="state.commentairesPropos.{{ $question->id }}.0" rows="2"
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                            required></textarea>
                        <x-input-error for="commentairesPropos.{{ $question->id }}.0" class="mt-2" />
                    </div>
                @else
                    @foreach ($question->reponses as $reponse)
                        <div class="flex items-center mb-4">
                            <label for="notesPropos.{{ $question->id }}.{{ $reponse->id }}" class="w-1/3">{{ $reponse->reponse }}:</label>
                            <input
                                id="notesPropos.{{ $question->id }}.{{ $reponse->id }}"
                                type="text"
                                wire:model.lazy="state.notesPropos.{{ $question->id }}.{{ $reponse->id }}"
                                class="form-input rounded-md shadow-sm w-2/3"
                                placeholder="Enter note"
                            >
                            <x-input-error for="notesPropos.{{ $question->id }}.{{ $reponse->id }}" class="mt-2" />
                            
                            <textarea id="commentairesPropos.{{ $question->id }}.{{ $reponse->id }}" wire:model.lazy="state.commentairesPropos.{{ $question->id }}.{{ $reponse->id }}" rows="2"
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                            required></textarea>
                            <x-input-error for="commentairesPropos.{{ $question->id }}.{{ $reponse->id }}" class="mt-2" />
                        </div>
                    @endforeach
                @endif
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
        <!-- Step 3: Note Propos -->
        <form wire:submit.prevent="nextStep">
            <h1 class="text-lg font-bold mb-2">Appreciation</h1>
            
            <textarea id="appreciation" wire:model="state.appreciation" rows="2"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                    ></textarea>
            <x-input-error for="appreciation" class="mt-2" />
                    

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
            <h1 class="text-lg font-bold mb-2">Examiner les données</h1>

            <div class="mt-6">
                <h2 class="text-lg font-bold mb-2">Note Produit</h2>
                @foreach ($criteres as $critere)
                    <div class="mb-6">
                        <h3 class="text-lg font-bold mb-2">{{ $critere->libelle }}</h3>
                        @foreach ($critere->indicateurs as $indicateur)
                            <div class="flex items-center mb-4">
                                <label for="review_indicateur_{{ $indicateur->id }}" class="w-1/3">{{ $indicateur->libelle }}:</label>
                                <span id="review_indicateur_{{ $indicateur->id }}" class="w-2/3">{{ $state['notesProduit'][$critere->id][$indicateur->id] }}</span>
                                <span id="review_indicateur_{{ $indicateur->id }}" class="w-2/3">{{ $state['commentairesProduit'][$critere->id][$indicateur->id] }}</span>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                <h2 class="text-lg font-bold mt-6 mb-2">Note Processus</h2>
                <div class="flex items-center mb-4">
                    <span id="review_noteProcessus" class="w-2/3">{{ $state['noteProcessus'] }}</span>
                    <span id="review_commentaireProcessus" class="w-2/3">{{ $state['commentaireProcessus'] }}</span>
                </div>

                <h2 class="text-lg font-bold mt-6 mb-2">Note Propos</h2>
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
                                <div class="flex items-center mb-4">
                                    <label for="review_reponse_{{ $reponse->id }}" class="w-1/3">{{ $reponse->reponse }}:</label>
                                    <span id="review_reponse_{{ $reponse->id }}" class="w-2/3">
                                        {{ $state['notesPropos'][$question->id][$reponse->id] ?? 'Not provided' }}
                                    </span>
                                    <span id="review_reponse_{{ $reponse->id }}" class="w-2/3">
                                        {{ $state['commentairesPropos'][$question->id][$reponse->id] ?? 'Not provided' }}
                                    </span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach


                <h2 class="text-lg font-bold mt-6 mb-2">Appréciation</h2>
                <div class="flex items-center mb-4">
                    <span id="review_appreciation" class="w-2/3">{{ $state['appreciation'] }}</span>
                </div>
            </div>

            <div class="mt-6">
                <button wire:click="previousStep" type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Précédent
                </button>
                <button wire:click="saveEvaluation" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Enregistrer
                </button>
                <button type="button" wire:click="generatePdf" class="btn btn-primary action-button">
                    Telecharger
                </button>
            </div>
        </div>
    @endif
</div>
