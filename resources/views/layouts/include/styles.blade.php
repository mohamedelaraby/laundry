
<!-- Bootstrap CSS -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- Title -->
<title> @yield('title') </title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/sidemenu.css')}}">
@yield('css')



<!--- Style css -->
<link href="{{URL::asset('assets/css-rtl/style.css')}}" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{URL::asset('assets/css-rtl/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{admin_ui('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{admin_ui('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{admin_ui('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{admin_ui('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{admin_ui('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{admin_ui('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- Theme style -->
  @if(app()->getLocale()=='en')
  <link rel="stylesheet" href="{{admin_ui('dist/css/adminlte.min.css')}}">
  @else
  <link rel="stylesheet" href="{{admin_ui('dist/css/rtl/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{admin_ui('dist/css/rtl/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{admin_ui('dist/css/rtl/bootstrap-rtl.min.css')}}">
  <link rel="stylesheet" href="{{admin_ui('dist/css/rtl/custom-style.css')}}">
  <link rel="stylesheet" href="{{admin_ui('dist/css/fonts/font-awesome.min.css')}}">
  @endif
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{admin_ui('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{admin_ui('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{admin_ui('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href=" {{url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&display=swap&subset=arabic,latin-ext" rel="stylesheet">
  {{-- Custom style --}}
  <link rel="stylesheet" href="{{admin_ui('dist/css/style.css')}}">

<style>
  html,body,h1,h2,h3,h4{
    font-family: 'Cairo', sans-serif;
    font-size: 16px;
  }
</style>

