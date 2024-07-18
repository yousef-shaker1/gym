<div>
    <div class="register-container">
        <h2>Register</h2>
        @if (Session()->has('add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session()->get('add') }}</strong>
        </div>
      @endif
        <form action="{{ route('customer.store') }}" method="POST">
            @csrf
            <input type="text" name="name" wire:model.live="name" placeholder="Name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
            <input type="email" name="email" wire:model.live="email" placeholder="Email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <input type="password" name="password" wire:model.live="password" placeholder="Password" class="@error('password') is-invalid @enderror" value="{{ old('password') }}">
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror
            
            <input type="tel" name="phone" placeholder="Phone" wire:model.live="phone" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}">
            @error('phone')
            <div class="error-message">{{ $message }}</div>
            @enderror
            
            <input type="tel" name="age" placeholder="age" wire:model.live="age" class="@error('age') is-invalid @enderror" value="{{ old('age') }}">
            @error('age')
            <div class="error-message">{{ $message }}</div>
            @enderror
            
            <input type="date" name="birthdate" placeholder="Birthdate" wire:model.live="birthdate" class="@error('birthdate') is-invalid @enderror" value="{{ old('birthdate') }}">
            @error('birthdate')
            <div class="error-message">{{ $message }}</div>
            @enderror
            
            <input type="text" name="address" placeholder="Address" wire:model.live="address" class="@error('address') is-invalid @enderror" value="{{ old('address') }}">
            @error('address')
            <div class="error-message">{{ $message }}</div>
            @enderror
            
            <button type="submit">Register</button>
        </form>
        <a href="{{ route('login') }}">Already have an account? Login</a>
    </div>
</div>
