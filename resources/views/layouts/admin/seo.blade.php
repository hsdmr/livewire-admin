<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="seo_title">{{__('main.Seo Title')}}</label>
            <div class="input-group">
                <input wire:model.lazy="seo_title" id="seo_title" type="text" class="form-control form-control-sm" onkeyup='rangeCount("seo_title","seotit",1,40,60)'>
                <span class="input-group-text" id="seotit">0</span>
            </div>
            <small>{{ __('main.Green Range Is Ideal') }}</small>
        </div>
        <div class="form-group">
            <label for="seo_description">{{__('main.Seo Description')}}</label>
            <div class="input-group">
                <textarea wire:model.lazy="seo_description" id="seo_description" class="form-control form-control-sm" rows="3" onkeyup='rangeCount("seo_description","seodes",1,120,157)'></textarea>
                <span class="input-group-text" id="seodes">0</span>
            </div>
            <small>{{ __('main.Green Range Is Ideal') }}</small>
        </div>
        <div class="custom-control custom-checkbox">
            <input wire:model.lazy="index" class="custom-control-input" type="checkbox" id="index" name="index">
            <label for="index" class="custom-control-label">{{__('main.Index')}}</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input wire:model.lazy="follow" class="custom-control-input" type="checkbox" id="follow" name="follow">
            <label for="follow" class="custom-control-label">{{__('main.Follow')}}</label>
        </div>
    </div>
</div>

<script>
rangeCount("seo_title","seotit",1,40,60);
rangeCount("seo_description","seodes",1,120,157);
</script>
