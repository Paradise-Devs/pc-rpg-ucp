<!DOCTYPE html>
<html>
    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <title>PC:RPG @yield('title')</title>
        <meta name="keywords" content="RPG Paradise City SAMP SA:MP GTA San Andreas" />
        <meta name="description" content="Paradise City RPG - SA:MP Server">
        <meta name="author" content="Paradise">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="‪#009dc7">

        <!-- Stylesheets -->
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/theme.css') }}">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/custom.css') }}">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ URL::asset('favicon.png') }}">

    </head>
    <body class="error-page sb-l-o sb-r-c onload-check mobile-view tray-rescale">
        <!-- Start: Main -->
        <div class="main-error-page">
            <br />
            <div class="error-page-content">
                @yield('content')
            </div>
        </div>
        <!-- End: Main -->

        <!-- BEGIN: PAGE SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ URL::asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ URL::asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

        <!-- Theme Javascript -->
        <script src="{{ URL::asset('assets/js/utility/utility.js') }}"></script>
        <script src="{{ URL::asset('assets/js/demo/demo.js') }}"></script>
        <script src="{{ URL::asset('assets/js/main.js') }}"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
              "use strict";
              // Init Theme Core
              Core.init();
            });
        </script>
        <!-- END: PAGE SCRIPTS -->
    </body>
</html>
