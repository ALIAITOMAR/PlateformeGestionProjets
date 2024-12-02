<div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    
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
                    {{ $livrable->projet->titre }}
                </td>
                <td class="px-6 py-4">
                    {{ $livrable->etat }}
                </td>
            
                <td class="px-6 py-4">
                    {{-- Download Button Action --}}
                    <x-button wire:click="downloadLivrable({{ $livrable->id }})" class="mr-2 bg-blue-500 hover:bg-blue-700">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
                        </svg>
                    </x-button>
                    {{-- Edit Button Action --}}
                    <x-button wire:click="confirmLivrableEdit({{ $livrable->id }})" class="mr-2 bg-orange-500 hover:bg-orange-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                        </svg>
                    </x-button>
                    {{-- Delete Button Action --}}
                    <x-danger-button class="px-2" wire:click="confirmLivrableDeletion({{ $livrable->id }})" wire:loading.attr="disabled">
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
    {{ $livrables->links() }}
    </div>

    {{-- Modal Section --}}

    <x-dialog-modal wire:model="confirmingLivrableUpdate">
        <x-slot name="title">
            {{ __('Modifier Livrable') }}
        </x-slot>

        <x-slot name="content">

            {{-- Livrable input --}}

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="note_produit" value="{{ __('Note Produit') }}" />
                <x-input id="note_produit" type="text" class="mt-1 block w-full" wire:model="state.note_produit" />
                <x-input-error for="note_produit" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="note_propos" value="{{ __('Note Propos') }}" />
                <x-input id="note_propos" type="text" class="mt-1 block w-full" wire:model="state.note_propos" />
                <x-input-error for="note_propos" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="note_processus" value="{{ __('Note Processus') }}" />
                <x-input id="note_processus" type="text" class="mt-1 block w-full" wire:model="state.note_processus" />
                <x-input-error for="note_processus" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="commentaires" value="{{ __('Commentaires') }}" />
                <textarea id="commentaires" type="text" class="mt-1 block w-full" wire:model="state.commentaires"></textarea>
                <x-input-error for="commentaires" class="mt-2" />
            </div>
            
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingLivrableUpdate', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-button class="ml-2" wire:click="updateLivrable" wire:loading.attr="disabled">
                {{ __('Enregistrer') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Supprimer Livrable Confirmation Modal -->
    <x-confirmation-modal wire:model.live="confirmingLivrableDeletion">
        <x-slot name="title">
            {{ __('Supprimer Livrable') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Etes-vous sûr de vouloir supprimer le Livrable ?') }}
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingLivrableDeletion')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-danger-button class="ml-2" wire:click="deleteLivrable" wire:loading.attr="disabled">
                {{ __('Supprimer') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>