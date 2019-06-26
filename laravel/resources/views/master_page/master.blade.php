<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon"
        href="https://m2fabelio.imgix.net/favicon/stores/1/Fabelio-Lamp-600x600px.jpg" />
    <link rel="shortcut icon" type="image/x-icon"
        href="https://m2fabelio.imgix.net/favicon/stores/1/Fabelio-Lamp-600x600px.jpg" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap Core CSS -->
    {!! Html::style('laravel/vendor/bootstrap/css/bootstrap.min.css') !!}

    <!-- MetisMenu CSS -->
    {!! Html::style('laravel/vendor/metisMenu/metisMenu.min.css') !!}

    <!-- Custom CSS -->
    {!! Html::style('public_html/css/sb-admin-2.css') !!}

    <!-- Custom Fonts -->
    {!! Html::style('laravel/vendor/components/font-awesome/css/fontawesome.min.css') !!}

    <!-- Bootstrap Select -->
    {!! Html::style('laravel/vendor/snapappointments/bootstrap-select/dist/css/bootstrap-select.css') !!}

    <!-- Bootstrap Datepicker -->
    {!! Html::style('laravel/vendor/eternicode/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') !!}

    <!-- Custom CSS -->
    {!! Html::style('public_html/css/styles.css') !!}
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('part.header')
            @include('part.top_menu')
            @include('part.left_menu')
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            {{ csrf_field() }}
            <!-- <div class="container-fluid"> -->
            @yield('content')
            <!-- </div> -->
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    {!! Html::script('laravel/vendor/components/jquery/jquery.min.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('laravel/vendor/bootstrap/js/bootstrap.min.js') !!}

    <!-- Metis Menu Plugin JavaScript -->
    {!! Html::script('laravel/vendor/metisMenu/metisMenu.min.js') !!}

    <!-- Custom Theme JavaScript -->
    {!! Html::script('public_html/js/sb-admin-2.js') !!}

    <!-- Jquery Datatables -->
    {!! Html::script('laravel/vendor/datatables/datatables/media/js/jquery.dataTables.js') !!} {!!
    Html::script('laravel/vendor/datatables/datatables/media/js/dataTables.bootstrap.min.js')
    !!}

    <!-- Custom JS -->
    {!! Html::script('public_html/js/custom/custom.js') !!}

    <script type="text/javascript">
        $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
    });
    var local='{{ URL::to('/') }}';
    </script>

    @yield('customjs')

</body>

</html>