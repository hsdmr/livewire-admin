<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

class Media extends Component
{
    use WithFileUploads;
    public $media;

    public function save()
    {
        $this->validate([
            'media' => 'image|video|mimes:jpg,jpeg,png,svg,gif,mp4|max:1024',
        ]);
        $this->media->store('media','public');
    }
    public function render()
    {
        return view('livewire.admin.media')->layout('layouts.admin.app');
    }
}
