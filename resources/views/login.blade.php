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
        <form>
          <div class="textbox">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              placeholder="enter your email"
              name="email"
              required
            />
          </div>
          <div class="textboxPassword">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              placeholder="enter your password"
              name="password"
              required
            />
          </div>
          <a href="#" class="forgot-password">forgot password?</a>
          <button type="submit" class="btn">LOGIN</button>
        </form>
      </div>
      <div class="register-box">
        <div class="register-content">
          <img src="image/logoLoginPage.png" alt="" />
          <h2>sho-cart</h2>
          <p>
            DON'T HAVE ACCOUNT? JOIN US AND START MAINTAINING YOUR MONTHLY BUY
          </p>
          <a class="register-btn" href="register">REGISTER HERE</a>
        </div>
      </div>
    </div>
  </body>
</html>
