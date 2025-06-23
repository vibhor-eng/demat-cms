  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    
   
    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />   

    <script src="{{asset('assets/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script type="text/javascript" src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/misc.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/settings.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/todolist.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.cookie.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery_validate.js') }}" charset="utf-8"></script>         

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @yield('header_library_js')

