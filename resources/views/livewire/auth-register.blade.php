
<div>
    <div class="hero ">
        <div class="hero-content w-full">
          <div class="card  w-full max-w-sm shadow-2xl bg-base-100">
            <h1 class="text-center font-medium">Register</h1>
            <form wire:submit.prevent="store">
              <div class="card-body">
                  <div class="form-control">
                    <label class="label"><span class="label-text">Name</span></label>
                    <input type="text" name="name" placeholder="Name" class="input input-bordered @error('name') is-invalid @enderror" wire:model="name">
                    @error('name')
                      <span class="text-red-600">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-control">
                    <label class="label"><span class="label-text">Email</span></label>
                    <input type="text" name="email" placeholder="email" class="input input-bordered @error('email') is-invalid @enderror" wire:model="email">
                    @error('email')
                      <span class="text-red-600">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-control">
                    <label class="label"><span class="label-text">Password</span></label>
                    <input type="password" name="password" placeholder="password" class="input input-bordered @error('password') is-invalid @enderror" wire:model="password">
                    @error('password')
                      <span class="text-red-600">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-control">
                    <label class="label"><span class="label-text">Confirm Password</span></label>
                    <input type="password" name="password2" placeholder="Confirm Password" class="input input-bordered @error('password2') is-invalid @enderror" wire:model="password2">
                    @error('password2')
                      <span class="text-red-600">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary">Register</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
</div>
