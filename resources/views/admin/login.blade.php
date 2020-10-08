@extends('layout.frontend')

@section('content')
@if (\Session::has('failure'))
<div class="position-fixed w-100 alert text-white alert-danger malert alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!! \Session::get('failure') !!}</strong>
</div>
@endif
<div class="container my-5 py-5">
    <div class="row py-5">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="w-100 border rounded-lg pt-3">
                <h2 class="mb-1 text-primary">Login</h2>
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="holder px-4 py-3">
                        <div class="input-holder w-100">
                            <input class="input py-4 w-100" type="text" required name="email" id="email" placeholder=" ">
                            <div class="placeholder">Email</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <div class="holder py-3 px-4">
                                <div class="input-holder w-100">
                                    <input class="input py-4 w-100" type="password" required name="password" id="password" placeholder=" ">
                                    <div class="placeholder">Password</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 py-2 px-0 text-center">
                            <button type="button" id="togglePassword" class="py-3 w-100 btn btn-white"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <button class="w-100 btn btn-primary rounded-lg btn-lg mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                let x = document.getElementById('password')
                if(x.type == "password") {
                    x.type = "text"
                    $('#togglePassword').addClass('text-primary')
                } else {
                    x.type = "password"
                    $('#togglePassword').removeClass('text-primary')
                }
            })
        })
    </script>
@endsection
