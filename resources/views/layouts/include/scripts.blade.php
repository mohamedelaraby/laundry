
<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- jQuery -->



<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/moment/moment.js')}}"></script>

<!-- Rating js-->
<script src="{{URL::asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{URL::asset('assets/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{URL::asset('assets/js/eva-icons.min.js')}}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{URL::asset('assets/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('assets/plugins/side-menu/sidemenu.js')}}"></script>



<script src="{{admin_ui('plugins/jquery/jquery.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{admin_ui('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- DataTables -->
<script src="{{admin_ui('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{admin_ui('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="{{admin_ui('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{admin_ui('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{admin_ui('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{admin_ui('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{admin_ui('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{admin_ui('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{admin_ui('plugins/moment/moment.min.js')}}"></script>
<script src="{{admin_ui('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- DataTables -->
<script src="{{admin_ui('plugins/datatables/jquery.dataTables.js')}} "></script>
<script src="{{admin_ui('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}} "></script>
<script src="{{admin_ui('plugins/datatables-buttons/js/dataTables.buttons.min.js')}} "></script>

<script src="{{url('/vendor/yajra/laravel-datatables-buttons/src/resources/assets/buttons.server-side.js')}} "></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{admin_ui('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{admin_ui('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{admin_ui('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{admin_ui('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{admin_ui('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{admin_ui('dist/js/demo.js')}}"></script>
<script src="{{admin_ui('dist/js/functions.js')}}"></script>
<script src="{{admin_ui('dist/js/script.js')}}"></script>


{{-- <script>
  setTimeout(function() {
     $('.alert').fadeOut('fast');
 }, 3000);
 </script> --}}

<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>

<!-- App scripts -->
@stack('scripts')
