<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Permanence</title>
  <link rel="stylesheet" href="{{asset('backend/assets/vendors/core/core.css')}}">

<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js')}}">

<link rel="stylesheet" href="{{ asset('backend/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{asset('backend/assets/vendors/moment/moment.min.js')}}">
<link rel="stylesheet" href="{{asset('backend/assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')}}">
<!-- end plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="{{asset ('backend/assets/css/demo_1/style.css')}}">
<!-- End layout styles -->
<link rel="shortcut icon" type="text/css" href="{{asset('backend/assets/images/dcsic.png')}}" />
<link rel="stylesheet" href="https:://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<link rel="stylesheet" href="{{asset('backend/assets/vendors/select2/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>

<!-- Plugin css for this page -->


<!-- End plugin css for this page -->

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="sidebar-dark">
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->

		{{--start sidebar--}}
            @include('permanencier.body.sidebar')
        {{--end sidebar--}}




		<div class="page-wrapper">

			<!-- partial:partials/_navbar.html -->

            {{--start navbar--}}
                @include('permanencier.body.header')
            {{--end navbar--}}

			<!-- partial -->

			{{-- start page-content --}}
                @yield('permanencier')
            {{-- end page-content --}}

			<!-- partial:partials/_footer.html -->
			{{--start footer--}}
            @include('permanencier.body.footer ')

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
  <script src="{{asset('backend/assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/moment/moment.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/select2/select2.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>


  <script src="{{asset('backend/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->

	<script src="{{asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/template.js')}}"></script>

	<!-- endinject -->
  <!-- custom js for this page -->
  <script src="{{asset('backend/assets/js/dashboard.js')}}"></script>



	<!-- end custom js for this page -->


  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Plugin js for this page -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script src="{{asset('backend/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>

  <script src="{{asset('backend/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('backend/assets/js/data-table.js')}} "></script>
  <script src="{{asset('backend/assets/js/dashboard-dark.js')}}"></script>
  <script src="{{asset('backend/assets/js/code/code.js')}}"></script>
  <script src="{{asset('backend/assets/js/code/validate.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/timepicker.js')}}"></script>
  <script src="{{asset('backend/assets/js/datepicker.js')}}"></script>
  <script src="{{asset('backend/assets/js/bootstrap-maxlength.js')}}"></script>
  <script src="{{asset('backend/assets/js/select2.js')}}"></script>
  <script src="{{asset('backend/assets/js/bootstrap-colorpicker.js')}}"></script>



  <!-- End plugin js for this page -->

  <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;

       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;

       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;

       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break;
    }
    @endif
   </script>

<script>
    // Configurer le format de date et d'heure pour le plugin DateTimePicker
    $('#datetimepickerExample1, #datetimepickerExample2').datetimepicker({
        format: 'HH:mm' // HH:mm affiche uniquement l'heure au format 24 heures
    });
</script>



</body>
</html>
