<?php

use Livewire\Volt\Component;
use App\Models\Journal;

new class extends Component {
    public function with() {
        return [
            "journals"=>auth()->user()->journals()->get()
    ];
    }
    public function destroy($journalid) {
        $journal = Journal::where('id', $journalid)->first();
        $journal->delete();
    }
}; ?>
@if($journals->isEmpty())
    <div class="text-center font-bold text-xl">
        <h1>Nothing is here, Click up there to share your first journal with the world</h1>
    </div>
@else

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
    
     @foreach($journals as $journal)
    @php
        // Journals lower than 6 are red and higher than 6 are green
        $ratingColor = $journal->rating < 6 ? 'bg-red-300' : 'bg-green-300';
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
        <div class="flex justify-between items-center mt-3">
            <x-danger-button wire:click="destroy('{{ $journal->id }}')">DELETE</x-danger-button>
            <p>Posted by: {{ auth()->user()->name }}</p>
        </div>
    </div>
    @endforeach
    @endif
</div>