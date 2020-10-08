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
                <h5 class="mt-4 mb-0">Hai <span id="namaUser" class="text-primary"></span>, Anda sudah voting</h5>
                <p class="">
                    Kami telah merekam kiriman anda. voting ini hanya bisa dilakukan satu kali
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            let id = localStorage.getItem('id_voter')
            $.ajax({
                url: "{{ url('api/voter') }}" + "/" + id,
                type: "GET",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#namaUser').html(data.voter.name)
                }
            })
        })
    </script>
@endsection
