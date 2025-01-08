<div>

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

    <section>
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <!-- Stepper -->
            <ul class="relative flex flex-row gap-x-2 items-center w-full lg:max-w-2xl xl:max-w-2xl">
                <!-- Item -->
                <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group">
                    <div class="min-w-7 min-h-7 inline-flex justify-center items-center text-xs align-middle">
                    <span class="size-10 flex justify-center items-center flex-shrink-0 {{ optional($affectation->livrable)->complete ? 'bg-gray-200' : 'bg-green-600' }} font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
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
                        <span class="size-10 flex justify-center items-center flex-shrink-0 {{ optional($affectation->livrable)->complete ? 'bg-gray-200' : 'bg-green-600' }} font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
                            <svg class="w-3.5 h-3.5 text-white-600 lg:w-3 lg:h-3 dark:text-white-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                            </svg>
                        </span>
                        <span class="ms-2 block text-sm font-medium text-gray-800 dark:text-white">
                            Projet livré
                        </span>
                        @else
                        <span class="size-10 flex justify-center items-center flex-shrink-0 {{ optional($affectation->livrable)->complete ? 'bg-gray-200' : 'bg-yellow-600' }} font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
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
                        <span class="size-10 flex justify-center items-center flex-shrink-0 {{ optional($affectation->livrable)->complete ? 'bg-gray-200' : 'bg-yellow-600' }} font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
                            <svg class="w-3.5 h-3.5 text-white-600 lg:w-3 lg:h-3 dark:text-white-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </span>
                        <span class="ms-2 block text-sm font-medium text-gray-800 dark:text-white">
                            En attente de l'avis du <br />
                            l'enseignant
                        </span>
                        @elseif ($affectation->livrable && $affectation->livrable->etat === 'Approuvé')
                        <span class="size-10 flex justify-center items-center flex-shrink-0 {{ optional($affectation->livrable)->complete ? 'bg-gray-200' : 'bg-green-600' }} font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
                            <svg class="w-3.5 h-3.5 text-white-600 lg:w-3 lg:h-3 dark:text-white-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                            </svg>
                        </span>
                        <span class="ms-2 block text-sm font-medium text-gray-800 dark:text-white">
                            Projet approuvé <br />
                            Terminé
                        </span>
                        @elseif ($affectation->livrable && $affectation->livrable->etat === 'Rejeté')
                        <span class="size-10 flex justify-center items-center flex-shrink-0 {{ optional($affectation->livrable)->complete ? 'bg-gray-200' : 'bg-red-600' }} font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
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
                    <span class="size-10 flex justify-center items-center flex-shrink-0 {{ optional($affectation->livrable)->complete ? 'bg-gray-200' : 'bg-green-600' }} font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
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

                <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group">
                    <div class="min-w-7 min-h-7 inline-flex justify-center items-center text-xs align-middle">
                    @if ($affectation->projet->questions->contains(function ($question) {
                        return $question->reponses->isEmpty();
                    }) && optional($affectation->livrable)->complete)
                    <span class="size-10 flex justify-center items-center flex-shrink-0 {{ !$affectation->projet->questions->contains(function ($question) { return $question->reponses->isEmpty(); }) ? 'bg-gray-200' : 'bg-yellow-600' }} font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
                        <svg class="w-3.5 h-3.5 text-white-600 lg:w-3 lg:h-3 dark:text-white-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                    </span>
                    <span class="ms-2 block text-sm font-medium text-gray-800 dark:text-white">
                        En attente réponse<br />
                    </span>
                    @endif
                    @if (!$affectation->projet->questions->contains(function ($question) {
                        return $question->reponses->isEmpty();
                    }) && optional($affectation->livrable)->complete)
                    <span class="size-10 flex justify-center items-center flex-shrink-0 {{ !$affectation->projet->questions->contains(function ($question) { return $question->reponses->isEmpty(); }) ? 'bg-gray-200' : 'bg-green-600' }} font-medium text-white rounded-full dark:bg-white dark:text-neutral-800">
                        <svg class="w-3.5 h-3.5 text-white-600 lg:w-3 lg:h-3 dark:text-white-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                        </svg>
                    </span>
                    <span class="ms-2 block text-sm font-medium text-gray-800 dark:text-white">
                        Questions répondues<br />
                    </span>
                    @endif
                    </div>
                    <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden dark:bg-neutral-700"></div>
                </li>
                <!-- End Item -->

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

                                    @if ($affectation->projet->piece_jointe && Storage::exists($affectation->projet->piece_jointe))
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

                                        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                                        
                                            <div class="p-4 md:p-5 space-y-7">
                                                <div>
                                                    <div class="mb-2 items-center">
                                                        @if($livrable->description)
                                                        <div class="mt-4 items-center justify-between sm:flex">
                                                            <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">{{ $livrable->description }}</div>
                                                        </div>
                                                        @endif

                                                        @if ($livrable->piece_jointe && Storage::exists($livrable->piece_jointe))
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
                                                </div>
                                            </div>

                                            <div class="bg-gray-50 border-t border-gray-200 rounded-b-xl py-2 px-4 md:px-5 dark:bg-white/10 dark:border-neutral-700">
                                                <div class="flex flex-wrap justify-between items-center gap-x-3">
                                                    <div>
                                                        <span class="text-sm font-semibold text-gray-800 dark:text-white">
                                                            Version {{ $loop->iteration }}.0
                                                        </span>
                                                    </div>
                                                    <div class="-me-2.5">
                                                        <span class="mt-2 text-xs font-normal text-gray-400">
                                                            <span class="mt-2 mr-2 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">
                                                                @if($livrable->etat === 'Rendu')    
                                                                <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
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
                                                                    Projet {{ $livrable->etat }}
                                                                </span>
                                                                @endif

                                                                @if($livrable->etat === 'Rendu en retard')    
                                                                <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200">
                                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                                                    </svg>
                                                                    Projet {{ $livrable->etat }}
                                                                </span>
                                                                @endif

                                                                @if($livrable->etat === 'Approuvé')    
                                                                <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                                    </svg>
                                                                    Projet {{ $livrable->etat }}
                                                                </span>
                                                                @endif

                                                                @if($livrable->etat === 'Rejeté')    
                                                                <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-green-200">
                                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>
                                                                    </svg>
                                                                    Projet {{ $livrable->etat }}
                                                                </span>
                                                                @endif
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
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
                                    <span class="mb-4 inline-flex justify-center items-center size-[46px] rounded-full border-4 {{ optional($affectation->livrable)->complete ? 'border-gray-50 bg-gray-200 text-gray-500' : 'border-green-50 bg-green-100 text-green-500' }} dark:bg-green-700 dark:border-green-600 dark:text-green-100">
                                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                                    </svg>
                                    </span>
                                    <!-- End Icon -->

                                    <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
                                        PROJET DÉMARRÉ
                                    </h3>
                                    <p class="text-gray-500 dark:text-neutral-500">
                                        Le compte à rebours du projet est en cours<br />
                                        Ne perdez pas votre temps à lire ce message
                                    </p>
                                </div>    
                            </div>
                        </div>

                        @if(optional($affectation->livrable)->complete && $affectation->projet->questions->isNotEmpty())
                        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl"></h2>
                            <div class="mt-3">
                                <div class="p-4 text-center overflow-y-auto">
                                    <!-- Icon -->
                                    <span class="mb-4 inline-flex justify-center items-center size-[46px] rounded-full border-4 {{ !$affectation->projet->questions->contains(function($question) { return $question->reponses->isEmpty(); }) ? 'border-gray-50 bg-gray-200 text-gray-500' : 'border-green-50 bg-green-100 text-green-500' }} dark:bg-green-700 dark:border-green-600 dark:text-green-100">
                                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                                    </svg>
                                    </span>
                                    <!-- End Icon -->

                                    <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
                                        Questions d'évaluation
                                    </h3>

                                    @if($affectation->projet->questions->contains(function($question) { return $question->reponses->isEmpty(); }))    
                                        <form class="text-left mb-6 mt-6" wire:submit.prevent="saveReponses">
                                            @foreach($affectation->projet->questions as $question)
                                            <x-label for="titre" value="{{ $question->question }}" />
                                            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                                <div class="col-span-6 sm:col-span-4">
                                                    <textarea id="reponses.{{ $question->id }}.reponse" wire:model="state.reponses.{{ $question->id }}.reponse" rows="2"
                                                        class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                                        required></textarea>
                                                </div>
                                            </div>
                                            <x-input-error for="reponses.{{ $question->id }}.reponse" class="mt-2" />
                                            @endforeach
                                            <x-button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="submit" wire:loading.attr="disabled">
                                                <span wire:loading.remove>{{ __('Enregistrer') }}</span>
                                                    <div wire:loading class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full dark:text-white-500" role="status" aria-label="loading">
                                                        <span class="sr-only">Enregistrer</span>
                                                    </div>
                                            </x-button>
                                        </form>
                                    @else
                                    <!-- Questions Evaluation -->
                                    <div class="py-3 mx-auto">
                                        @foreach($affectation->projet->questions as $question)
                                        <div class="text-left py-3">
                                            <div class="flex gap-x-5">
                                            <svg class="flex-shrink-0 mt-1 size-5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                                                <div>
                                                <h3 class="sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                                    {{ $question->question }}
                                                </h3>
                                                @if ($question->reponses->isNotEmpty())
                                                <p class="mt-1 text-gray-500 dark:text-neutral-500">
                                                    @foreach($question->reponses as $reponse)
                                                        {{ $reponse->reponse }}
                                                    @endforeach
                                                </p>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- End Questions Evaluation -->
                                    @endif
                                </div>    
                            </div>
                        </div>
                        @endif

                        @if($affectation->classe->livraison_active && $affectation->etat === 'Actif' && !optional($affectation->livrable)->complete)
                        <div class="flex flex-col items-center justify-center">
                                <x-button type="button" wire:click="confirmLivrableAdd" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 bg-green-500 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                                    @if(!$affectation->livrable)
                                        Livrez maintenant
                                    @else
                                        Livrer à nouveau
                                    @endif
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
                                    
                                        @if($affectation->etat === 'Actif' && !optional($affectation->livrable)->complete)
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
                                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                                                            class="mr-2 w-6 h-6 rounded-full"
                                                            src="{{ $commentaire->user->profile_photo_url }}" alt="{{ $commentaire->user->nom }} {{ $commentaire->user->prenom }}">{{ $commentaire->user->nom }} {{ $commentaire->user->prenom }}</p>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                                            title="February 8th, 2022">{{ $commentaire->created_at->format('j F, Y') }}</time></p>
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
                                                    
                                                    @if($affectation->etat === 'Actif' && !optional($affectation->livrable)->complete)
                                                    <button @click="showForm = true" type="button"
                                                        class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                                        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                                                        </svg>
                                                        Répondre
                                                    </button>
                                                    @endif
                                                    </div>
                                                    @if($affectation->etat === 'Actif' && !optional($affectation->livrable)->complete)
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
                    @if($affectation->etat === 'Actif' && !optional($affectation->livrable)->complete)
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
                            @if($affectation->classe->livraison_active)
                            <div class="flex items-center justify-center gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                <x-button type="button"  wire:click="confirmLivrableAdd" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 bg-green-500 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                                    @if(!$affectation->livrable || $affectation->livrable->etat === 'Non rendu')
                                        Livrez maintenant
                                    @else
                                        Livrer à nouveau
                                    @endif
                                </x-button>    
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Détails du projet</p>
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-0">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Classe / Groupe:</dt>
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
                                    <span class="mt-1 inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium {{ optional($affectation->livrable)->complete ? 'bg-gray-100 text-gray-800' : 'bg-blue-100 text-blue-800' }} dark:bg-blue-800/30 dark:text-blue-500">
                                        <span class="size-1.5 inline-block rounded-full {{ optional($affectation->livrable)->complete ? 'bg-gray-800' : 'bg-blue-800' }} dark:bg-blue-500"></span>
                                        {{ $value }}
                                    </span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Criteres Evaluation</p>
                        <div class="space-y-4">
                            <div class="space-y-2">
                                @if($affectation->projet->criteres->isNotEmpty())
                                <div class="mt-5 grid sm:flex gap-x-3 text-sm">
                                    <div class="font-medium text-gray-800 dark:text-neutral-200">
                                        <ol class="list-decimal list-inside text-gray-800 dark:text-white">
                                            @foreach($affectation->projet->criteres as $critere)  
                                                <li class="not-italic font-normal">{{ $critere->libelle }}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if (optional($affectation->livrable)->evaluation_jointe && Storage::exists(optional($affectation->livrable)->evaluation_jointe))
                    <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Rapport d'évaluation du Projet</p>
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <span class="flex items-center gap-2 text-sm font-medium text-gray-900 dark:text-white pb-2">
                                    <button type="button" class="flex items-center gap-x-2 text-gray-500 hover:text-blue-600 whitespace-nowrap dark:text-neutral-500 dark:hover:text-blue-500">
                                        <svg class="flex-shrink-0 w-[18px] h-[18px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
                                            <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
                                        </svg>                                 
                                        <a href="#" wire:click.prevent="telechargerFichier('{{ $affectation->livrable->evaluation_jointe }}')">
                                            {{ basename($affectation->livrable->evaluation_jointe) }}
                                        </a>
                                    </button>
                                    ({{ formatBytes(Storage::size($affectation->livrable->evaluation_jointe)) }})
                                </span>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
        
            </div>
        </div>
    </section>

    {{-- Modal Section --}}
    <x-dialog-modal wire:model="confirmingLivrableAdd">
        <x-slot name="title">
            {{ __('Livrer le travail terminé') }}
        </x-slot>
        <x-slot name="content">

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

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="description" value="{{ __('Description') }}" />
                <textarea id="description" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3"  wire:model="state.description"></textarea>
                <x-input-error for="description" class="mt-2" />
            </div>
            
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingLivrableAdd', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            
            <x-button class="ml-2" wire:click="createLivrable" wire:loading.attr="disabled">
                <span wire:loading.remove wire.target="createLivrable">{{ __('Enregistrer') }}</span>
                <div x-show="isSaving">
                    <div wire:loading wire:target="createLivrable" class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full dark:text-white-500" role="status" aria-label="loading">
                        <span class="sr-only">Chargement...</span>
                    </div>
                </div>
            </x-button>

        </x-slot>
    </x-dialog-modal>
  

</div>