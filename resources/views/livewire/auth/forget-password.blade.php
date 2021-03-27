<div>
    <div class="mx-auto border rounded" style="margin-top:calc(25vh - 75px); background-color:white; max-width:500px">
    <form wire:submit.prevent="register" class="px-4 py-3">
      <div class="mb-3">
        <label for="email" class="form-label">{{__('auth.Email')}}</label>
        <input wire:model.lazy="email" type="email" class="form-control" id="email" placeholder="email@example.com">
        @error('email') <span class="error">{{ $message }}</span> @enderror
      </div>
      <button type="submit" class="btn btn-primary">{{__('auth.Send')}}</button>
    </form>
  </div>
</div>
