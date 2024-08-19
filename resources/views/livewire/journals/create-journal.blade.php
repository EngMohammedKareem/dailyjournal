<?php

use Livewire\Volt\Component;
use App\Models\Journal;

new class extends Component {
    public $title;
    public $body;
    public $rating;
    public function submit() {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'rating' => ['required', 'numeric', 'min:1', 'max:10'],
        ]);

        $journal = new Journal;
        $journal->title = $this->title;
        $journal->body = $this->body;
        $journal->rating = $this->rating;
        $journal->user_id = Auth::id();
        $journal->save();
        return redirect('/journals');
    }
}; ?>

<div>
    <form wire:submit="submit" class="space-y-4">
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input wire:model="title" id="title" name="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" />
        <x-input-label for="body" :value="__('Tell Us How Your Day Was')" />
        <textarea wire:model="body" id="body" name="body" class="mt-1 block w-full" required ></textarea> 
        <x-input-label for="rating" :value="__('Rate Your Day')" />
        <input type="range" name="rating" min="1" max="10" wire:model="rating" class="mt-1 block w-full" />
        <div class="flex justify-between space-x-6">
            <x-primary-button class="text-white font-bold p-4 rounded-xl" type="submit">
                CREATE
            </x-primary-button>
            <x-primary-button class="text-white font-bold p-4 rounded-xl" href="{{ route('journals.index') }}" wire:navigate>
                BACK TO JOURNALS
            </x-primary-button>
    </form>
</div>
