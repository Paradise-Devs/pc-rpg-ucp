<!DOCTYPE html>
<html>
    <head>
        @include('partials.auth._head')
    </head>
    <body class="external-page sb-l-c sb-r-c">
        <div id="main" class="animated fadeIn">
            <section id="content_wrapper">
                <div id="canvas-wrapper">
                    <canvas id="demo-canvas"></canvas>
                </div>
                <section id="content" class="">
                    @yield('content')
                </section>
            </section>
        </div>
        @include('partials.auth._javascript')
    </body>
</html>
