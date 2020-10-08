@extends('layout.frontend')

@section('content')
<div class="container-fluid position-relative pb-5" style="overflow-x: hidden !important;">
    <img src="{{ asset('img/vector/batik.png') }}" style="top: -100px; left: 0;" class="position-absolute w-100" alt="">
     <div class="container position-relative">
        <div class="row py-5 mt-5">
            <div class="col-md-12 text-center py-4 mb-3">
                <h2 class="mb-0 mt-4">Hai <span class="text-primary">{{ $voter->name }}</span>, <br> Pilih Ketua Osis Pilihanmu</h2>
                <p>Dengan cara tab 2kali gambar calon pilihanmu</p>
            </div>
        </div>
        <div class="row">
            @foreach ($candidates as $candidate)
            <div class="col-md-6 px-md-5 px-0 my-md-0 my-3">
                <div class="img-vote position-relative" data-voteId="{{ $candidate->id }}" style="background-image: url({{ asset('img/calon/'.$candidate->foto) }});">
                    <div class="overlay-primary position-relative text-center">
                        <i class="fas fa-check text-white check-voting" id="id_check" style="font-size: 5rem;"></i>
                    </div>
                </div>
                <div class="position-relative py-2 text-center">
                    <div class="ketua pb-1">
                        <p class="mb-0 text-gray">Ketua</p>
                        <h4>{{ $candidate->ketua }} ( {{ $candidate->kelas_ketua }} )</h4>
                    </div>
                    <div class="wakil-ketua pb-3">
                        <p class="mb-0 text-gray">Wakil Ketua</p>
                        <h4>{{ $candidate->wakil }} ( {{ $candidate->kelas_wakil }} )</h4>
                    </div>
                    <button data-voteId="{{ $candidate->id }}" class="btn btn-primary px-5 btn-visi">Lihat Visi Misi</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container pb-5 pt-4" id="form-voting">
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <form action='{{ url("voting/send/$voter->id/".str_replace(' ', '_', "$voter->name")) }}' method="POST">
                {{ csrf_field() }}
                <input type="hidden" required id="id_voting" name="vote" class="form-control">
                <button id="submit_voting" type="submit" class="btn btn-primary btn-lg px-5 w-75 btn-disabled" onclick="window.location.href='respond.html'" disabled>Voting</button>
            </form>
        </div>
    </div>
</div>

<div class="overlay-black w-100 h-100 position-absolute" id="visi-misi" style="overflow-y: auto;">
    <i class="fas fa-times position-absolute text-white" style="font-size: 2rem;" id="closable-visi-misi"></i>
    <div class="container py-5 text-white">
        <div class="row py-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 border-bottom">
                        <h4>Visi</h4>
                    </div>
                </div>
                <div id="visi-text" class="pt-2 pb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, laboriosam inventore deleniti, maxime, dolorem placeat unde praesentium quos odio dolorum quisquam repudiandae incidunt asperiores iste consectetur veritatis tenetur ea temporibus esse omnis harum officiis. Voluptatum eligendi delectus autem illo. Iste!</div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 border-bottom">
                        <h4>Misi</h4>
                    </div>
                </div>
                <div id="misi-text">
                    <ol class="pt-2 pb-5 pl-4">
                        <li>Meningkatkan karakter siswa - siswi SMAN 1 Purwosari beriman serta taat kepada tuhan yang maha esa</li>
                        <li>Mengembangkan rasa kekeluargaan dalam nasionalisme</li>
                        <li>Meningkatkan kreatifitas siswa - siswi dalam berbahasa </li>
                        <li>Menumbuhkan rasa peduli lingkungan kepada siswa - siswi SMAN 1 Purwosari</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.btn-visi').click(function() {
                let id = $(this).attr('data-voteId')
                $.ajax({
                    url: "{{ url('api/visiMisi') }}" + "/" + id,
                    type: "GET",
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data)
                        $('#visi-text').html(data.candidate.visi)
                        $('#misi-text').html(data.candidate.misi)
                    }
                })
            })
        })
    </script>
@endsection
