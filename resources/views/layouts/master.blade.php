<!DOCTYPE html>
<html>
    <head>
        @yield('stylesheets')
        @include('partials.master._head')
    </head>
    <body class="sb-l-o sb-r-c onload-check mobile-view tray-rescale messages-page">
        <div id="main">
            @include('partials.master._header')
            @include('partials.master._sidebar')
            <section id="content_wrapper">
                @yield('topbar')
                @yield('content')
                @include('partials.master._footer')
            </section>
        </div>
        @include('partials.master._javascript')
        @yield('scripts')
    </body>
</html>
