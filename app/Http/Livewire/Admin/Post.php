<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Post as ModelsPost;
use App\Models\Slug;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Post extends Component
{
    public $isOpen = false;
    public $slug_id, $user_id, $post_id, $parent, $image, $title, $content, $category, $categories;
    public $language = 'en';
    public $post_status = "publish";
    public $comment_status = "open";
    public $slug, $seo_title, $seo_description, $index, $follow, $seoTitleCount = 0, $seoDescriptionCount = 0;
    public $postCategories = [];
    public $posts;

    protected $listeners = ['addFeatured'];

    public function render()
    {
        $this->seoTitleCount = strlen($this->seo_title);
        $this->seoDescriptionCount = strlen($this->seo_description);
        $this->posts = ModelsPost::where('type','=','post')->get();
        $this->categories = Category::where('type','=','post')->get();
        $this->slug = $this->slug==""? Str::slug($this->title,'-') : Str::slug($this->slug,'-');
        if($this->isSlugUnique()==false) session()->flash('slug', __('alert.Slug must be unique'));

        return view('livewire.admin.post')->layout('layouts.admin.app');
    }

    public function isSlugUnique(){
        $slugCheck = Slug::select('id')->where('slug','=',$this->slug)->where('language','=',$this->language)->first();
        if($slugCheck!=null && $this->post_id==''){
            return false;
        }
        if($slugCheck!=null && ModelsPost::find($this->post_id)->slug_id!=$slugCheck->id){
            return false;
        }
        return true;
    }

    public function isOpen($bool){
        $this->isOpen = $bool;
    }

    public function create(){
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function save(){
        if($this->title==""){
            session()->flash('title', __('alert.Title cannot be empty'));
            return;}
        if($this->isSlugUnique()==false){
            session()->flash('slug', __('alert.Slug must be unique'));
            return;
        }
        if($this->post_id==""){
            $slugs = Slug::create([
                'owner' => 'post',
                'slug' => $this->slug,
                'title' => $this->seo_title,
                'description' => $this->seo_description,
                'index' => $this->index,
                'follow' => $this->follow,
                'language' => $this->language,
            ]);
            $post = ModelsPost::create([
                'slug_id' => $slugs->id,
                'user_id' => Auth::id(),
                'image' => $this->image,
                'title' => $this->title,
                'content' => $this->content,
                'type' => 'post',
                'post_status' => $this->post_status,
                'comment_status' => $this->comment_status,
                'language' => $this->language,
            ]);
            $post->categories()->detach();
            foreach($this->postCategories as $categoryId){
                $post->categories()->attach($categoryId);
            }
            session()->flash('slug', __('alert.Saved Successfully'));
        }
        else{
            $post = ModelsPost::find($this->post_id);
            ModelsPost::create([
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
                'title' => $this->seo_title,
                'description' => $this->seo_description,
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
            $post->categories()->detach();
            foreach($this->postCategories as $categoryId){
                $post->categories()->attach($categoryId);
            }
            session()->flash('info', __('alert.Updated Successfully'));
        }
        $this->resetInputFields();
        $this->isOpen = false;
    }

    public function edit($id){
        $this->isOpen = true;
        $post = ModelsPost::find($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->slug = $post->slug;
        $this->image = $post->image;
        $this->seo_title = $post->seo->seo_title;
        $this->seo_description = $post->seo->seo_description;
        $this->index = $post->seo->index;
        $this->follow = $post->seo->follow;
        $this->postCategories = [];
        foreach($post->categories as $pc){
            array_push($this->postCategories,$pc->id);
        }
    }

    public function delete($id){
        $post = ModelsPost::find($id);
        $post->categories()->detach();
        $post->seo->delete();
        $post->delete();
    }

    private function resetInputFields(){
        $this->title = '';
        $this->content = '';
        $this->slug = '';
        $this->categories = [];
        $this->postCategories = [];
        $this->image = '';
        $this->seoTitle = '';
        $this->seoDescription = '';
        $this->index = true;
        $this->follow = true;
    }

    public function addCategory(){
        if($this->category=='') return;
        $slug = Str::slug($this->category,'-');
        $isUnique = Slug::select('id')->where('slug','=',$slug)->where('language','=',$this->language)->first();
        if($isUnique!=null) {
            $slug = $slug.uniqid(3);
        };
        $slugRow = Slug::create([
            'slug' => $slug,
            'owner' => 'category',
            'language' => $this->language,
        ]);
        Category::create([
            'slug_id' => $slugRow->id,
            'title' => $this->category,
        ]);
        $this->category = '';
    }

    public function addFeatured($imageUrl){
        $this->image = $imageUrl;
    }

    public function clearFeatured(){
        $this->image = '';
    }

}
