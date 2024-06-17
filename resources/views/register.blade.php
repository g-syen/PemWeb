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
          <img src="image/logoLoginPage.png" alt="" />
          <h2>sho-cart</h2>
          <p>
            ALREADY HAVE AN ACCOUNT? LOG IN AND CONTINUE YOUR MONTHLY BUY LIST
          </p>
          <a class="btn" href="login">LOGIN HERE</a>
        </div>
      </div>
      <div class="register-section">
        <h2>REGISTER</h2>
        <form>
          <div class="textbox">
            <label for="email">Email</label>
            <input
              type="email"
              placeholder="enter your email"
              name="email"
              required
            />
          </div>
          <div class="textbox">
            <label for="password">Password</label>
            <input
              type="password"
              placeholder="enter new password"
              name="password"
              required
            />
          </div>
          <div class="textbox">
            <label for="confirm-password">Confirm Password</label>
            <input
              type="password"
              placeholder="confirm your password"
              name="confirm-password"
              required
            />
          </div>
          <button type="submit" class="btn">REGISTER</button>
        </form>
      </div>
    </div>
  </body>
</html>
