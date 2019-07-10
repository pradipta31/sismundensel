<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="20x20" href="images/.png">
    <title>Login| Sistem Informasi Imunisasi Anak</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="{{asset('backend/css/lib/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/helper.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
</head>
<body class="fix-header fix-sidebar">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
		<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                             <img src="{{asset('backend/images/pus.png')}}">
                            <div class="login-form">
                                <h4>LOGIN</h4>
                                @if($errors->has('email'))
                                <span class="invalid-feedback">
                                  
                                    <strong> Email atau Password Salah</strong>
                                </span>
                                @endif
                                <form action="{{url('/login')}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Email address</label>
                                    <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="Email" value ="{{old('email') }}" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control{{$errors->has('password') ? 'is-invalid' : ''}} "  placeholder="Password" value ="{{old('password') }}" name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"><i class="fa fa-sign-in"></i> Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('backend/js/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('backend/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('backend/js/lib/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('backend/js/custom.min.js')}}"></script>
</body>

</html>