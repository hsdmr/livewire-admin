<div>
    @if ($isMediaOpen)
    <div class="modal fade show" tabindex="-1" aria-labelledby="exampleModalFullscreen" style="display: block; padding-right: 13px; top:30px; left:30px" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-fullscreen" style="width: calc(100% - 60px); height: calc(100% - 60px)">
        <div class="modal-content">
          <div class="modal-body px-0">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button wire:click="uploadTab" class="nav-link {{$uploadTab==true? 'active' : ''}}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="{{$uploadTab==true? 'true' : 'false'}}">{{__('main.Upload')}}</button>
                <button wire:click="mediasTab" class="nav-link {{$mediasTab==true? 'active' : ''}}" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="{{$mediasTab==true? 'true' : 'false'}}">{{__('main.Medias')}}</button>
                <button style="margin-right: 15px" type="button" class="btn-close ms-auto" aria-label="Close" wire:click="isMediaOpen(false)"></button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade {{$uploadTab==true? 'show active' : ''}}" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <form wire:submit.prevent="save">
                    <label for="file" class="w-100" style="min-height: 500px">
                        @if ($media)
                        <img class="media-preview" src="{{ $media->temporaryUrl() }}">
                        @else
                        <div class="w-100 text-center" style="margin-top: 150px"><div class="btn btn-lg btn-success ">{{__('main.Upload')}}</div></div>
                        @endif
                    </label>
                    <input id="file" style="display: none;" type="file" wire:model.prevent="media">

                    @error('medias.*') <div class="error">{{ $message }}</div> @enderror
                    <div style="position:absolute; bottom:0; width:100%; text-align:right">
                        <hr class="m-0">
                        <button class="btn btn-success m-2 btn-sm" type="submit">{{__('main.Upload')}}</button>
                    </div>
                </form>
              </div>
              <div class="tab-pane fade {{$mediasTab==true? 'show active' : ''}}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  <div class="row m-0" style="height: calc(100vh - 162px);">
                      <div class="col-md-9 p-0" style="height: 100%; overflow:auto;">
                        @foreach ($medias as $item)
                        <a href="javascript:void(0);" wire:click="choose({{$item->id}})"><img class="media-preview" src="{{config('app.url').'/storage/'.$item->image}}" alt=""></a>
                        @endforeach
                      </div>
                      <div class="col-md-3 p-2" style="background-color: #f3f3f3">
                        @if ($singleMedia!=null)
                        <img src="{{config('app.url').'/storage/'.$singleMedia->image}}" alt="" id="preview" style="width:100%; max-height: 150px; object-fit:contain">
                        <p><a href="javascript:void(0);" class="text-danger" wire:click="delete({{$singleMedia->id}})">{{__('main.Delete')}}</a></p>
                        <div class="form-group mt-3">
                            <label for="title">{{__('main.Title')}}</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{$singleMedia->title}}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="alt">{{__('main.Alt')}}</label>
                            <input type="text" name="alt" id="alt" class="form-control" value="{{$singleMedia->content}}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="url">{{__('main.Url')}}</label>
                            <input type="text" name="url" id="url" class="form-control" readonly value="{{config('app.url').'/storage/'.$singleMedia->image}}">
                        </div>
                        @endif
                      </div>
                  </div>
                  <div style="position:absolute; bottom:0; width:100%; text-align:right">
                      <hr class="m-0">
                      <button type="button" class="btn btn-success btn-sm m-2" wire:click="choosePreview">{{__('main.Choose')}}</button>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif
    <button type="button" class="btn btn-success btn-xs float-end" wire:click="create">{{__('main.Add')}}</button>

</div>
