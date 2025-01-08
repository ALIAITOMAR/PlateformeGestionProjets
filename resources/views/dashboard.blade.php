<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if(auth()->user()->hasRole('admin'))
                    <livewire:admin.dashboard />
                @endif
				@if(auth()->user()->hasRole('enseignant'))
                    <livewire:enseignant.dashboard />
                @endif
                @if(auth()->user()->hasRole('apprenant'))
                    <livewire:apprenant.dashboard />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
