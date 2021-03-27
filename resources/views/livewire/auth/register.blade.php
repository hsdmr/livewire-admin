<div>
    <div class="mx-auto border rounded" style="margin-top:calc(25vh - 75px); background-color:white; max-width:500px">
        <form wire:submit.prevent="register" class="px-4 py-3">
          @error('failed') <div class="alert alert-danger">{{ $message }}</div> @enderror
          <div class="mb-3">
            <label for="first-name" class="form-label">{{__('auth.First Name')}}</label>
            <input wire:model.lazy="first_name" type="text" class="form-control" id="first-name" placeholder="">
            @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="last-name" class="form-label">{{__('auth.Last Name')}}</label>
            <input wire:model.lazy="last_name" type="text" class="form-control" id="last-name" placeholder="">
            @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">{{__('auth.Email')}}</label>
            <input wire:model.lazy="email" type="text" class="form-control" id="email" placeholder="email@example.com">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">{{__('auth.Password')}}</label>
            <input wire:model.lazy="password" type="password" class="form-control" id="password" placeholder="Password">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input wire:model.lazy="terms" type="checkbox" class="form-check-input" id="terms">
              <label class="form-check-label" for="terms">
                {{__('auth.I accept the terms.')}}
              </label>
              @error('terms') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
          </div>
          <button type="submit" class="btn btn-primary">{{__('auth.Register')}}</button>
        </form>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{route('login')}}">{{__('auth.Login')}}</a>
    </div>
</div>
