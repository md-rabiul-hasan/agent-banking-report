<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            vsl-bank | login
        </title>
        <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/vendors.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/app.bundle.css') }}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/backend/assets/img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/backend/assets/img/favicon/favicon-32x32.png') }}">
        <link rel="mask-icon" href="{{ asset('public/backend/assets/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
        <!-- Optional: page related CSS-->
        <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/fa-brands.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/fa-solid.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/custom.css') }}">

      <link rel="stylesheet" href="{{ asset('public/backend/assets/css/theme_color.css') }}">
      <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">
      <style>
            ul{
                font-size: 16px;
            }
      </style>
    </head>
    <body>
        <div class="page-wrapper">
            <div class="page-inner bg-brand-gradient">
                <div class="page-content-wrapper bg-transparent m-0">
                    <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                        <div class="d-flex align-items-center container p-0">
                            <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                                <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                                    <img src="{{ asset('public/backend/assets/img/logo.png') }}" alt="SmartAdmin WebApp" aria-roledescription="logo">
                                    <span class="page-logo-text mr-1">VSL Bank</span>
                                </a>
                            </div>
                            <a href="page_register.html" class="ml-auto">
                                Venture Solution Limited
                            </a>
                        </div>
                    </div>
                    <div class="flex-1" style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                        <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                            <div class="row">
                                <div class="col col-md-6 col-lg-7 hidden-sm-down">
                                    <h2 class="fs-xxl fw-500 mt-4 text-white">
                                        VSL-BANK (Agent Banking Solution)
                                        <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">
                                            <ul>
                                                <li>Interface with Temenos CBS/Visa/Master/NPSB/SWIFT/ETC..</li>
                                                <li>Highly scalable and real-time System</li>
                                                <li>High Volume Transaction Processing</li>
                                                <li>Low latency transaction processing</li>
                                                <li>Biometric Authentication</li>
                                                <li>Magnetic Card Support</li>
                                                <li>Smartcard (Chip card) Support</li>
                                                <li>Two/Multi Factor Authentication</li>
                                                <li>SMS notification</li>
                                                <li>Email notification</li>
                                                <li>User/Access Management</li>
                                                <li>Charting, Graphing, Analytical</li>
                                                <li>Payments/Collection</li>
                                                <li>Batch/ETL Module</li>
                                                <li>Data conversion/Migration</li>
                                                <li>Cash Management</li>
                                                <li>Agent Management</li>
                                            </ul>
                                        </small>
                                    </h2>
                                   
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                                    <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
                                        Secure login
                                    </h1>
                                    <div class="card p-4 rounded-plus bg-faded">
                                        @if(Session::get('errors') || count( $errors ) > 0)
                                            @foreach ($errors->all() as $error)
                                                <span style="color: red; font-weight:bold; font-size:12px;"><strong>{{ $error }}</strong></span>
                                                <hr>
                                            @endforeach
                                        @endif
                                        <form id="login-form" name="login-form" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label" for="user_loging_id">Mobile Number</label>
                                                <input type="text" autocomplete="off" id="user_login_id" name="user_login_id" class="form-control form-control-lg" placeholder="017XXXXXXXX" required>                                              
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" autocomplete="off" id="password" name="password" class="form-control form-control-lg" placeholder="password"  required>                                               
                                            </div>
                                            <div class="row no-gutters">
                                                <div class="col-lg-6 pr-lg-1 my-2">
                                                    <button type="reset" class="btn btn-info btn-block btn-lg">Reset &nbsp;<i class="fas fa-sync-alt"></i></button>
                                                </div>
                                                <div class="col-lg-6 pl-lg-1 my-2">
                                                    <button id="js-login-btn" type="submit" class="btn btn-danger btn-block btn-lg">Login &nbsp;<i class="far fa-sign-in-alt"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                                2021 - {{ date('Y') }} © VSL-BANK by&nbsp;<a href='https://www.gotbootstrap.com' class='text-white  fw-500' title='gotbootstrap.com' target='_blank'>venturenxt.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('public/backend/assets/js/vendors.bundle.js') }}"></script>
        <script src="{{ asset('public/backend/assets/js/app.bundle.js') }}"></script>
        <script src="{{ asset('public/backend/assets/js/formplugins/validator/validate.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/js/validator/formplugins/additional-method.min.js') }}"></script>
        <script>

        // nid image upload form validation
        $(function() {

            $.validator.setDefaults({
                errorClass: 'help-block',
                highlight: function(element) {
                    $(element)
                        .closest('.form-group')
                        .addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element)
                        .closest('.form-group')
                        .removeClass('has-error');
                }
            });

            $.validator.addMethod('phone_no_validation', function(value) {
                return /\b(88)?01[3-9][\d]{8}\b/.test(value);
            }, 'Please enter valid mobile number');




            $("#login-form").validate({
                rules: {
                    user_login_id: {
                        required           : true,
                        phone_no_validation: true,
                    },
                    password: {
                        required : true,
                        minlength: 6
                    },
                },
                messages: {
                    user_login_id: {
                        required           : 'please enter your mobile number',
                        phone_no_validation: 'invalid mobile no'
                    },
                    password: {
                        required : "please enter your password",
                        minlength: 'password al-least 6 caracter/word'
                    }
                },
            });

        });
        </script>
    </body>
</html>
