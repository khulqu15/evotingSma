@extends('layout.frontend')

@section('content')
<div class="container my-5 py-5">
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <img src="{{ asset('img/vector/submited.svg') }}" class="img-respond " alt="">
                </div>
            </div>
            <div class="text-center respond-text">
                <h5 class="text-primary mt-4">Sesi Voting Sudah Habis.</h5>
                <p>Pengumuman akan kami share melalui ig di <a href="https://www.instagram.com/osismpksmanesa/">osismpksmanesa</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
