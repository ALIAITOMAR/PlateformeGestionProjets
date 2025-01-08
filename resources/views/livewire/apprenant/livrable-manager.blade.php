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
          Mes Livrables
      </li>
  </ol>
  

  <!-- Card -->
   <div class="mt-5 flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">

          <!-- Table -->
          <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
            <thead class="bg-gray-50 dark:bg-neutral-800">
              <tr>

                <th scope="col" class="ps-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Projet
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
                      Date Echeance
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-10 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Etat
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
              @forelse ($livrables as $livrable)
              <tr>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-3">
                    <span class="text-sm text-gray-500 dark:text-neutral-500">{{ $livrable->affectation->projet->titre }}</span>
                  </div>
                </td>

                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-3">
                    <span class="text-sm text-gray-500 dark:text-neutral-500">{{ $livrable->affectation->classe->nom }}</span>
                  </div>
                </td>

                <td class="h-px w-72 whitespace-nowrap">
                  <div class="px-6 py-3">
                    <span class="text-sm text-gray-500 dark:text-neutral-500">{{ $livrable->affectation->date_echeance->format('d/m/Y') }}</span>
                  </div>
                </td>


                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-3">
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
                            {{ $livrable->etat }}
                        </span>
                        @endif

                        @if($livrable->etat === 'Rendu en retard')    
                        <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200">
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
                  </div>
                </td>
               
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-1.5">
                      @if (Storage::exists($livrable->piece_jointe))
                      <x-button wire:click.prevent="telechargerFichier('{{ $livrable->piece_jointe }}')" class="mr-2 bg-blue-500 hover:bg-blue-700">
                          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
                              <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
                              <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
                          </svg>
                      </x-button>
                      @endif
                  </a>
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
                    {{ $livrables->links() }}
                  </div>
              </div>
          </div>
          <!-- End Footer -->
        </div>
      </div>
    </div>
   </div>
  <!-- End Card -->

</div>