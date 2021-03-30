<?php

namespace App\Http\Livewire\Admin;

use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Media extends Component
{
    use WithFileUploads;
    public $isOpen = false;
    public $medias = [];
    public $allMedias;

    public function render()
    {
        $this->allMedias = Posts::orderBy('created_at','desc')->where('type','=','media')->get();
        return view('livewire.admin.media')->layout('layouts.admin.app');
    }

    public function updated()
    {
        $this->validate([
            'medias.*' => 'mimes:jpg,jpeg,png,svg,gif,mp4|max:1024',
        ]);
    }

    public function save(){
        foreach($this->medias as $media){
            $url = $media->store('media','public');
            Posts::create([
                'user_id' => Auth::id(),
                'title' => $media->getClientOriginalName(),
                'image' => $url,
                'type' => 'media',
                'comment_status' => 'close',
            ]);
        }
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->medias = [];
    }

    public function isOpen($bool){
        $this->isOpen = $bool;
    }

    public function create(){
        $this->resetInputFields();
        $this->isOpen = true;
    }


}
