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
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" wire:model.live="search" id="table-search-livrables" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rechercher des livrables">
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Classe
                </th>
                <th scope="col" class="px-6 py-3">
                    Apprenant
                </th>
                <th scope="col" class="px-6 py-3">
                    projet
                </th>
                <th scope="col" class="px-6 py-3">
                    etat
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>

        @forelse ($livrables as $livrable)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                <td class="px-6 py-4">
                    {{ $livrable->id }}
                </td>

                <td class="px-6 py-4">
                    <span class="inline-flex items-center gap-1.5 py-1 px-2 rounded-lg text-xs font-medium bg-gray-100 text-gray-800 dark:bg-neutral-900 dark:text-neutral-200">
                    {{ $livrable->affectation->classe->nom }}
                      </span>
                </td>

                <td class="px-6 py-4">
                    <div class="flex items-center gap-x-2">
                      <img class="inline-block size-6 rounded-full" src="{{ $livrable->apprenant->user->profile_photo_url }}" alt="{{ $livrable->apprenant->full_name }}">
                      <div class="grow">
                        <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $livrable->apprenant->full_name }}</span>
                      </div>
                    </div>
                    
                </td>

                <td class="px-6 py-4">
                    {{ $livrable->affectation->projet->titre }}
                </td>

                <td class="px-6 py-4">
                    <div class="flex flex-col gap-y-2">
                    <div>
                        @if($livrable->etat == 'Rendu')
                        <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                            <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            {{ $livrable->etat }}
                        </span>
                        @endif

                        @if($livrable->etat == 'Rendu en retard')
                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                            <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                            <path d="M12 9v4"></path>
                            <path d="M12 17h.01"></path>
                            </svg>
                            {{ $livrable->etat }}
                        </span>
                        @endif
                    </div>
                    </div>
                </td>
            
                <td class="px-6 py-4">
                    {{-- Download Button Action --}}
                    <x-button wire:click.prevent="telechargerFichier('{{ $livrable->piece_jointe }}')" class="mr-2 bg-blue-500 hover:bg-blue-700">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
                        </svg>
                    </x-button>
                                                    
                    {{-- Edit Button Action --}}
                    <x-button wire:click="confirmLivrableApproval({{ $livrable->id }})" wire:loading.attr="disabled" class="mr-2 bg-green-500 hover:bg-green-700">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                        </svg>

                    </x-button>
                    
                    {{-- Delete Button Action --}}
                    <x-danger-button class="px-2" wire:click="confirmLivrableRejection({{ $livrable->id }})" wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                        </svg>
                    </x-danger-button>

                    {{-- View Button Action --}}
                    <a href="{{ route('enseignant.projet-details', ['userId' => $livrable->apprenant->user->id, 'id' => $livrable->affectation->projet->id, 'titre' => Str::slug($livrable->affectation->projet->titre)]) }}" class="btn btn-primary">
                        <x-button wire:click="confirmProjetEdit({{ $livrable->affectation->id }})"
                            class="mr-2 bg-blue-500 hover:bg-blue-700">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd"/>
                            </svg>
                        </x-button>
                    </a>
                    
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
        {{-- $livrables->links() --}}
    </div>

    {{-- Modal Section --}}

    <!-- Approuvé Livrable Confirmation Modal -->
    <x-confirmation-modal wire:model.live="confirmingLivrableApproval">
        <x-slot name="title">
            {{ __('Approuvé Livrable') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Etes-vous sûr de vouloir Approuvé le Livrable ?') }}
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingLivrableApproval')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-danger-button class="ml-2" wire:click="approveLivrable" wire:loading.attr="disabled">
                {{ __('Approuvé') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
    
    <!-- Rejeté Confirmation Modal -->
    <x-confirmation-modal wire:model.live="confirmingLivrableRejection">
        <x-slot name="title">
            {{ __('Rejeté Livrable') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Etes-vous sûr de vouloir rejeté le Livrable ?') }}
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingLivrableRejection')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-danger-button class="ml-2" wire:click="rejectLivrable" wire:loading.attr="disabled">
                {{ __('Rejeté') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>