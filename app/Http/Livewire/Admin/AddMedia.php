<?php

namespace App\Http\Livewire\Admin;

use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddMedia extends Component
{
    use WithFileUploads;
    public $isMediaOpen = false;
    public $media;
    public $medias;

    public function render()
    {
        $this->medias = Posts::orderBy('created_at','desc')->where('type','=','media')->get();
        return view('livewire.admin.add-media');
    }

    public function isMediaOpen($bool){
        $this->isMediaOpen = $bool;
    }

    public function updated()
    {
        $this->validate([
            'medias.*' => 'mimes:jpg,jpeg,png,svg,gif,mp4|max:1024',
        ]);
    }

    public function save(){
        $url = $this->media->store('media','public');
        Posts::create([
            'user_id' => Auth::id(),
            'title' => $this->media->getClientOriginalName(),
            'image' => $url,
            'type' => 'media',
            'comment_status' => 'close',
        ]);
        $this->isMediaOpen = false;
    }

    private function resetInputFields(){
        $this->medias = [];
    }

    public function create(){
        $this->resetInputFields();
        $this->isMediaOpen = true;
    }
}
