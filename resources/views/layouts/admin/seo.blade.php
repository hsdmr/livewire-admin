<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="seo_title">{{__('main.Seo Title')}}</label>
            <small class="text-success float-end">{{ __('main.Green Range Is Ideal') }}</small>
            <div class="input-group">
                <input wire:model.lazy="seo_title" id="seo_title" type="text" class="form-control form-control-sm" onkeyup='rangeCount("seo_title","seotit",0,40,60)'>
                <span class="input-group-text @php if(0<$seoTitleCount && $seoTitleCount<40) echo "btn-warning"; elseif(40<$seoTitleCount && $seoTitleCount<60) echo "btn-success"; elseif(60<$seoTitleCount) echo "btn-danger"; @endphp" id="seotit">{{$seoTitleCount}}</span>
            </div>
        </div>
        <div class="form-group">
            <label for="seo_description">{{__('main.Seo Description')}}</label>
            <small class="text-success float-end">{{ __('main.Green Range Is Ideal') }}</small>
            <div class="input-group">
                <textarea wire:model.lazy="seo_description" id="seo_description" class="form-control form-control-sm" rows="3" onkeyup='rangeCount("seo_description","seodes",0,120,157)'></textarea>
                <span class="input-group-text @php if(0<$seoDescriptionCount && $seoDescriptionCount<120) echo "btn-warning"; elseif(120<$seoDescriptionCount && $seoDescriptionCount<157) echo "btn-success"; elseif(157<$seoDescriptionCount) echo "btn-danger"; @endphp" id="seodes">{{$seoDescriptionCount}}</span>
            </div>
        </div>
        <div class="custom-control custom-checkbox">
            <input wire:model.lazy="index" class="custom-control-input" type="checkbox" id="index" name="index" checked>
            <label for="index" class="custom-control-label">{{__('main.Index')}}</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input wire:model.lazy="follow" class="custom-control-input" type="checkbox" id="follow" name="follow" checked>
            <label for="follow" class="custom-control-label">{{__('main.Follow')}}</label>
        </div>
    </div>
</div>

<script>
    rangeCount("seo_title","seotit",1,40,60);
    rangeCount("seo_description","seodes",1,120,157);
    $(function () {
        $('#content-summernote').summernote({
            tabsize: 2,
            height: 200,
            callbacks: {
                onChange: function(contents, $editable){
                    @this.set('content', contents);
                }
            }
        });
    });
</script>
