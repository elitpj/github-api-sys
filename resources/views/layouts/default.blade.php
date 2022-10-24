<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>

    <style>
        .paging_simple_numbers {
            border: none!important;
        }

        .paginate_button {
            background: transparent!important;
        }
    </style>

    <!--**********************************
            Main wrapper start
        ***********************************-->
    <div id="main-wrapper">
        @yield('content')
        @include('layouts.footer')

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    @yield('styles')
    <!-- Required vendors -->
    <script src="{{ asset('theme-assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('theme-assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('theme-assets/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('theme-assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/deznav-init.js') }}"></script>

    <script src="{{ asset('theme-assets/vendor/jqueryui/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('theme-assets/vendor/moment/moment.min.js') }}"></script>


</body>
</html>

