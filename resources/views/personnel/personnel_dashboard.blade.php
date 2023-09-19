<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Personnel</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/core/core.css')}}">
	<!-- endinject -->
  <!-- plugin css for this page -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->
  <!-- Layout styles -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/demo_1/style.css')}}">
  <!-- End layout styles -->
  <link rel="shortcut icon" type="text/css" href="{{asset('backend/assets/images/dcsi.png')}}" />
  {{-- <link rel="stylesheet" href="https:://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"> --}}

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="sidebar-dark">
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->

		{{--start sidebar--}}
            @include('personnel.body.sidebar')
        {{--end sidebar--}}


  <!--   <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme:</h6>
          <a class="theme-item" href="backend/demo_1/dashboard-one.html">
            <img src="backend/assets/images/screenshots/light.jpg" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme:</h6>
          <a class="theme-item active" href="backend/demo_2/dashboard-one.html">
            <img src="backend/assets/images/screenshots/dark.jpg" alt="light theme">
          </a>
        </div>
      </div>
    </nav> -->
		<!-- partial -->

		<div class="page-wrapper">

			<!-- partial:partials/_navbar.html -->

            {{--start navbar--}}
                @include('personnel.body.header')
            {{--end navbar--}}

			<!-- partial -->

			{{-- start page-content --}}
                @yield('personnel')
            {{-- end page-content --}}

			<!-- partial:partials/_footer.html -->
			{{--start footer--}}
            @include('personnel.body.footer ')

            {{--end footer--}}
			<!-- partial -->

		</div>
	</div>

	<!-- core:js -->
	<script src="{{asset('backend/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{asset('backend/assets/vendors/chartjs/Chart.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/template.js')}}"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
  <script src="{{asset('backend/assets/js/dashboard.js')}}"></script>
  <script src="{{asset('backend/assets/js/datepicker.js')}}"></script>

	<!-- end custom js for this page -->

    {{-- <script type="" src="https:://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- @if (Session::has('message'))
    <script>

        var type = {{ Session::get('alert-type','info')}}
        switch(type){
            case 'info': toastr.info("{{Session::get('message')}}");break;
            case 'success': toastr.success("{{Session::get('message')}}");break;
            case 'warning': toastr.warning("{{Session::get('message')}}");break;
            case 'error': toastr.error("{{Session::get('message')}}");break;

        }

        @endif --}}
    {{-- </script> --}}

    @if (Session::has('success'))
    <script>
        toastr.success("{{Session::get('success')}}")
    </script>

    @endif





</body>
</html>
