<!DOCTYPE html>
<html>
<head>
    @include('partials._head')
</head>

<body class="dashboard-page">
    <!-- Start: Main -->
    <div id="main">
        <!-- Start: Header -->
        @include('partials._header')
        <!-- End: Header -->

        <!-- Start: Sidebar -->
        @include('partials._sidebar')
        <!-- End: Sidebar Left -->

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">
            <!-- Start: Topbar-Dropdown -->
            @include('partials._topbar-dropdown')
            <!-- End: Topbar-Dropdown -->

            <!-- Start: Topbar -->
            @include('partials._topbar')
            <!-- End: Topbar -->

            <!-- Begin: Content -->
            <section id="content" class="table-layout animated fadeIn">

            @yield('content')

            <!-- begin: .tray-right -->
            @include('partials._tray-right')
            <!-- end: .tray-right -->
            </section>
            <!-- End: Content -->

            <!-- Begin: Page Footer -->
            @include('partials._footer')
            <!-- End: Page Footer -->
        </section>
        <!-- End: Content-Wrapper -->

        <!-- Start: Right Sidebar -->
        @include('partials._sidebar-right')
        <!-- End: Right Sidebar -->
    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->
    @include('partials._javascript')

    @yield('scripts')
    <!-- END: PAGE SCRIPTS -->
</body>
</html>
