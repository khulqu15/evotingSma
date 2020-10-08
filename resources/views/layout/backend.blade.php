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
    <link rel="stylesheet" href="{{ asset('css/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
    <nav class="h-100 position-fixed px-2 aside shadow bg-white" style="z-index: 2000">
        <div class="header p-3 rounded-lg shadow-sm d-flex mt-3">
            <img src="{{ asset('img/fav.png') }}" class="position-relative" style="top: 3px" width="35px" height="35px" alt="">
            <span class="ml-2 info text-primary d-none" style="line-height: 20px"><b>SMANESA</b><br>E-VOTING</span>
        </div>
        <div class="body mt-5">
            <div class="menu-list">
                <div class="p-2 px-3 my-3 list-side rounded-lg w-100 text-center @yield('dashboard-nav')">
                    <a href="{{ url('admin/dashboard') }}" class="normal">
                        <div class="icon text-left d-inline-block" style="width: 20px">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <p class="d-none info mb-0 ml-3">Dashboard</p>
                    </a>
                </div>
                <div class="p-2 px-3 my-3 list-side rounded-lg w-100 text-center @yield('participant-nav')">
                    <a href="{{ url('admin/participant') }}" class="normal">
                        <div class="icon text-left d-inline-block" style="width: 20px">
                            <i class="fas fa-users"></i>
                        </div>
                        <p class="d-none info mb-0 ml-3">Participants</p>
                    </a>
                </div>
                {{-- <div class="p-2 px-3 my-3 list-side rounded-lg w-100 text-center  @yield('candidates-nav')">
                    <a href="{{ url('admin/candidate') }}" class="normal">
                        <div class="icon text-left d-inline-block" style="width: 20px">
                            <i class="fas fa-vote-yea"></i>
                        </div>
                        <p class="d-none info mb-0 ml-3">Candidates</p>
                    </a>
                </div> --}}
                <div class="p-2 px-3 my-3 list-side rounded-lg w-100 text-center @yield('admin-nav')">
                    <a href="{{ url('admin/admin') }}" class="normal">
                        <div class="icon text-left d-inline-block" style="width: 20px">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <p class="d-none info mb-0 ml-3">Admin</p>
                    </a>
                </div>
                <div class="p-2 px-3 my-3 mx-2 list-side rounded-lg position-absolute" style="bottom: 20px; left: 5%; width: 80%">
                    <a href="{{ route('logout') }}" class="normal">
                        <div class="icon text-left d-inline-block" style="width: 20px">
                            <i class="fas fa-door-open"></i>
                        </div>
                        <p class="d-none info mb-0 ml-3">Logout</p>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="overlay-aside overlay-black position-fixed d-none"></div>
    <div class="toggler-nav-md position-fixed p-3 rounded-lg bg-white shadow">
        <i class="fas fa-stream"></i>
    </div>

    @yield('content')

    <div class="container-fluid p-3 pb-5 mt-5 px-5">
        <div class="row">
            <div class="col-md-6 offset-1">
                <img src="{{ asset('img/developer.png') }}" class="mr-2" width="30px" alt="">
                @2020 Developed by <a href="https://www.instagram.com/sidescript_dev/">SideScript Developer</a>
            </div>
        </div>
    </div>

</body>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/all.min.js') }}"></script>
<script src="{{ asset('js/fontawesome.min.js') }}"></script>
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="{{ asset('js/ckeditor.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@yield('script')
<script>
    ClassicEditor
        .create(document.querySelector('.editor'))
        .then(editor => {
            console.log(editor)
        })
        .catch(error => {
            console.log(error)
        })
    $(document).ready(function() {
        $('.aside').mouseover(function() {
            $('.info').removeClass('d-none').addClass('d-inline-block')
            $('.list-side').removeClass('text-center').addClass('text-left')
            $('.overlay-aside').removeClass('d-none')
        })
        $('.aside').mouseleave(function() {
            $('.info').addClass('d-none').removeClass('d-inline-block')
            $('.list-side').addClass('text-center').removeClass('text-left')
            $('.overlay-aside').addClass('d-none')
        })
        $('.toggler-nav-md').click(function() {
            $('.aside').addClass('l-0')
            $('.info').removeClass('d-none').addClass('d-inline-block')
            $('.list-side').removeClass('text-center').addClass('text-left')
            $('.overlay-aside').removeClass('d-none')
        })
        $('.overlay-aside').click(function() {
            $('.info').addClass('d-none').removeClass('d-inline-block')
            $('.list-side').addClass('text-center').removeClass('text-left')
            $('.aside').removeClass('l-0')
            $('.overlay-aside').addClass('d-none')
        })
    })
</script>
</html>
