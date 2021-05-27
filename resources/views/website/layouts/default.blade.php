<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.includes.head')
</head>

<body>

@include('website.includes.nav')
@yield('image1')
@yield('Contents')
@yield('image2')
@yield('Contents2')
@include('website.includes.footer')



  <!-- Bootstrap core JavaScript -->
  <!--<script src="vendor/jquery/jquery.min.js"></script>-->
  <!--<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
  <script src="{{asset('website/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  

</body>

</html>
