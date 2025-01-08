<x-app-layout>
    <div class="w-full">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            @if(auth()->user()->hasRole('enseignant'))
                <livewire:enseignant.projet-manager />
            @endif
            @if(auth()->user()->hasRole('apprenant'))
                <livewire:apprenant.projet-manager />
            @endif
        </div>
    </div>
</x-app-layout>

