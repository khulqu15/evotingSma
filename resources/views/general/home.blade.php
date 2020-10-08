@extends('layout.frontend')

@section('content')
<div class="container mt-5 pt-5">
    <div class="text-center  main">
        <h1 class="text-light">E-Voting Calon Ketua Osis</h1>
        <h1 class="text-light">SMA Negeri 1 Purwosari 2020 - 2021</h1>
        <button class="btn btn-white bold px-5 mt-4 py-2" onclick="window.location.href='{{ url('start') }}'">Start Vote</button>
    </div>
</div>
@endsection
