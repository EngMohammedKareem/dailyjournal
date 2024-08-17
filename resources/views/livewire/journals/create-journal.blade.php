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
        <div class="mt-5">
            <x-primary-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-5 rounded" type="submit">
                {{ __('Create') }}
            </x-primary-button>
    </form>
</div>
