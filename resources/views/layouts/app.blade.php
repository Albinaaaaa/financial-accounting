<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
@include('layouts.header.header')

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
{{--    @include('layouts.navigation')--}}
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
{{--            @include('layouts.header')--}}
            <!-- End of Topbar -->



            <!-- Begin Page Content -->
            @yield('main-content')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
@include('layouts.footer')

</body>

</html>
