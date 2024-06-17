<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
  </head>
  <body>
    <div class="container">
      <div class="login-section">
        <div class="login-content">
          <img src="{{ asset('image/logoLoginPage.png') }}" alt="Logo" />
          <h2>sho-cart</h2>
          <p>
            ALREADY HAVE AN ACCOUNT? LOG IN AND CONTINUE YOUR MONTHLY BUY LIST
          </p>
          <a class="btn" href="{{ route('login') }}">LOGIN HERE</a>
        </div>
      </div>
      <div class="register-section">
        <h2>REGISTER</h2>
        <form method="POST" action="{{ route('register') }}">
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
              autocomplete="username"
            />
            @error('email')
              <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
          </div>
          <div class="textbox">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              placeholder="enter new password"
              name="password"
              required
              autocomplete="new-password"
            />
            @error('password')
              <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
          </div>
          <div class="textbox">
            <label for="password_confirmation">Confirm Password</label>
            <input
              type="password"
              id="password_confirmation"
              placeholder="confirm your password"
              name="password_confirmation"
              required
              autocomplete="new-password"
            />
            @error('password_confirmation')
              <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn">REGISTER</button>
        </form>
      </div>
    </div>
  </body>
</html>
