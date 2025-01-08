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

    <ol class="flex items-center whitespace-nowrap">
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
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
        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200" aria-current="page">
            Invitations
        </li>
    </ol>
    
    <!-- Card -->
    <div class="mt-5 flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
            <!-- Header -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
              <div>
              <label for="table-search" class="sr-only">Recherche</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" wire:model.live="search" id="table-search-apprenants" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rechercher des apprenants">
                </div>
              </div>
              <div>
                <div class="inline-flex gap-x-2">
                  <a wire:click="confirmInvitationAdd" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    Ajouter Invitation
                  </a>
                </div>
              </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
              <thead class="bg-gray-50 dark:bg-neutral-800">
                <tr>

                  <th scope="col" class="ps-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        ID
                      </span>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        Email
                      </span>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        Token
                      </span>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        Expire
                      </span>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        Statut
                      </span>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        Actions
                      </span>
                    </div>
                  </th>
                </tr>
              </thead>
                
               
              <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                @forelse ($invitations as $invitation)
                <tr>
                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span class="text-sm text-gray-500 dark:text-neutral-500">{{ $invitation->id }}</span>
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span class="text-sm text-gray-500 dark:text-neutral-500">{{ $invitation->email }}</span>
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <div x-data="{ copied: false }">
                        <button @click="navigator.clipboard.writeText('{{ $invitation->token }}').then(() => copied = true)" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                            Copier la clé
                        <svg class="flex-shrink-0 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg>
                        </button>
                        <span x-show="copied" style="color: green;">Copié!</span>
                    </div>
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span class="text-sm text-gray-500 dark:text-neutral-500">{{ $invitation->expires_at->format('d/m/Y H:i:s') }}</span>
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      @if($invitation->statut == 'Actif')
                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        {{ $invitation->statut }}
                      </span>
                      @endif
                      @if($invitation->statut == 'Utilisé')
                      <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full dark:bg-yellow-500/10 dark:text-yellow-500">
                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            {{ $invitation->statut }}
                        </span>
                      @endif
                      @if($invitation->statut == 'Expiré')
                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                          <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                          {{ $invitation->statut }}
                        </span>
                      @endif
                    </div>
                  </td>
                 
                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-1.5">
                      {{-- Delete Button Action --}}
                      <x-danger-button class="px-2" wire:click="confirmInvitationDeletion({{ $invitation->id }})"
                          wire:loading.attr="disabled">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                              <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                          </svg>
                      </x-danger-button>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center size-px whitespace-nowrap">
                        <div class="px-6 py-3">
                            <span class="text-sm text-gray-500 dark:text-neutral-500">{{ __('Aucun enregistrement trouvé') }}</span>
                        </div>
                    </td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <!-- End Table -->

            <!-- Footer -->
            <div class="px-6 py-4 grid gap-3 border-t border-gray-200 dark:border-neutral-700">
                <div>
                    <div class="">
                        {{ $invitations->links() }}
                    </div>
                </div>
            </div>
            <!-- End Footer -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->

    {{-- Modal Section --}}
    <x-dialog-modal wire:model="confirmingInvitationAdd">
        <x-slot name="title">
            {{ __('Ajouter Invitation') }}
        </x-slot>
        <x-slot name="content">

            {{-- Invitation input --}}

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" />
                <x-input-error for="email" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <form wire:submit.prevent="regenerateToken">   
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11.644 3.066a1 1 0 0 1 .712 0l7 2.666A1 1 0 0 1 20 6.68a17.694 17.694 0 0 1-2.023 7.98 17.406 17.406 0 0 1-5.402 6.158 1 1 0 0 1-1.15 0 17.405 17.405 0 0 1-5.403-6.157A17.695 17.695 0 0 1 4 6.68a1 1 0 0 1 .644-.949l7-2.666Zm4.014 7.187a1 1 0 0 0-1.316-1.506l-3.296 2.884-.839-.838a1 1 0 0 0-1.414 1.414l1.5 1.5a1 1 0 0 0 1.366.046l4-3.5Z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <x-input type="text" id="token" wire:model="state.token" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        <x-button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4"/>
                            </svg>
                        </x-button>
                    </div>
                </form>
            </div>
            
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="expires_at" value="{{ __('Expire') }}" />
                <x-input id="expires_at" type="date" class="mt-1 block w-full" wire:model="state.expires_at" />
                <x-input-error for="expires_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">               
                <div class="hs-tooltip flex items-center">
                    <input type="checkbox" wire:model="state.notify" id="hs-tooltip-example" class="hs-tooltip-toggle relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                    <label for="hs-tooltip-example" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Envoyer une notification par e-mail</label>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingInvitationAdd', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-button class="ml-2" wire:click="createInvitation" wire:loading.attr="disabled">
                {{ __('Enregister') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Supprimer Invitation Confirmation Modal -->
    <x-confirmation-modal wire:model.live="confirmingInvitationDeletion">
        <x-slot name="title">
            {{ __('Supprimer Invitation') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Etes-vous sûr de vouloir supprimer Invitation ?') }}
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingInvitationDeletion')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-danger-button class="ml-2" wire:click="deleteInvitation" wire:loading.attr="disabled">
                {{ __('Supprimer') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>