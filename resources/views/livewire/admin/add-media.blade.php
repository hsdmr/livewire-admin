<div>
    @if ($isMediaOpen)
    <div class="modal fade show" tabindex="-1" aria-labelledby="exampleModalFullscreen" style="display: block; padding-right: 13px;" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">{{__('main.Upload')}}</button>
                <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">{{__('main.Medias')}}</button>
                <button type="button" class="btn-close ms-auto" aria-label="Close" wire:click="isMediaOpen(false)"></button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <form wire:submit.prevent="save">
                    <label for="file" class="w-100 border" style="min-height: 500px">
                        @if ($media)
                        <img class="media-preview" src="{{ $media->temporaryUrl() }}">
                        @else
                        <div class="w-100 text-center" style="margin-top: 150px"><div class="btn btn-lg btn-success ">Upload</div></div>
                        @endif
                    </label>
                    <input id="file" style="display: none;" type="file" wire:model="media">

                    @error('medias.*') <div class="error">{{ $message }}</div> @enderror
                    <button class="btn btn-success" type="submit">Save Photo</button>
                </form>
              </div>
              <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                @foreach ($medias as $item)
                <img class="media-preview" src="{{config('app.url').'/storage/'.$item->image}}" alt="">
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif
    <button type="button" class="btn btn-success btn-sm float-end mx-3" wire:click="create">{{__('main.Add New')}}</button>
</div>
