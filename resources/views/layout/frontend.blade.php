<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting</title>
    <link rel="shortcut icon" href="{{ asset('img/fav.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @if (\Session::has('failure'))
    <div class="position-fixed w-100 alert text-white alert-danger malert alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{!! \Session::get('failure') !!}</strong>
    </div>
    @endif
    @if (\Session::has('success'))
    <div class="position-fixed w-100 alert text-white alert-danger malert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{!! \Session::get('success') !!}</strong>
    </div>
    @endif
    <nav class="navbar navbar-expand-sm navbar-light bg-white shadow position-fixed w-100">
        <a class="navbar-brand" href="#">
            <div class="d-flex">
                <img src="{{ asset('img/logo/smanesa.png') }}" width="40px" height="40px" class="mt-2 mx-3" alt="">
                <div class="d-inline-block mt-2" style="font-size: .9rem;">
                    E-VOTING <br> <span class="position-relative" style="top: -5px;">SMANESA</span>
                </div>
            </div>
        </a>
        @if (\Route::current()->getName() == 'index')
            <button onclick="window.location.href = '{{ url('start') }}'" class="ml-auto btn btn-primary my-2 my-sm-0 px-4 py-2" type="submit">Start Vote</button>
        @else
            <button onclick="window.location.href = '{{ route('index') }}'" class="ml-auto btn btn-primary my-2 my-sm-0 px-4 py-2" type="submit">Back to home</button>
        @endif
    </nav>

    @yield('content')


    @if (\Route::current()->getName() == 'index')
    <footer class="p-absolute b-0">
        <div class="mx-4">
            <div class="row pb-3 pl-4">
                <div class="col-md-12 text-white">
                    <img src="img/team.png" width="40px" alt="">
                    @2020 Developed by <a class="text-white" href="https://www.instagram.com/sidescript_dev/">SideScript Developer</a>
                </div>
            </div>
        </div>
    </footer>
    @else
    <div class="container-fluid p-3 pb-5 px-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('img/developer.png') }}" class="mr-2" width="30px" alt="">
                @2020 Developed by <a href="https://www.instagram.com/sidescript_dev/">SideScript Developer</a>
            </div>
        </div>
    </div>
    @endif

</body>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/all.min.js') }}"></script>
<script src="{{ asset('js/fontawesome.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@yield('script')

</html>
