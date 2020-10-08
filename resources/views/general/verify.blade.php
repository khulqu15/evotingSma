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
<div class="container py-5 mb-3 mt-4">
    <div class="mt-5 pt-5 mb-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card p-4 pb-5 p-relative">
                    <form action="{{ route('verifikasi.verified', $voter->id) }}" method="POST" class="w-100">
                        {{ csrf_field() }}
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <input type="text" class="input-verify w-100 pl-3" name="code" autofocus placeholder="XXXX" name="" id="">
                            </div>
                        </div>
                        <p class="mt-5 mb-4" style="font-size: 1rem;"> Kami telah mengirimkan kode verifikasi kepada emailmu <br> <span class="text-primary">{{ $voter->email }}</span>, Mohon check kembali emailmu. dan masukkan kode verifikasinya </p>
                        <div class="position-absolute" style="left: 20px; font-size: .85rem; bottom: 30px;">Tidak menerima email ? <a href="">Kirim Ulang</a></div>
                        <button type="submit" class="px-3 py-2 p-absolute btn-verify btn btn-primary px-5">Verifikasi Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
