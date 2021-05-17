<div>
    @if ($isOpen)
    <div class="modal fade show" tabindex="-1" aria-labelledby="exampleModalFullscreen" style="display: block; padding-right: 13px;" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title h4" id="exampleModalXlLabel">{{__('main.Post')}}</h5>
            <button type="button" class="btn-close" aria-label="Close" wire:click="isOpen(false)"></button>
          </div>
          <form action="" wire:submit.prevent="save">
            <div class="modal-body" style="height:calc(100vh - 130px);overflow: auto; background-color:#f4f6f9;">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" wire:model.lazy="post_id">
                                <input type="hidden" wire:model.lazy="post_status" value="publish">
                                <input type="hidden" wire:model.lazy="comment_status" value="publish">
                                <div class="form-group">
                                    <label for="title">{{__('main.Title')}}</label>
                                    @if (session()->has('title')) <small class="text-danger float-end">{{ session('title') }}</small> @endif
                                    <input wire:model.lazy="title" id="title" type="text" class="form-control form-control-sm mb-2 @if(session()->has('title')) is-invalid @endif" placeholder="{{__('main.Title')}}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">{{__('main.Slug')}}</label>
                                    @if (session()->has('slug')) <small class="text-danger float-end">{{ session('slug') }}</small> @endif
                                    <input wire:model.lazy="slug" id="slug" type="text" class="form-control form-control-sm mb-2 @if(session()->has('slug')) is-invalid @endif" placeholder="{{__('main.Slug')}}">
                                </div>
                                <textarea wire:model.lazy="content" type="text" class="form-control form-control-sm mb-2 " placeholder="{{__('main.Content')}}" rows="3" ></textarea>
                            </div>
                        </div>
                        @include('layouts.admin.seo')
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <label for="">{{__('main.Language')}}</label>
                            </div>
                            <div class="card-body">
                                <select wire:model.lazy="language" id="" class="form-control form-control-sm">
                                    <option value="tr">Türkçe</option>
                                    <option value="en">English</option>
                                </select>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <label for="image">{{__('main.Featured Image')}}</label>
                            </div>
                            <div class="card-body">
                                <img src="{{$image==''? '' : config('app.url').'/storage/'.$image}}" alt="" class="featured-image">
                                <input type="hidden" wire:model="image" id="image" class="form-control form-control-sm">
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-warning btn-xs float-start" wire:click="clearFeatured">{{__('main.Remove')}}</button>
                                <livewire:admin.add-media >
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <label for="categories">{{__('main.Categories')}}</label>
                            </div>
                            <div class="card-body" style="max-height: 150px; overflow: auto;">
                                @foreach ($categories as $item)
                                    <label style="font-weight:400; width:100%"><input type="checkbox" wire:model="postCategories" class="me-2" value="{{$item->id}}">{{$item->title}}</label>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <div class="input-group">
                                    <input type="text" wire:model.lazy="category" class="form-control form-control-sm" placeholder="{{__('main.Category')}}">
                                    <button type="button" class="btn btn-success btn-xs float-start" wire:click="addCategory">{{__('main.Add')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm float-end">{{__('main.Save')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif

    <h1 class="text-center">{{__('main.Posts')}}</h1>
    <button type="button" class="btn btn-success btn-sm float-end mx-3" wire:click="create">{{__('main.Add New')}}</button>
    <div class="clearfix"></div>

    <div class="table-responsive px-3">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>{{__('main.Title')}}</th>
          <th>{{__('main.Date')}}</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @if (is_array($posts) || is_object($posts))
          @foreach ($posts as $item)
          <tr>
            <td>{{$item->title}}</td>
            <td>{{$item->created_at}}</td>
            <td style="width: 75px">
                <button wire:click="edit({{$item->id}})" type="button" class="btn btn-sm"><i class="fas fa-edit text-primary"></i></button>
                <button wire:click="delete({{$item->id}})" type="button" class="btn btn-sm"><i class="fas fa-times text-danger"></i></button>
            </td>
          </tr>
          @endforeach
        @endif
      </tbody>
    </table>
    </div>
</div>
