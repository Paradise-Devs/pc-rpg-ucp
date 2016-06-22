<!DOCTYPE html>
<html>
    <head>
        @include('partials.master._head')
        @yield('stylesheets')
    </head>
    <body class="sb-l-o sb-r-c onload-check mobile-view tray-rescale">
        <div id="main">
            @include('partials.master._header')
            @include('partials.master._sidebar')
            <section id="content_wrapper">
                @include('partials.master._topbar')
                <section id="content" class="animated fadeIn">
                    @yield('content')
                </section>
                @include('partials.master._footer')
            </section>
        </div>
        @include('partials.master._javascript')
        @yield('scripts')
    </body>
</html>
