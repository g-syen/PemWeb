<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
  </head>
  <body>
    <div class="container">
      <div class="login-box">
        <h2>LOGIN</h2>
        
        <!-- Include Session Status -->
        @if (session('status'))
          <div class="mb-4 text-sm font-medium text-green-600">
              {{ session('status') }}
          </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
          @csrf
          
          <div class="textbox">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              placeholder="enter your email"
              name="email"
              value="{{ old('email') }}"
              required
              autofocus
              autocomplete="username"
            />
            @error('email')
              <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="textboxPassword">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              placeholder="enter your password"
              name="password"
              required
              autocomplete="current-password"
            />
            @error('password')
              <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
              <input
                id="remember_me"
                type="checkbox"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                name="remember"
              >
              <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
          </div>

          <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
          <button type="submit" class="btn">LOGIN</button>
        </form>
      </div>

      <div class="register-box">
        <div class="register-content">
          <img src="{{ asset('image/logoLoginPage.png') }}" alt="Logo" />
          <h2>sho-cart</h2>
          <p>
            DON'T HAVE ACCOUNT? JOIN US AND START MAINTAINING YOUR MONTHLY BUY
          </p>
          <a class="register-btn" href="{{ route('register') }}">REGISTER HERE</a>
        </div>
      </div>
    </div>
  </body>
</html>
