<div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <section>
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <!-- Stepper -->
            <ul class="relative flex flex-row gap-x-2 items-center w-full lg:max-w-2xl xl:max-w-2xl">
                <!-- Item -->
                <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group">
                    <div class="min-w-7 min-h-7 inline-flex justify-center items-center text-xs align-middle">
                    <span class="size-10 flex justify-center items-center flex-shrink-0 bg-green-600 font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
                        <svg class="w-3.5 h-3.5 text-white-600 lg:w-3 lg:h-3 dark:text-white-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                        </svg>
                    </span>
                    <span class="ms-2 block text-sm font-medium text-gray-800 dark:text-white">
                        L'enseignant a créé<br />
                        le projet
                    </span>
                    </div>
                    <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden dark:bg-neutral-700"></div>
                </li>
                <!-- End Item -->

                <!-- Item -->
                <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group">
                    <div class="min-w-7 min-h-7 inline-flex justify-center items-center text-xs align-middle">
                        @if ($affectation->livrable && in_array($affectation->livrable->etat, ['Rendu', 'Rendu en retard','Approuvé', 'Rejeté']))
                        <span class="size-10 flex justify-center items-center flex-shrink-0 bg-green-600 font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
                            <svg class="w-3.5 h-3.5 text-white-600 lg:w-3 lg:h-3 dark:text-white-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                            </svg>
                        </span>
                        <span class="ms-2 block text-sm font-medium text-gray-800 dark:text-white">
                            Projet livré
                        </span>
                        @else
                        <span class="size-10 flex justify-center items-center flex-shrink-0 bg-yellow-600 font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
                            <svg class="w-3.5 h-3.5 text-white-600 lg:w-3 lg:h-3 dark:text-white-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </span>
                        <span class="ms-2 block text-sm font-medium text-gray-800 dark:text-white">
                            Projet en cours<br />
                            Livrer bientôt
                        </span>
                        @endif
                    </div>
                    <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden dark:bg-neutral-700"></div>
                </li>
                <!-- End Item -->
    
                <!-- Item -->
                <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group">
                    <div class="min-w-7 min-h-7 inline-flex justify-center items-center text-xs align-middle">
                    
                    @if($affectation->etat !== 'Clôturé')
                        @if ($affectation->livrable && in_array($affectation->livrable->etat, ['Rendu', 'Rendu en retard']))
                        <span class="size-10 flex justify-center items-center flex-shrink-0 bg-yellow-600 font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
                            <svg class="w-3.5 h-3.5 text-white-600 lg:w-3 lg:h-3 dark:text-white-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </span>
                        <span class="ms-2 block text-sm font-medium text-gray-800 dark:text-white">
                            En attente de l'avis du <br />
                            l'enseignant
                        </span>
                        @elseif ($affectation->livrable && $affectation->livrable->etat === 'Approuvé')
                        <span class="size-10 flex justify-center items-center flex-shrink-0 bg-green-600 font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
                            <svg class="w-3.5 h-3.5 text-white-600 lg:w-3 lg:h-3 dark:text-white-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                            </svg>
                        </span>
                        <span class="ms-2 block text-sm font-medium text-gray-800 dark:text-white">
                            Projet approuvé <br />
                            Terminé
                        </span>
                        @elseif ($affectation->livrable && $affectation->livrable->etat === 'Rejeté')
                        <span class="size-10 flex justify-center items-center flex-shrink-0 bg-red-600 font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
                            <svg class="w-3.5 h-3.5 text-white-600 lg:w-3 lg:h-3 dark:text-white-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                            </svg>
                        </span>
                        <span class="ms-2 block text-sm font-medium text-gray-800 dark:text-white">
                            Projet rejeté <br />
                            Livrer à nouveau
                        </span>
                        @endif
                    @else
                    <span class="size-10 flex justify-center items-center flex-shrink-0 bg-green-600 font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
                        <svg class="w-3.5 h-3.5 text-white-600 lg:w-3 lg:h-3 dark:text-white-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                        </svg>
                    </span>
                    <span class="ms-2 block text-sm font-medium text-gray-800 dark:text-white">
                        Projet Clôturé
                    </span>
                    @endif
                    
                    </div>
                    <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden dark:bg-neutral-700"></div>
                </li>
                <!-- End Item -->
            </ul>
            <!-- End Stepper -->

            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-2xl">
                    <div class="space-y-6">
                        
                    <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">{{ $affectation->projet->titre }}</h2>
                            <div class="mt-3">
                                
                                {{ $affectation->projet->description }}

                                @if($affectation->projet->criteres->isNotEmpty())
                                <div class="mt-5 grid sm:flex gap-x-3 text-sm">
                                    <div class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                    Criteres
                                    </div>
                                    <div class="font-medium text-gray-800 dark:text-neutral-200">
                                        <ol class="list-decimal list-inside text-gray-800 dark:text-white">
                                            @foreach($affectation->projet->criteres as $critere)  
                                                <li class="not-italic font-normal">{{ $critere->libelle }}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                                @endif

                                @if($affectation->projet->questions->isNotEmpty())
                                <div class="mt-3 grid sm:flex gap-x-3 text-sm">
                                    <div class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                    Questions
                                    </div>
                                    <div class="font-medium text-gray-800 dark:text-neutral-200">
                                        <ol class="list-decimal list-inside text-gray-800 dark:text-white">
                                            @foreach($affectation->projet->questions as $question)  
                                                <li class="not-italic font-normal">{{ $question->titre }}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                                @endif

                                @if($affectation->projet->taches->isNotEmpty())
                                <div class="mt-3 grid sm:flex gap-x-3 text-sm">
                                    <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                    Tâches
                                    </dt>
                                    <div class="font-medium text-gray-800 dark:text-neutral-200">
                                        <ol class="list-decimal list-inside text-gray-800 dark:text-white">
                                            @foreach($affectation->projet->taches as $tache)  
                                                <li class="font-semibold">{{ $tache->titre }}</li>
                                                <p class="not-italic font-normal">
                                                    {{ $tache->description }}
                                                </p>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                                @endif

                                <div class="grow mt-2 space-y-3">

                                    @if (Storage::exists($affectation->projet->piece_jointe))
                                    <div class="mt-3">
                                        <p class="text-gray-800 dark:text-neutral-200">
                                            Pièces jointes
                                        </p>
                                        <div class="me-2">
                                            <span class="flex items-center gap-2 text-sm font-medium text-gray-900 dark:text-white pb-2">
                                                <button type="button" class="flex items-center gap-x-2 text-gray-500 hover:text-blue-600 whitespace-nowrap dark:text-neutral-500 dark:hover:text-blue-500">
                                                    <svg class="flex-shrink-0 w-[18px] h-[18px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
                                                        <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
                                                    </svg>                                 
                                                    <a href="#" wire:click.prevent="telechargerFichier('{{ $affectation->projet->piece_jointe }}')">
                                                        {{ basename($affectation->projet->piece_jointe) }}
                                                    </a>
                                                </button>
                                                ({{ formatBytes(Storage::size($affectation->projet->piece_jointe)) }})
                                            </span>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="mt-2 items-center justify-between sm:flex">
                                        <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">{{ $affectation->projet->created_at->format('H:i j F, Y') }}</time>
                                    </div>
                                </div>
                            </div>
                        </div>         
                        
                        @if ($livrables->isNotEmpty())
                        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl"></h2>
                            <div class="mt-3">
                                <ol class="mt-5 relative border-s border-gray-200 dark:border-gray-700">                  
                                    @foreach ($livrables as $livrable)
                                    <li class="mb-10 ms-6">
                                        <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                            <img class="rounded-full shadow-lg" src="{{ Auth::user()->profile_photo_url }}" alt="{{ $affectation->projet->enseignant->user->nom }}" alt="Thomas Lean image"/>
                                        </span>

                                        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                                            
                                            <div class="flex justify-between">
                                                <span class="mt-2 text-xs font-normal text-gray-400">
                                                    <span class="mt-2 mr-2 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">
                                                        @if($livrable->etat === 'Rendu')    
                                                        <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-green-200">
                                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                                            </svg>
                                                            {{ $livrable->etat }}
                                                        </span>
                                                        @endif

                                                        @if($livrable->etat === 'Approuvé')    
                                                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                            </svg>
                                                            {{ $livrable->etat }}
                                                        </span>
                                                        @endif

                                                        @if($livrable->etat === 'Rejeté')    
                                                        <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-green-200">
                                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>
                                                            </svg>
                                                            {{ $livrable->etat }}
                                                        </span>
                                                        @endif
                                                    </span>
                                                </span>

                                                <span class="mt-2 text-xs font-normal text-gray-400">
                                                    Version {{ $loop->iteration }}.0
                                                </span>
                                            </div>

                                        
                                            @if($livrable->description)
                                            <div class="mt-4 items-center justify-between sm:flex">
                                                <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">{{ $livrable->description }}</div>
                                            </div>
                                            @endif
                                            
                                            @if (Storage::exists($livrable->piece_jointe))
                                            <div class="mt-3">
                                                Fichiers livrés
                                                <div class="me-2">
                                                    <span class="flex items-center gap-2 text-sm font-medium text-gray-900 dark:text-white pb-2">
                                                        <button type="button" class="flex items-center gap-x-2 text-gray-500 hover:text-blue-600 whitespace-nowrap dark:text-neutral-500 dark:hover:text-blue-500">
                                                            <svg class="flex-shrink-0 w-[18px] h-[18px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
                                                                <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
                                                            </svg>                                 
                                                            <a href="#" wire:click.prevent="telechargerFichier('{{ $livrable->piece_jointe }}')">
                                                                {{ basename($livrable->piece_jointe) }}
                                                            </a>
                                                        </button>
                                                        ({{ formatBytes(Storage::size($livrable->piece_jointe)) }})
                                                    </span>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="mt-2 items-center justify-between sm:flex">
                                                <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">{{ $livrable->created_at->format('H:i j F, Y') }}</time>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        @endif

                        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl"></h2>
                            <div class="mt-3">
                                <div class="p-4 text-center overflow-y-auto">
                                    <!-- Icon -->
                                    <span class="mb-4 inline-flex justify-center items-center size-[46px] rounded-full border-4 border-green-50 bg-green-100 text-green-500 dark:bg-green-700 dark:border-green-600 dark:text-green-100">
                                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                                    </svg>
                                    </span>
                                    <!-- End Icon -->

                                    <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
                                        PROJET EN COURS
                                    </h3>
                                    <p class="text-gray-500 dark:text-neutral-500">
                                        Le compte à rebours du projet est en cours<br />
                                        Veuillez continuer à suivre les progrès.
                                    </p>
                                </div>    
                            </div>
                        </div>

                        @if($affectation->etat === 'Actif')
                        <div class="flex flex-col items-center justify-center">
                                <x-button type="button" wire:click="confirmLivrableAdd" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 bg-green-500 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Marquer comme terminé
                                </x-button>
                            <div class="mt-4">
                                <span class="text-gray-500 font-bold">- OU -</span>
                            </div>
                        </div>
                        @endif

                        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl"></h2>
                            <div class="mt-3">
                                
                                <section class="bg-white dark:bg-gray-900 py-2 lg:py-4 antialiased">
                                    <div class="">
                                        <div class="flex justify-between items-center mb-6">
                                            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Commentaires ({{ $commentaires->count() }}) </h2>
                                        </div>
                                    
                                        @if($affectation->etat === 'Actif')
                                        <form class="mb-6" wire:submit.prevent="postCommentaire">
                                            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                                <label for="commentaire" class="sr-only">Commentaire</label>
                                                <textarea id="commentaire" wire:model="state.commentaire" rows="6"
                                                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                                    placeholder="Écrire un commentaire.." required></textarea>
                                                <x-input-error for="commentaire" class="mt-2" />
                                            </div>
                                            <x-button  type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                Poster
                                            </x-button>
                                        </form>
                                        @endif
                                        
                                        @foreach($commentaires as $commentaire)
                                        <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                                            <footer class="flex justify-between items-center mb-2">
                                                <div class="flex items-center">
                                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                                        <img class="mr-2 w-6 h-6 rounded-full" src="{{ $commentaire->user->profile_photo_url }}" alt="{{ $commentaire->user->nom }} {{ $commentaire->user->prenom }}">
                                                        {{ $commentaire->user->nom }} {{ $commentaire->user->prenom }} 
                                                        @if($commentaire->user->hasRole('enseignant'))
                                                        <span class="ms-1 align-middle inline bg-blue-50 border border-blue-300 text-blue-600 text-[.6125rem] leading-4 uppercase align-middle rounded-full py-0.5 px-2 dark:bg-blue-900/70 dark:border-blue-700 dark:text-blue-500">Enseignant</span>
                                                        @endif
                                                    </p>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                                        <time pubdate datetime="2022-02-08"title="February 8th, 2022">{{ $commentaire->created_at->format('j F, Y') }}</time>
                                                    </p>
                                                </div>
                                            </footer>
                                            <p class="text-gray-500 dark:text-gray-400">{{ $commentaire->commentaire }}</p>
                                            <div x-data="{ showForm: false }">
                                                <div class="flex items-center mt-4 space-x-4">
                                                    <button type="button" wire:click="voteUp({{ $commentaire->id }})" class="flex items-center text-sm text-gray-500 dark:text-gray-400 font-medium">
                                                        <svg class="mr-1.5 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 10v12"/><path d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2h0a3.13 3.13 0 0 1 3 3.88Z"/></svg>
                                                        {{ $commentaire->thumbs_up }}
                                                    </button>
                                                    <button type="button" wire:click="voteDown({{ $commentaire->id }})" class="flex items-center text-sm text-gray-500 dark:text-gray-400 font-medium">
                                                        <svg class="mr-1.5 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 14V2"/><path d="M9 18.12 10 14H4.17a2 2 0 0 1-1.92-2.56l2.33-8A2 2 0 0 1 6.5 2H20a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.76a2 2 0 0 0-1.79 1.11L12 22h0a3.13 3.13 0 0 1-3-3.88Z"/></svg>
                                                        {{ $commentaire->thumbs_down }}
                                                    </button>
                                                    
                                                    @if($affectation->etat === 'Actif')
                                                    <button @click="showForm = true" type="button"
                                                        class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                                        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                                                        </svg>
                                                        Répondre
                                                    </button>
                                                    @endif
                                                    </div>
                                                    @if($affectation->etat === 'Actif')
                                                    <form class="mb-3 mt-3" x-show="showForm" wire:submit.prevent="addRepondre({{ $commentaire->id }})">
                                                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                                            <label for="reply" class="sr-only">Répondre</label>
                                                            <textarea id="reply" wire:model="state.reply" rows="4"
                                                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                                                placeholder="Écrivez une réponse.." required></textarea>
                                                            <x-input-error for="reply" class="mt-2" />
                                                        </div>
                                                        <x-button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                        Répondre
                                                        </x-button>
                                                    </form>
                                                    @endif
                                            </div>
                                        </article>

                                        <div x-data="{ showAllReplies: false }">
                                            @if ($commentaire->replies->count() >= 2)
                                                <button @click="showAllReplies = !showAllReplies">
                                                    <template x-if="showAllReplies">Hide</template>
                                                    <template x-if="!showAllReplies">Show</template>
                                                    <p class="ml-4">
                                                    {{$commentaire->replies->count() }} autres réponses
                                                    </p>
                                                </button>
                                            @endif
                                            <div x-show="showAllReplies || {{ count($commentaire->replies) }} === 1">
                                                @foreach ($commentaire->replies as $reply)
                                                <article class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
                                                    <footer class="flex justify-between items-center mb-2">
                                                        <div class="flex items-center">
                                                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                                                                class="mr-2 w-6 h-6 rounded-full"
                                                                src="{{ $reply->user->profile_photo_url }}" alt="{{ $reply->user->nom }} {{ $reply->user->prenom }}">
                                                                {{ $reply->user->nom }} {{ $reply->user->prenom }}
                                                                @if($reply->user->hasRole('enseignant'))
                                                                    <span class="ms-1 align-middle inline bg-blue-50 border border-blue-300 text-blue-600 text-[.6125rem] leading-4 uppercase align-middle rounded-full py-0.5 px-2 dark:bg-blue-900/70 dark:border-blue-700 dark:text-blue-500">Enseignant</span>
                                                                @endif
                                                            </p>
                                                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-12"
                                                                    title="February 12th, 2022">{{ $reply->created_at->format('j F, Y') }}</time></p>
                                                        </div>
                                                    </footer>
                                                    <p class="text-gray-500 dark:text-gray-400">{{ $reply->commentaire }}</p>
                                                    <div class="flex items-center mt-4 space-x-4">
                                                        
                                                        <button type="button" wire:click="voteUp({{ $reply->id }})" class="flex items-center text-sm text-gray-500 dark:text-gray-400 font-medium">
                                                            <svg class="mr-1.5 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 10v12"/><path d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2h0a3.13 3.13 0 0 1 3 3.88Z"/></svg>
                                                            {{ $reply->thumbs_up }}
                                                        </button>
                                                        <button type="button" wire:click="voteDown({{ $reply->id }})" class="flex items-center text-sm text-gray-500 dark:text-gray-400 font-medium">
                                                            <svg class="mr-1.5 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 14V2"/><path d="M9 18.12 10 14H4.17a2 2 0 0 1-1.92-2.56l2.33-8A2 2 0 0 1 6.5 2H20a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.76a2 2 0 0 0-1.79 1.11L12 22h0a3.13 3.13 0 0 1-3-3.88Z"/></svg>
                                                            {{ $reply->thumbs_down }}
                                                        </button>
                                                    </div>
                                                </article>
                                                @endforeach
                                            </div>
                                        </div>
                                     
                                        @endforeach
                                        <div class="mt-5">
                                            <span class="">
                                            
                                            </span>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                    @if($affectation->etat === 'Actif')
                    <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <div class="space-y-4">
                            <p class="text-xl font-semibold text-gray-900 dark:text-white">{{ !$affectation->livrable || $affectation->livrable->etat === 'Non rendu' ? 'Temps restant pour livrer' : 'Vous souhaitez livrer à nouveau ?'}}</p>
                            <div x-data="{
                                    hasNoLivrable: {{ !$affectation->livrable ? 'true' : 'false' }},
                                    etatLivrable: '{{ $affectation->livrable ? $affectation->livrable->etat : 'Non rendu' }}',
                                    endDate: new Date('{{ $affectation->date_echeance->format('Y-m-d') }}').getTime(),
                                    remainingTime: 0,
                                    formatTime(time) {
                                        const days = Math.floor(time / (1000 * 60 * 60 * 24));
                                        const hours = Math.floor((time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                        const minutes = Math.floor((time % (1000 * 60 * 60)) / (1000 * 60));
                                        const seconds = Math.floor((time % (1000 * 60)) / 1000);
                                        return { days, hours, minutes, seconds };
                                    }
                                }"
                                x-init="() => {
                                setInterval(() => {
                                const now = new Date().getTime();
                                const remainingTime = endDate - now;
                                $data.remainingTime = remainingTime > 0 ? remainingTime : 0;
                                }, 1000);
                                }"
                            >
                                <template x-if="remainingTime > 0 && (!hasNoLivrable || (hasNoLivrable && (etatLivrable === 'Non rendu' || etatLivrable === 'Rejeté')))">
                                    <div class="flex justify-center items-center">
                                        <div class="flex flex-col items-center mx-4">
                                            <div class="text-xl font-bold" x-text="formatTime(remainingTime).days"></div>
                                            <div class="text-sm">Days</div>
                                        </div>
                                        <div class="flex flex-col items-center mx-4">
                                            <div class="text-xl font-bold" x-text="formatTime(remainingTime).hours"></div>
                                            <div class="text-sm">Hours</div>
                                        </div>
                                        <div class="flex flex-col items-center mx-4">
                                            <div class="text-xl font-bold" x-text="formatTime(remainingTime).minutes"></div>
                                            <div class="text-sm">Minutes</div>
                                        </div>
                                        <div class="flex flex-col items-center mx-4">
                                            <div class="text-xl font-bold" x-text="formatTime(remainingTime).seconds"></div>
                                            <div class="text-sm">Seconds</div>
                                        </div>
                                    </div>
                                </template>

                                <template x-if="remainingTime <= 0">
                                    <div>
                                        <div>Le compte à rebours est terminé!</div>
                                    </div>
                                </template>
                                <template x-if="hasNoLivrable && etatLivrable !== 'Non rendu' && etatLivrable !== 'Rejeté'">
                                    <div>
                                        L'enseignant examinera votre projet, 
                                        la période ne sera pas réinitialisée.
                                    </div>
                                </template>

                            </div>
                            <div class="flex items-center justify-center gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                <x-button type="button"  wire:click="confirmLivrableAdd" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 bg-green-500 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Marquer comme terminé
                                </x-button>    
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Détails du projet</p>
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-0">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Classe:</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">
                                        {{ $affectation->classe->nom }}
                                    </dd>
                                </dl>
                                <div class="flex justify-center text-center -space-x-4 rtl:space-x-reverse">
                                    @foreach ($affectation->classe->apprenants->take(4) as $apprenant)
                                        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{ $apprenant->user->profile_photo_url }}" alt="{{ $apprenant->user->nom }}">
                                    @endforeach
                                    @if ($affectation->classe->apprenants->count() > 4)
                                        <a class="flex items-center justify-center w-10 h-10 text-xs font-medium text-white bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800" href="#">+{{ ($affectation->classe->apprenants->count() - 4) }}</a>
                                    @elseif ($affectation->classe->apprenants->count() === 0)
                                        {{ $affectation->classe->apprenants->count() }}
                                    @endif
                                </div>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Enseignant</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">
                                        <div class="inline-flex flex-nowrap items-center bg-white border border-gray-200 rounded-full p-1.5 pe-3 dark:bg-neutral-900 dark:border-neutral-700">
                                            <img class="me-1.5 inline-block size-6 rounded-full" src="{{ $affectation->projet->enseignant->user->profile_photo_url }}" alt="{{ $affectation->projet->enseignant->user->nom }}">
                                            <div class="whitespace-nowrap text-sm font-medium text-gray-800 dark:text-white">
                                            {{ $affectation->projet->enseignant->user->nom }} {{ $affectation->projet->enseignant->user->prenom }}
                                            </div>
                                        </div>    
                                    </dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Date d'échéance:</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">{{ $affectation->date_echeance->format('d/m/Y') }}</dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Compètences</dt>
                                    <dd class="text-base font-medium text-green-600"></dd>
                                </dl>
                                @if ($affectation->projet->competence)
                                <div class="mb-3">
                                    @foreach (explode(',', $affectation->projet->competence) as $value)
                                    <span class="mt-1 inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">
                                        <span class="size-1.5 inline-block rounded-full bg-blue-800 dark:bg-blue-500"></span>
                                        {{ $value }}
                                    </span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
    </section>
    
</div>