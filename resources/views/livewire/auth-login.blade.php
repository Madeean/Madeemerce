<div>
    <div class="hero ">
        <div class="hero-content w-full">
          <div class="card  w-full max-w-sm shadow-2xl bg-base-100">
            <h1 class="text-center font-medium">Login</h1>
            @if (session()->has('success'))
            <div class="alert alert-success shadow-lg">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>{{ session('success') }}</span>
                </div>
              </div>
            @endif
            <form wire:submit.prevent="store">
                @csrf
                <div class="card-body">
                  <div class="form-control">
                    <label class="label"><span class="label-text">Email</span></label>
                    <input type="text" name="email" placeholder="email" class="input input-bordered @error('email') is-invalid @enderror" wire:model="email">
                    @error('email')
                      <span class="text-red-600">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-control">
                    <label class="label"><span class="label-text">Password</span></label>
                    <input 
                    @if ($show_password == 'show')
                        type="text"
                    @else
                        type="password"
                    @endif
                    placeholder="password" class="input input-bordered" wire:model="password" name="password" @error('passworrd') is-invalid @enderror>
                    @error('passworrd')
                      <span class="text-red-600">{{ $message }}</span>
                    @enderror
                    <div>
                        <input type="checkbox" value="show" wire:model="show_password"> Lihat Password
                    </div>
                  </div>
                  <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
</div>
