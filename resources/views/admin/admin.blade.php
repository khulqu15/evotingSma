@extends('layout.backend')

@section('admin-nav', 'bg-primary-light')

@section('content')
@if (\Session::has('success'))
<div class="position-fixed w-100 alert text-white alert-danger malert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!! \Session::get('success') !!}</strong>
</div>
@endif
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-11 offset-md-1 px-md-5 px-2">
            <h4 class="text-gray mt-3">Admin</h4>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="">
                        <div class="card-body">
                        <h4 class="card-title">{{ $me->name }}</h4>
                            <p class="card-text">{{ $me->email }}</p>
                            <div class="w-100 text-right">
                                <a href="{{ route('admin.setting') }}" class="btn btn-primary px-4 text-white"><i class="fas fa-cog"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row mb-2">
                        <div class="col-md-7">
                            <h4>Other Admin</h4>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{ route('admin.create') }}" class="btn btn-primary rounded-lg px-5 shadow">Create new</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($other as $oth)
                                <tr>
                                    <td scope="row">{{ $oth->name }}</td>
                                    <td>{{ $oth->email }}</td>
                                    <td>
                                        <form action="{{ route('admin.delete', $oth->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger shadow" onclick="return confirm('Yakin ?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
