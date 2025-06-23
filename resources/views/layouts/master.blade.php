<!DOCTYPE html>
   <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
   <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
   <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
   <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

   <head>
    <title> Hospital Feedback Management </title>

      
      @if(Auth::check())
        @include('layouts.blocks.head')
      @else
        @include('layouts.blocks.login_head')
      @endif

       @yield('header_custom_css')

      @yield('header_custom_js')

   </head>

   <body>
  
    @if(Auth::check()) 
     @include('layouts.blocks.header')
  <div class="container-fluid page-body-wrapper">
      @include ('layouts.blocks.navbar')
    @endif

      


      @yield('body_content')

      @if(Auth::check()) 
      @include('layouts.blocks.modal-contents')
  </div>
      @endif



      @yield('footer_custom_js')



   </body>
</html>
