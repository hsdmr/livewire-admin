<div>
    <div class="mx-auto border rounded" style="margin-top:calc(25vh - 75px); background-color:white; max-width:500px">
        <form wire:submit.prevent="login" class="px-4 py-3">
            @error('failed') <div class="alert alert-danger">{{ $message }}</div> @enderror
          <div class="mb-3">
            <label for="email" class="form-label">{{__('auth.Email')}}</label>
            <input wire:model.lazy="email" type="text" class="form-control" id="email" placeholder="email@example.com" value="{{ $email }}">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">{{__('auth.Password')}}</label>
            <input wire:model.lazy="password" type="password" class="form-control" id="password" placeholder="Password" value="{{ $password }}">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input wire:model.lazy="remember_me" type="checkbox" class="form-check-input" id="remember">
              <label class="form-check-label" for="remember">
                {{__('auth.Remember me')}}
              </label>
              @error('remember_me') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <button type="submit" class="btn btn-primary">{{__('auth.Sign in')}}</button>
        </form>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{route('register')}}">{{__('auth.Sign up')}}</a>
        <a class="dropdown-item" href="{{route('forget-password')}}">{{__('auth.Forgot password?')}}</a>
    </div>
</div>
