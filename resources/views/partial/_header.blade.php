
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
           Vsl-Bank | @yield('title')
        </title>
        <meta name="description" content="Marketing Dashboard">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="_token" content="{{ csrf_token() }}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/vendors.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/app.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/fa-solid.css') }}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/backend/assets/img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/backend/assets/img/favicon/favicon-32x32.png') }}">
        <link rel="mask-icon" href="{{ asset('public/backend/assets/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/notifications/toastr/toastr.css') }}">
        <link rel="stylesheet" href="{{ asset('public/backend/assets/cute-alert/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/backend/assets/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('public/backend/assets/css/notifications/toastr/toastr.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/formplugins/select2/select2.bundle.css') }}">



         <link rel="stylesheet" href="{{ asset('public/backend/assets/css/theme_color.css') }}">
        
        @stack('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css ">

        <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">

        <style>
            .panel-toolbar {
                display: none;
            }
            span.required_star {
                font-weight: bold;
                color: red;
            }
        </style>
    </head>