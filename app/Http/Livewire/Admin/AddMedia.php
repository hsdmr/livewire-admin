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
    public $uploadTab = false;
    public $mediasTab = true;
    public $singleMedia;
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
        $this->media = null;
        $this->mediasTab();
    }

    private function resetInputFields(){
        $this->media = null;
    }

    public function create(){
        $this->resetInputFields();
        $this->isMediaOpen = true;
    }

    public function choose($id){
        $this->singleMedia = Posts::find($id);
    }

    public function delete($id){
        Posts::find($id)->delete();
        $this->singleMedia = null;
    }

    public function mediasTab(){
        $this->mediasTab = true;
        $this->uploadTab = false;
    }

    public function uploadTab(){
        $this->uploadTab = true;
        $this->mediasTab = false;
    }

    public function choosePreview(){
        $this->isMediaOpen = false;
        $this->emitUp('addFeatured',$this->singleMedia->image);
    }
}
