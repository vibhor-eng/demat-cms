        <title>@yield('seo_title')</title>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8">
 
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <base href="{{ url()->current() }}" />


        <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"> -->
<!--            <link rel='shortcut icon' type='image/vnd.microsoft.icon' href="{{ asset('assets/images/fav-icon.jpg') }}"> --> 
         <link rel="stylesheet" href="{{asset ('assets/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{asset ('assets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{asset ('assets/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{asset ('assets/css/font-awesome.min.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{asset ('assets/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{asset ('assets/css/select2-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{asset ('assets/css/datatable.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{asset ('assets/css/style.css') }}">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{asset ('assets/images/favicon.png') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha256-Z8TW+REiUm9zSQMGZH4bfZi52VJgMqETCbPFlGRB1P8=" crossorigin="anonymous" />
  
  
        
          <style>
          /* Make the image fully responsive */

          </style>
        
        @yield('header_library_css')

    <script type="text/javascript" src="{{asset ('assets/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script type="text/javascript" src="{{asset ('assets/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/typeahead.bundle.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script type="text/javascript" src="{{asset ('assets/js/off-canvas.js') }}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/tinymce.js') }}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/misc.js') }}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/settings.js') }}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/todolist.js') }}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/jquery.cookie.js') }}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/chart.umd.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->

    <script type="text/javascript" src="{{asset ('assets/js//file-upload.js') }}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/typeahead.js') }}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery_validate.js') }}" charset="utf-8"></script>
<!-- <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}" charset="utf-8"></script> -->
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}" charset="utf-8"></script>

<script type="text/javascript" src="{{ asset('assets/js/datatable.js') }}" charset="utf-8"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap-datatable.js') }}" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" integrity="sha256-ZvMf9li0M5GGriGUEKn1g6lLwnj5u+ENqCbLM5ItjQ0=" crossorigin="anonymous"></script>
            

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @yield('header_library_js')

