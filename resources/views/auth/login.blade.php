<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Skin MD</title>
            <link rel="stylesheet" href="{{asset('./css/login.css')}}">
            
      </head>
      <body>
            <div class="split-screen">
                  <div class="left">
                        <section class="copy">
                              
                        </section>
                  </div>

                  <div class="right">
                        <form method="POST" action="{{ route('login') }}">
			      @csrf
                              <figure>
                                    <img src="{{asset('./images/logo.jpg')}}"/>
                              </figure>
                              <section class="copy">
                                    <h2>SKIN MD MANAGEMENT AND INVENTORY SYSTEM</h2>
                              </section>

                              <div class="input-container name">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="email" placeholder="Email">

			                        	@error('email')
                                    <span class="invalid-feedback" style="color: red;" role="alert">
                                        <p>{{ $message }}<p>
                                    </span>
                                @enderror
                              </div>

                              <div class="input-container name">
                                    <label for="password">Password</label>
                                    <input id="password" name="password" type="password" placeholder="Password">
                                    <i class="far fa-eye-slash"></i>
			                  @error('password')
                                          <span class="invalid-feedback"  style="color: red;" role="alert">
                                          <p>{{ $message }}<p>
                                          </span>
                                     @enderror
                              </div>

                              <button class="signup-btn" type="submit">LOG IN</button>

                        </form>
                  </div>

            </div>
      </body>
</html>