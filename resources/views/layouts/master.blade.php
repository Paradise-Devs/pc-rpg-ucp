<!DOCTYPE html>
<html>
<head>
    @include('partials._head')
</head>

<body class="dashboard-page">

    <div id="main">

        @include('partials._header')
        @include('partials._sidebar')

        <section id="content_wrapper">

            @include('partials._topbar-dropdown')
            @include('partials._topbar')

            <section id="content" class="table-layout animated fadeIn">

                @yield('content')
                @include('partials._tray-right')

            </section>

            @include('partials._footer')

        </section>

        @include('partials._sidebar-right')

    </div>

    @include('partials._javascript')
    @yield('scripts')

</body>
</html>
