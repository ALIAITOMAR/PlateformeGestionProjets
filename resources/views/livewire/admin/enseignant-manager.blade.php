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
          Enseignants
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

                  <a wire:click="confirmEnseignantAdd" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    Ajouter Enseignant
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
                        Matricule
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
                        Etablissement
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
                @forelse ($enseignants as $enseignant)
                <tr>
                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span class="text-sm text-gray-500 dark:text-neutral-500">{{ $enseignant->matricule }}</span>
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                      <div class="flex items-center gap-x-3">
                        <img class="inline-block size-[38px] rounded-full" src="{{$enseignant->user->profile_photo_url }}" alt="{{$enseignant->user->nom}} {{$enseignant->user->prenom }}">
                        <div class="grow">
                          <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$enseignant->user->nom}} {{$enseignant->user->prenom }}</span>
                          <span class="block text-sm text-gray-500 dark:text-neutral-500">{{$enseignant->user->email }}</span>
                        </div>
                      </div>
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span class="text-sm text-gray-500 dark:text-neutral-500">{{ $enseignant->etablissement }}</span>
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      @if(Cache::has('user-enligne' . $enseignant->user->id))
                        <div class="inline-flex items-center">
                            <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                En ligne
                            </span>
                            @else

                            <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                Hors ligne
                            </span>
                            <span class="block text-xs px-2.5 text-gray-500 dark:text-neutral-500">{{ $enseignant->user->last_seen_at ? 'Actif il y a ' . \Carbon\Carbon::parse($enseignant->user->last_seen_at)->diffForHumans(null, true) : '' }}</span>
                        </div>
                      @endif
                    </div>
                  </td>
                 
                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-1.5">
                        {{-- Edit Button Action --}}
                        <x-button wire:click="confirmEnseignantEdit({{ $enseignant->id }})"
                          class="mr-2 bg-orange-500 hover:bg-orange-700">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                              <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                              <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                          </svg>
                      </x-button>
                      {{-- Delete Button Action --}}
                      <x-danger-button class="px-2" wire:click="confirmEnseignantDeletion({{ $enseignant->id }})"
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
                        {{ $enseignants->links() }}
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
    <x-dialog-modal wire:model="confirmingEnseignantAdd">
        <x-slot name="title">
            {{ __('Ajouter Enseignant') }}
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

            {{-- Enseignant input --}}
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="matricule" value="{{ __('Matricule') }}" />
                <x-input id="matricule" type="text" class="mt-1 block w-full" wire:model="state.matricule" />
                <x-input-error for="matricule" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="cadre" value="{{ __('Cadre') }}" />
                <x-input id="cadre" type="text" class="mt-1 block w-full" wire:model="state.cadre" />
                <x-input-error for="cadre" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="date_embauche" value="{{ __('Date Embauche') }}" />
                <x-input id="date_embauche" type="date" class="mt-1 block w-full" wire:model="state.date_embauche" />
                <x-input-error for="date_embauche" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="date_affectation" value="{{ __('Date Affectation') }}" />
                <x-input id="date_affectation" type="date" class="mt-1 block w-full" wire:model="state.date_affectation" />
                <x-input-error for="date_affectation" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="specialite" value="{{ __('Specialité') }}" />
                <x-input id="specialite" type="text" class="mt-1 block w-full" wire:model="state.specialite" />
                <x-input-error for="specialite" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="etablissement" value="{{ __('Etablissement') }}" />
                <x-input id="etablissement" type="text" class="mt-1 block w-full" wire:model="state.etablissement" />
                <x-input-error for="etablissement" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="cycle" value="{{ __('Cycle') }}" />
                <x-input id="cycle" type="text" class="mt-1 block w-full" wire:model="state.cycle" />
                <x-input-error for="cycle" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="tel" value="{{ __('Téléphone') }}" />
                <x-input id="tel" type="text" class="mt-1 block w-full" wire:model="state.tel" />
                <x-input-error for="tel" class="mt-2" />
            </div>
        
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingEnseignantAdd', false)" wire:loading.attr="disabled">
                <svg class="me-1 -ms-1 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                </svg>
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-button class="ml-2" wire:click="createEnseignant" wire:loading.attr="disabled">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>    
                {{ __('Enregister') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="confirmingEnseignantUpdate">
        <x-slot name="title">
            {{ __('Modifier Enseignant') }}
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

            {{-- Enseignant input --}}
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="matricule" value="{{ __('Matricule') }}" />
                <x-input id="matricule" type="text" class="mt-1 block w-full" wire:model="state.matricule" />
                <x-input-error for="matricule" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="cadre" value="{{ __('Cadre') }}" />
                <x-input id="cadre" type="text" class="mt-1 block w-full" wire:model="state.cadre" />
                <x-input-error for="cadre" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="date_embauche" value="{{ __('Date Embauche') }}" />
                <x-input id="date_embauche" type="date" class="mt-1 block w-full" wire:model="state.date_embauche" />
                <x-input-error for="date_embauche" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="date_affectation" value="{{ __('date_affectation') }}" />
                <x-input id="date_affectation" type="date" class="mt-1 block w-full" wire:model="state.date_affectation" />
                <x-input-error for="date_affectation" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="specialite" value="{{ __('Specialite') }}" />
                <x-input id="specialite" type="text" class="mt-1 block w-full" wire:model="state.specialite" />
                <x-input-error for="specialite" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="etablissement" value="{{ __('Etablissement') }}" />
                <x-input id="etablissement" type="text" class="mt-1 block w-full" wire:model="state.etablissement" />
                <x-input-error for="etablissement" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="cycle" value="{{ __('Cycle') }}" />
                <x-input id="cycle" type="text" class="mt-1 block w-full" wire:model="state.cycle" />
                <x-input-error for="cycle" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="tel" value="{{ __('Tel') }}" />
                <x-input id="tel" type="text" class="mt-1 block w-full" wire:model="state.tel" />
                <x-input-error for="tel" class="mt-2" />
            </div>
        
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingEnseignantUpdate', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-button class="ml-2" wire:click="updateEnseignant" wire:loading.attr="disabled">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>    
            {{ __('Enregistrer') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Supprimer Enseignant Confirmation Modal -->
    <x-confirmation-modal wire:model.live="confirmingEnseignantDeletion">
        <x-slot name="title">
            {{ __('Supprimer Enseignant') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Etes-vous sûr de vouloir supprimer Enseignant ?') }}
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingEnseignantDeletion')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>
            <x-danger-button class="ml-2" wire:click="deleteEnseignant" wire:loading.attr="disabled">
                {{ __('Supprimer') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>