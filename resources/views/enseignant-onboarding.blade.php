<x-guest-layout>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <img src="{{url('/logo.jpg')}}" width="250" height="250" alt="Image"/>
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                <livewire:enseignant-onboarding />
            </div>
        </div>
    </div>
</x-guest-layout>
