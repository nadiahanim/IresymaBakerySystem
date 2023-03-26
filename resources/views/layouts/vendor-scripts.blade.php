<!-- JAVASCRIPT -->
<script src="{{ URL::asset('build/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::asset('build/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('build/libs/node-waves/waves.min.js')}}"></script>
<script src="{{ URL::asset('build/libs/parsleyjs/parsley.min.js')}}"></script>
<script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/datepicker/datepicker.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/inputmask/min/inputmask/inputmask.min.js') }}"></script>

@yield('script')

<!-- App js -->
<script src="{{ URL::asset('build/js/app.js')}}"></script>
<script src="{{ URL::asset('build/js/swal.js')}}"></script>

@yield('script-bottom')