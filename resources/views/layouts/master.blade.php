<!DOCTYPE html>
<html>
    <head>
        @include('partials._head')
        @yield('stylesheets')
    </head>
    <body class="sb-l-o sb-r-c onload-check mobile-view tray-rescale">
        <div id="main">
            @include('partials._header')
            @include('partials._sidebar')
            <section id="content_wrapper">
                @include('partials._topbar')
                <section id="content" class="animated fadeIn">
                    @yield('content')
                </section>
                @include('partials._footer')
            </section>
        </div>
        @include('partials._javascript')
        @yield('scripts')
    </body>
</html>
