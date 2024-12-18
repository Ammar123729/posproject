<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>

    <!-- Font Icon -->
    <link
        rel="stylesheet"
        href="fonts/material-icon/css/material-design-iconic-font.min.css" />

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure>
                            <img src="images/1.jpg" alt="sing up image" />
                        </figure>
                        <a href="" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <!-- Error Messages -->
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        <!-- Validation Errors -->
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <h2 class="form-title">Login </h2>
                        <form method="POST" action="{{url('loginstore')}}" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input
                                    type="email"
                                    name="email"
                                    id="your_name"
                                    placeholder="Your Store name" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input
                                    type="password"
                                    name="password"
                                    id="your_pass"
                                    placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input
                                    type="checkbox"
                                    name="remember-me"
                                    id="remember-me"
                                    class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input
                                    type="submit"
                                    name="signin"
                                    id="signin"
                                    class="form-submit"
                                    value="Log in" />
                            </div>
                        </form>
                        <!-- <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li>
                                    <a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>