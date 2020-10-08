@extends('layout.backend')

@section('candidates-nav', 'bg-primary-light')

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
            <h4 class="text-gray mt-3">Candidate</h4>
            <a class="btn btn-primary mt-5 mx-4 text-white px-5 shadow" href="{{ route('candidate.create') }}">
                <i class="fas fa-plus"></i> Create new candidate
            </a>
            <div class="row px-5 mt-3">
                @foreach ($candidates as $candidate)
                    <div class="col-md-4">
                        <div class="card my-3">
                            <img class="card-img-top" src='{{ asset("img/calon/$candidate->foto") }}' alt="">
                            <div class="card-body">
                                <h4 class="card-title">{{ $candidate->ketua }}</h4>
                                <p class="card-text">{{ $candidate->wakil }}</p>
                                <div class="text-right w-100">
                                    <form action="" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('candidate.update', $candidate->id) }}" class="btn btn-primary text-white"><i class="fas fa-pen"></i></a>
                                        <button type="submit" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
