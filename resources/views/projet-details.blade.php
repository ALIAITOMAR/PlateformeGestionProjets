<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projets my details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                @if(auth()->user()->hasRole('enseignant'))
                    <livewire:enseignant.projet-details :userId="$userId" :id="$projetId" />
                @endif
                @if(auth()->user()->hasRole('apprenant'))
                    <livewire:apprenant.projet-details :id="$projetId" />
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
