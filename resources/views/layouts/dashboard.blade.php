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
    <main id="main" class="main">
        <section class="section dashboard">
            @yield('content')
        </section>

    </main><!-- End #main -->
    @include('dashboard._foot')


</body>

</html>
