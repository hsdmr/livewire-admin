<div>
    @if ($isOpen)
    <div class="modal fade show" tabindex="-1" aria-labelledby="exampleModalFullscreen" style="display: block; padding-right: 13px;" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title h4" id="exampleModalXlLabel">{{__('main.Post')}}</h5>
            <button type="button" class="btn-close" aria-label="Close" wire:click="isOpen(false)"></button>
          </div>
          <div class="modal-body">
            <form wire:submit.prevent="save">
                <label for="file" class="w-100 border" style="min-height: 500px">
                    @if ($medias)
                    @foreach ($medias as $item)
                    <img class="media-preview" src="{{ $item->temporaryUrl() }}">
                    @endforeach
                    @else
                    <div class="w-100 text-center" style="margin-top: 150px"><div class="btn btn-lg btn-success ">{{__('main.Upload')}}</div></div>
                    @endif
                </label>
                <input id="file" style="display: none;" type="file" wire:model="medias" multiple>

                @error('medias.*') <div class="error">{{ $message }}</div> @enderror
                <button class="btn btn-success" type="submit">Save Photo</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif

    <h1 class="text-center">{{__('main.Media')}}</h1>
    <button type="button" class="btn btn-success btn-sm float-end mx-3" wire:click="create">{{__('main.Add New')}}</button>
    <div class="clearfix"></div>
    <div class="row m-0 border">
        @foreach ($allMedias as $item)
        <img class="media-preview" src="{{config('app.url').'/storage/'.$item->image}}" alt="">
        @endforeach
    </div>
</div>
