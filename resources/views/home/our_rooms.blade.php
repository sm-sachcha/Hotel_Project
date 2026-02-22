<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
</head>

<body class="main-layout">

    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader">
            <img src="images/loading.gif" alt="#"/>
        </div>
    </div>
    <!-- end loader -->

    <!-- header -->
    @include('home.header')
    <!-- end header -->

    <!-- our_room -->
    @include('home.room')
    <!-- end our_room -->



    <!-- footer -->
    @include('home.footer')
    <!-- end footer -->

    <!-- ================= JS FILES (ORDER FIXED) ================= -->

    <!-- jQuery FIRST -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- custom -->
    <script src="js/custom.js"></script>

</body>
</html>