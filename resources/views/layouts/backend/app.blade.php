<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Security-Policy"
          content="script-src 'self' cdn.datatables.net cdnjs.cloudflare.com code.jquery.com stackpath.bootstrapcdn.com 'unsafe-inline';">
    <?php header('X-Frame-Options: DENY'); ?>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{asset('assets/admin/main.d810cf0ae7f39f28f336.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/admin/datatable/css/dataTables.bootstrap4.min.css')}}">
    <link href="{{asset('assets/admin/select/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/dropify/dropify.min.css')}}" rel="stylesheet">

    <style>
        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }

        .vertical-nav-menu ul > li > a {
            color: #6c757d;
            height: 2rem;
            line-height: 2rem;
            padding: 0 1.5rem 0;
            text-transform: lowercase;
            font-size: 16px;
        }

        .vertical-nav-menu ul > li > a:first-letter {
            text-transform: uppercase;
        }

        .scrollbar-sidebar {
            overflow-y: scroll;
            height: auto;
        }

        .nav-link .nav-link-icon {
            color: #3f6ad8;
            font-size: 1rem;
            width: 30px;
            text-align: center;
            opacity: .45;
            margin-left: 81px;
        }
    </style>
    @stack('css')
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    @include('backend.partials.header')
    <div class="app-main">
        @include('backend.partials.sidebar')
        <div class="app-main__outer">
            <div class="app-main__inner">
                @yield('content')
            </div>
            @include('backend.partials.footer')
        </div>
    </div>
</div>

<div class="modal right fade" id="showDetaildModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" id="modalSize" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showDetaildModalTile"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="showDetaildModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('assets/admin/assets/scripts/main.d810cf0ae7f39f28f336.js')}}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{asset('assets/admin/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/admin/datatable/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/admin/select/select2.min.js')}}"></script>
<script src="{{asset('assets/admin/dropify/dropify.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
        $('.dropify').dropify();
    });
</script>
@include('sweetalert::alert')
@stack('js')
</body>
</html>
