<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>

    <!-- Font Icon -->
    <link
        rel="stylesheet"
        href="fonts/material-icon/css/material-design-iconic-font.min.css" />

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
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
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{route('signup.store')}}" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input
                                    type="number"
                                    name="phone"
                                    id="phone"
                                    placeholder="Your Phone Number" />
                            </div>
                            <div class="form-group">
                                <label for="store"><i class="zmdi zmdi-store"></i></label>
                                <input
                                    type="text"
                                    name="store_name"
                                    id="store"
                                    placeholder="Your Store Name" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input
                                    type="password"
                                    name="password"
                                    id="pass"
                                    placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="re_pass"
                                    placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <label for="date"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input
                                    type="date"
                                    name="date"
                                    id="date"
                                    placeholder="Date" />
                            </div>
                            <div class="form-group">
                                <input
                                    type="checkbox"
                                    name="agree-term"
                                    id="agree-term"
                                    class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in
                                    <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input
                                    type="submit"
                                    name="signup"
                                    id="signup"
                                    class="form-submit"
                                    value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure>
                            <img src="images/3.jpeg" alt="sing up image" style="height: 200px; margin-top:30px" />
                        </figure>
                        <a href="{{route('login')}}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>