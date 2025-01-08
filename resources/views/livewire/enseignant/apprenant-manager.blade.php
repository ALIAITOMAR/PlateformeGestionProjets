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
        Apprenants
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
              <label for="table-search" class="sr-only">Search</label>
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

                  <a wire:click="confirmApprenantAdd" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    Ajouter Apprenant
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
                        CNE
                      </span>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      User
                      </span>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Niveau
                      </span>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Classe / Groupe
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
                        Date de création
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
              @forelse ($apprenants as $apprenant)
                <tr>
                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span class="text-sm text-gray-500 dark:text-neutral-500">{{ $apprenant->cne }}</span>
                    </div>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                      <div class="flex items-center gap-x-3">
                        <img class="inline-block size-[38px] rounded-full" src="{{$apprenant->user->profile_photo_url }}" alt="{{$apprenant->user->nom}} {{$apprenant->user->prenom }}">
                        <div class="grow">
                          <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$apprenant->user->nom}} {{$apprenant->user->prenom }}</span>
                          <span class="block text-sm text-gray-500 dark:text-neutral-500">{{$apprenant->user->email }}</span>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="h-px w-72 whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span class="text-sm text-gray-500 dark:text-neutral-500">{{ $apprenant->niveau }}</span>
                    </div>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span class="text-sm text-gray-500 dark:text-neutral-500">{{ $apprenant->classe->nom }}</span>
                    </div>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        Actif
                      </span>
                    </div>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span class="text-sm text-gray-500 dark:text-neutral-500">{{ $apprenant->created_at }}</span>
                    </div>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-1.5">
                        {{-- Edit Button Action --}}
                        <x-button wire:click="confirmApprenantEdit({{ $apprenant->id }})"
                            class="mr-2 bg-orange-500 hover:bg-orange-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                                <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                            </svg>
                        </x-button>
                        {{-- Delete Button Action --}}
                        <x-danger-button class="px-2" wire:click="confirmApprenantDeletion({{ $apprenant->id }})"
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
                        {{ $apprenants->links() }}
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
    <x-dialog-modal wire:model="confirmingApprenantAdd">
        <x-slot name="title">
            {{ __('Ajouter Apprenant') }}
        </x-slot>
        <x-slot name="content">

            {{-- User input --}}
            <div class="col-span-6 sm:col-span-4">
                <x-label for="nom" value="{{ __('Nom') }}" />
                <x-input id="nom" type="text" class="mt-1 block w-full" wire:model="state.nom" />
                <x-input-error for="nom" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="prenom" value="{{ __('Prénom') }}" />
                <x-input id="prenom" type="text" class="mt-1 block w-full" wire:model="state.prenom" />
                <x-input-error for="prenom" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" />
                <x-input-error for="email" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="password" value="{{ __('Mot de passe') }}" />
                <x-input id="password" type="password" class="mt-1 block w-full" wire:model="state.password" />
                <x-input-error for="password" class="mt-2" />
            </div>

            {{-- Apprenant input --}}
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="cne" value="{{ __('CNE') }}" />
                <x-input id="cne" type="text" class="mt-1 block w-full" wire:model="state.cne" />
                <x-input-error for="cne" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="date_naissance" value="{{ __('Date Naissance') }}" />
                <x-input id="date_naissance" type="date" class="mt-1 block w-full" wire:model="state.date_naissance" />
                <x-input-error for="date_naissance" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="niveau" value="{{ __('Niveau') }}" />
                <x-input id="niveau" type="text" class="mt-1 block w-full" wire:model="state.niveau" />
                <x-input-error for="niveau" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="classe" value="{{ __('Classe / Groupe') }}" />
                <select id="classe" class="mt-1 block w-full" wire:model="state.classe">
                    <option value="" selected="selected">-- Classe / Groupe --</option>   
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                    @endforeach
                    <x-input-error for="classe" class="mt-2" />
                </select>
            </div>
            
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingApprenantAdd', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-button class="ml-2" wire:click="createApprenant" wire:loading.attr="disabled">
            {{ __('Enregister') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="confirmingApprenantUpdate">
        <x-slot name="title">
            {{ __('Modifier Apprenant') }}
        </x-slot>

        <x-slot name="content">

            {{-- User input --}}
            <div class="col-span-6 sm:col-span-4">
                <x-label for="nom" value="{{ __('Nom') }}" />
                <x-input id="nom" type="text" class="mt-1 block w-full" wire:model="state.nom" />
                <x-input-error for="nom" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="prenom" value="{{ __('Prenom') }}" />
                <x-input id="prenom" type="text" class="mt-1 block w-full" wire:model="state.prenom" />
                <x-input-error for="prenom" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" />
                <x-input-error for="email" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="password" value="{{ __('Mot de passe') }}" />
                <x-input id="password" type="password" class="mt-1 block w-full" wire:model="state.password" />
                <x-input-error for="password" class="mt-2" />
            </div>

            {{-- Apprenant input --}}
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="cne" value="{{ __('CNE') }}" />
                <x-input id="cne" type="text" class="mt-1 block w-full" wire:model="state.cne" />
                <x-input-error for="cne" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="date_naissance" value="{{ __('Date Naissance') }}" />
                <x-input id="date_naissance" type="date" class="mt-1 block w-full" wire:model="state.date_naissance" />
                <x-input-error for="date_naissance" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="niveau" value="{{ __('Niveau') }}" />
                <x-input id="niveau" type="text" class="mt-1 block w-full" wire:model="state.niveau" />
                <x-input-error for="niveau" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="classe" value="{{ __('Classe / Groupe') }}" />
                <select id="classe" class="mt-1 block w-full" wire:model="state.classe">
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                    @endforeach
                    <x-input-error for="classe" class="mt-2" />
                </select>
            </div>
        
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingApprenantUpdate', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-button class="ml-2" wire:click="updateApprenant" wire:loading.attr="disabled">
            {{ __('Enregistrer') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Supprimer Apprenant Confirmation Modal -->
    <x-confirmation-modal wire:model.live="confirmingApprenantDeletion">
        <x-slot name="title">
            {{ __('Supprimer Apprenant') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Etes-vous sûr de vouloir supprimer Apprenant ?') }}
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingApprenantDeletion')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-danger-button class="ml-2" wire:click="deleteApprenant" wire:loading.attr="disabled">
                {{ __('Supprimer') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>