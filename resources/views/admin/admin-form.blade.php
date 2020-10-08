@extends('layout.backend')

@section('admin-nav', 'bg-primary-light')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-11 offset-md-1 px-md-5 px-2">
            <h4 class="text-gray mt-3">
                {{ \Route::current()->getName() == 'admin.create' ? 'Create New Admin' : "Profile $me->name" }}
            </h4>
            <a class="btn btn-white border-primary px-5 mt-4 mb-1 text-primary" href="{{ URL::previous() }}"><i class="fas fa-backspace"></i></a>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="">
                        <div class="card-body">
                        <h4 class="card-title">{{ $me->name }}</h4>
                            <p class="card-text">{{ $me->email }}</p>
                            @if (\Route::current()->getName() == 'admin.create')
                                <div class="w-100 text-right">
                                    <a href="{{ route('admin.setting') }}" class="btn btn-primary px-4 text-white"><i class="fas fa-cog"></i></a>
                                </div>
                            @else
                                <div class="w-100 text-right">
                                    <a href="{{ route('participant.drop') }}" onclick="return confirm('Yakin ?')" class="btn btn-danger rounded-lg shadow px-4 text-white">Delete All Data</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    @if(\Route::current()->getName() == 'admin.create')
                        <form action="{{ route('admin.store') }}" method="POST">
                    @else
                        <form action="{{ route('admin.update', $me->id) }}" method="POST">
                    @endif
                        {{ csrf_field() }}
                        <div class="holder px-2 py-3">
                            <div class="input-holder w-100">
                                <input  value="{{ \Route::current()->getName() == 'admin.create' ? '' : $me->name }}"
                                        class="input py-4 w-100" type="text" required name="name" id="name" placeholder=" ">
                                <div class="placeholder">Nama</div>
                            </div>
                        </div>
                        <div class="holder px-2 py-3">
                            <div class="input-holder w-100">
                                <input value="{{ \Route::current()->getName() == 'admin.create' ? '' : $me->email }}"
                                        class="input py-4 w-100" type="text" required name="email" id="email" placeholder=" ">
                                <div class="placeholder">Email</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                <div class="holder py-3 px-2">
                                    <div class="input-holder w-100">
                                        <input class="input py-4 w-100" type="password" name="password" id="password" placeholder=" ">
                                        <div class="placeholder">Password</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 py-2 px-0 text-center">
                                <button type="button" id="togglePassword" class="py-3 w-100 btn btn-white"><i class="fas fa-eye"></i></button>
                            </div>
                            @if(\Route::current()->getName() != 'admin.create')
                            <div class="col-9">
                                <div class="holder py-3 px-2">
                                    <div class="input-holder w-100">
                                        <input class="input py-4 w-100" type="password" required name="passwordNew" id="password1" placeholder=" ">
                                        <div class="placeholder">Password Baru</div>
                                        <small class="ml-2">Masukkan password lama bila tidak diganti</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 py-2 px-0 text-center">
                                <button type="button" id="togglePassword1" class="py-3 w-100 btn btn-white"><i class="fas fa-eye"></i></button>
                            </div>
                            @endif

                        </div>
                        <div class="w-100 text-right pt-5">
                            <button class="btn btn-primary rounded-lg px-5 shadow">
                                {{ \Route::current()->getName() == 'admin.create' ? 'Create New Admin' : "Update $me->name" }}
                            </button>
                        </div>
                    </form>
                </div>
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
            $('#togglePassword1').click(function() {
                let y = document.getElementById('password1')
                if(y.type == "password") {
                    y.type = "text"
                    $('#togglePassword1').addClass('text-primary')
                } else {
                    y.type = "password"
                    $('#togglePassword1').removeClass('text-primary')
                }
            })
        })
    </script>
@endsection
