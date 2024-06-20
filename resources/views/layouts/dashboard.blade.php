<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard._head')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('dashboard.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('dashboard.sidebar')
    <!-- End Sidebar-->

    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Wrapper END -->
    @include('dashboard._foot')


</body>

</html>
