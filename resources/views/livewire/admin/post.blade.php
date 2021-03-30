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
            <livewire:admin.add-media >
            <div class="modal-body" style="height:calc(100vh - 130px);overflow: auto">
                <div class="row">
                    <div class="col-md-9">
                        <input type="hidden" wire:model.lazy="post_id">
                        <input type="hidden" wire:model.lazy="post_status" value="publish">
                        <input type="hidden" wire:model.lazy="comment_status" value="publish">
                        <input wire:model.lazy="title" type="text" class="form-control mb-2 @if($title!="") is-valid @else is-invalid @endif" placeholder="{{__('main.Title')}}">
                        <input wire:model.lazy="slug" type="text" class="form-control mb-2 @if(session()->has('slug')) is-invalid @endif" placeholder="{{__('main.Slug')}}">
                        @if (session()->has('slug'))
                        <p class="text-danger">{{ session('slug') }}</p>
                        @endif
                        <textarea wire:model.lazy="content" type="text" class="form-control mb-2" placeholder="{{__('main.Content')}}" rows="3" ></textarea>
                        <input wire:model.lazy="image" type="text" class="form-control mb-2" placeholder="{{__('main.Image')}}">
                        <input wire:model.lazy="seo_title" type="text" class="form-control mb-2" placeholder="{{__('main.Seo Title')}}">
                        <input wire:model.lazy="seo_description" type="text" class="form-control mb-2" placeholder="{{__('main.Seo Description')}}">
                        <input wire:model.lazy="index" type="text" class="form-control mb-2" placeholder="{{__('main.Index')}}">
                        <input wire:model.lazy="follow" type="text" class="form-control mb-2" placeholder="{{__('main.Follow')}}">
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm float-end">{{__('main.Add New')}}</button>
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
            <td>{{$item->title}}</td>
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
