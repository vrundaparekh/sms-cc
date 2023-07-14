<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title> Sms</title>
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/jquery.toast.min.css') }}" />
        <link rel="stylesheet" href="{{asset('assets/css/jquery.toast.min.css')}}" />
         
    {{-- <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

        <!-- End layout styles -->
        <!--    <link rel="shortcut icon" href="" />-->
        <script>
            var token = '{{ csrf_token() }}';
            var url = '{{url("/")}}';
        </script>
    </head>
    <body>
        @yield('content')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ url('assets/js/jquery.toast.min.js') }}"></script>
        <script src="{{ url('assets/js/jquery.validate.min.js') }}"></script>
        @yield('script')
        

    </body>
</html>