<?php

namespace App\Http\Livewire\Admin;

use App\Models\Posts;
use App\Models\Slugs;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Post extends Component
{
    public $isOpen=false;
    public $slug_id,$user_id,$post_id,$parent,$image,$title,$content,$post_status = "publish",$comment_status="open",$language,$categories;
    public $slug,$seo_title,$seo_description,$index,$follow;
    public $posts = [];

    public function render()
    {
        $isUnique = Slugs::select('id')->where('slug','=',$this->slug)->where('language','=',$this->language)->first();
        if($isUnique!=null) session()->flash('slug', __('alert.Slug must be unique.'));
        $this->slug = Str::slug($this->title,'-');
        $this->posts = Posts::where('type','=','post')->get();
        return view('livewire.admin.post')->layout('admin.layouts.app');
    }

    public function isOpen($bool){
        $this->isOpen = $bool;
    }

    public function create(){
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function save(){
        if($this->title=="") return;
        if($this->post_id==""){
            $slugs = Slugs::create([
                'slug' => $this->slug,
                'seo_title' => $this->seo_title,
                'seo_description' => $this->seo_description,
                'index' => $this->index,
                'follow' => $this->follow,
                'language' => $this->language,
            ]);
            $post = Posts::create([
                'slug_id' => $slugs->id,
                'user_id' => 1,
                'image' => $this->image,
                'title' => $this->title,
                'content' => $this->content,
                'type' => 'post',
                'post_status' => $this->post_status,
                'comment_status' => $this->comment_status,
                'language' => $this->language,
            ]);
            session()->flash('slug', __('alert.Saved Successfully'));
        }
        else{
            $post = Posts::find($this->post_id);
            Posts::create([
                'post_id' => $this->post_id,
                'slug_id' => $post->slug_id,
                'user_id' => $post->user_id,
                'image' => $post->image,
                'title' => $post->title,
                'content' => $post->content,
                'type' => 'revision',
                'post_status' => 'inherit',
                'comment_status' => $post->comment_status,
                'language' => $post->language,
            ]);
            $post->seo->update([
                'slug' => $this->slug,
                'seo_title' => $this->seo_title,
                'seo_description' => $this->seo_description,
                'index' => $this->index,
                'follow' => $this->follow,
                'language' => $this->language,
            ]);
            $post->update([
                'image' => $this->image,
                'user_id' => $post->user_id,
                'title' => $this->title,
                'content' => $this->content,
                'post_status' => $this->post_status,
                'comment_status' => $this->comment_status,
                'language' => $this->language,
            ]);
            session()->flash('slug', __('alert.Updated Successfully'));
        }
        $this->resetInputFields();
        $this->isOpen = false;
    }

    public function edit($id){
        $this->isOpen = true;
        $post = Posts::find($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->slug = $post->slug;
        $this->image = $post->image;
        $this->seo_title = $post->seo->seo_title;
        $this->seo_description = $post->seo->seo_description;
        $this->index = $post->seo->index;
        $this->follow = $post->seo->follow;
    }

    private function resetInputFields(){
        $this->title = '';
        $this->content = '';
        $this->slug = '';
        $this->categories = [];
        $this->imageId = '';
        $this->seoTitle = '';
        $this->seoDescription = '';
        $this->index = '';
        $this->follow = '';
    }

}
