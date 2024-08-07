<!DOCTYPE html>
<html lang="en">

@include('layouts.partial.head')

<body class="bg-gradient-primary">

    @yield('page')
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    @yield('js')
</body>

</html>