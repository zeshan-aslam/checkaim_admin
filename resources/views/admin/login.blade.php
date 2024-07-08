<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="icon" href="{{ asset('theme/img/avatar1_small.jpg') }}"> --}}
        <link href="{{ asset('theme/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('theme/assets/bootstrap/css/bootstrap-fileupload.css') }}" rel="stylesheet" />
        <link href="{{ asset('theme/assets/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('theme/assets/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('theme/assets/jquery-slimscroll/jquery.slimscroll.min.js') }}" rel="stylesheet" />
        <link href="{{ asset('theme/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
        <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('theme/css/style-responsive.css') }}" rel="stylesheet" />
        <link href="{{ asset('theme/css/style-default.css') }}" rel="stylesheet" />
    </head>
    <body>
        <div class="lock-header">
            <!-- BEGIN LOGO -->
          <h1 class="text-white" style="color:white;font-weight: bold;">
              Check Aim 
			</h1>
            <!-- END LOGO -->
        </div>
        <div class="login-wrap">
            <div class="metro single-size red">
                <div class="locked">
                    <i class="icon-lock"></i>
                    <span>Login</span>
                </div>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="metro double-size green">
               
                    <div class="input-append lock-input">
                        <input type="text"  placeholder="Username" class=" @error('email') is-invalid @enderror" name="email"
                         value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
              
            </div>
            <div class="metro double-size yellow">
                    <div class="input-append lock-input">
                        <input type="password"  placeholder="Password"  class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </div>
       
            </div>
            <div class="metro single-size terques login">
                    <button type="submit" class="btn login-btn">
                        {{ __('Login') }}
                        <i class=" icon-long-arrow-right"></i>
                    </button>
               
            </div>
          </form>
           
        </div>
    </body>
</html>
