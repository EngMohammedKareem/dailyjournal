<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Share Your Day Here') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-primary-button class=" p-5 rounded m-4" href="{{ route('journals.create') }}" wire:navigate>CREATE JOURNAL</x-primary-button>
                <div class="p-6 text-gray-900">
                    <livewire:journals.show-journals/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
