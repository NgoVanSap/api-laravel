@jquery
@toastr_js
@toastr_render
<script src="{{URL::to('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::to('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::to('assets/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{URL::to('assets/js/pages/dashboard.js')}}"></script>
<script src="{{URL::to('assets/js/mazer.js')}}"></script>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

