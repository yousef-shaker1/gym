<div>
    <div class="login-container">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="text" name="email" wire:model.live='email' placeholder="Email" required>
            @error('email')<div class="error-message">{{ $message }}</div>@enderror
            <input type="password" name="password" wire:model.live='password' placeholder="Password" required>
            @error('password')<div class="error-message">{{ $message }}</div>@enderror
            <br>
            <button type="submit">Login</button>
        </form>
        <a href="{{ route('register') }}">Don't have an account? Register</a>
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
        @endif
    </div>
</div>
