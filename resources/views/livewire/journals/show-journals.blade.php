<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with() {
        return [
            "journals"=>auth()->user()->journals()->get()
    ];
    }
}; ?>
@if($journals->isEmpty())
    <div class="text-center font-bold space-y-4 text-xl">
        <h1>Nothing is here, let's share your first journal with the world</h1>
        <x-primary-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-5 rounded" href="{{ route('journals.create') }}" wire:navigate>Write a jourrnal</x-primary-button>
    </div>
@else

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
    
     @foreach($journals as $journal)
    @php
        // Determine background color based on rating
        $ratingColor = 'bg-green-300'; // Default color
        if ($journal->rating < 5) {
            $ratingColor = 'bg-red-300';
        } elseif ($journal->rating >= 5 && $journal->rating < 8) {
            $ratingColor = 'bg-yellow-300';
        }
    @endphp
    <div class="flex flex-col {{ $ratingColor }} p-4 rounded-lg shadow-md" wire:key="{{ $journal->id }}">
        <!-- Title and Date -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
            <h1 class="text-lg font-bold">{{ $journal->title }}</h1>
            <span class="text-gray-500 text-sm">{{ $journal->created_at->diffForHumans() }}</span>
        </div>
        
        <!-- Note Body -->
        <div class="mb-4 flex-1">
            <p>{{ $journal->body }}</p>
        </div>
        
        <!-- Rating -->
        <div class="text-center">
            <p class="text-lg font-semibold">Rating: {{ $journal->rating }}</p>
        </div>
        
        <!-- Posted by -->
        <div class="text-right text-gray-600 text-sm">
            <p>Posted by: {{ auth()->user()->name }}</p>
        </div>
    </div>
    @endforeach
    @endif
</div>