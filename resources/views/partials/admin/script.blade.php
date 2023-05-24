<!-- JAVASCRIPT -->
{{--<script src="{{asset('libs/jquery/jquery.min.js')}}"></script>--}}
<script src="{{asset('libs/jquery/jquery-3.6.4.min.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('js/admin/pages/custom-form-validation.js')}}"></script>

<script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('libs/node-waves/waves.min.js')}}"></script>

<!-- apexcharts -->
<script src="{{asset('libs/apexcharts/apexcharts.min.js')}}"></script>
<!-- Required datatable js -->
<script src="{{asset('libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<!-- Buttons examples -->
<script src="{{asset('libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Responsive examples -->
<script src="{{asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{asset('js/admin/pages/datatables.init.js')}}"></script>

<!-- dashboard init -->
<script src="{{asset('js/admin/pages/dashboard.init.js')}}"></script>

<!-- Summernote js -->
<script src="{{ asset('libs/summernote/summernote-bs4.min.js') }}"></script>

<!-- init js -->
<script src="{{asset('js/admin/pages/form-editor.init.js')}}"></script>

<!-- App js -->
<script src="{{ asset('/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('/js/admin//pages/form-validation.init.js') }}"></script>
<script src="{{asset('js/admin/app.js')}}"></script>

<script src="{{ asset('js/admin/pages/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/admin/pages/toastr.min.js') }}"></script>
<script src="{{ asset('js/admin/pages/ajax-request.js') }}"></script>

<script>
    $(document).ready(function () {$("#datatable").DataTable()});
    @if(Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
         var type = "{{ Session::get('alert-type', 'info') }}";
         switch (type){
             case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;

             case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
                 break;

             case 'success':
                 toastr.success("{{ Session::get('message') }}");
                 break;
             case 'error':
                 toastr.error("{{ Session::get('message') }}");
                 break
         }
    @endif
</script>




