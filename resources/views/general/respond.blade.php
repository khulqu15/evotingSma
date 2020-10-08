@extends('layout.frontend')

@section('content')
<div class="container my-5 py-5">
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <img src="{{ asset('img/vote.svg') }}" class="img-respond " alt="">
                </div>
            </div>
            <div class="text-center respond-text">
                <p class="mt-4" >Hai
                    <span id="nama" class="text-primary ">{{ $voter->name }}</span><br>
                    Pilihanmu bagus sekali
                </p>
                <h5 class="text-primary ">Terima Kasih atas partisipasinya</h5>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            localStorage.setItem('id_voter', {{ $voter->id }})
        })
    </script>
@endsection
