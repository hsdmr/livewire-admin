<div>
    <form wire:submit.prevent="save">
        @if ($media)
            Photo Preview:
            <img src="{{ $media->temporaryUrl() }}">
            {{$name}}
        @endif

        <input type="file" wire:model="media" multiple>

        @error('media') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">Save Photo</button>
    </form>
</div>
