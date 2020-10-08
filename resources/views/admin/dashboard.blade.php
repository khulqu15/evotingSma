@extends('layout.backend')

@section('dashboard-nav', 'bg-primary-light')

@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-md-11 offset-md-1 px-md-5 px-2">
                <h4 class="text-gray mt-3">Dashboard</h4>
                <div class="card my-5">
                    <div class="card-body text-center py-3">
                        <h4 class="card-title mb-1">Welcome Back Admin</h4>
                        <p class="card-text"></p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($candidates as $candidate)
                    <div class="col-md-6 px-md-5 px-3 my-md-0 my-3">
                        <div class="rounded-lg overflow-hidden position-relative bg" data-voteId="{{ $candidate->id }}" style="background-image: url({{ asset('img/calon/'.$candidate->foto) }});">
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
                        </div>
                        <div class="position-absolute px-5 py-2 bg-warning rounded-lg" style="top: 0px">
                            Total Suara : {{ count($candidate->voters) }}
                        </div>
                        <div class="noId-vote text-center w-100 position-absolute">
                            <div class="d-inline-block noId text-center text-white font-weight-bold">
                                {{ $candidate->id }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-4 offset-md-2 mt-4">
                        <canvas id="myChart" width="100%" height="70"></canvas>
                    </div>
                    <div class="col-md-4 mt-md-4 mt-2">
                        <div id="vote1_rating" class="w-100">
                            @foreach ($candidates as $candidate)
                            <div class="alert {{ $candidate->id == 1 ? 'alert-danger' : 'alert-primary' }}" role="alert">
                                <strong>{{ $candidate->ketua }}</strong>
                            <p class="mb-0">{{ count($candidate->voters) }} Suara</p>
                            </div>
                            @endforeach
                        </div>
                        <div id="vote2_rating" class="w-100">
                            @foreach ($candidates_desc as $candidate)
                            <div class="alert {{ $candidate->id == 1 ? 'alert-danger' : 'alert-primary' }}" role="alert">
                                <strong>{{ $candidate->ketua }}</strong>
                                <p class="mb-0">{{ count($candidate->voters) }} Suara</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
let voter1 = "{{ count($voters1) }}"
let voter2 = "{{ count($voters2) }}"
var ctx = document.getElementById('myChart').getContext('2d');
if(voter1 >= voter2) {
    $('#vote1_rating').addClass('d-inline-block');
    $('#vote2_rating').addClass('d-none');
} else {
    $('#vote2_rating').addClass('d-inline-block');
    $('#vote1_rating').addClass('d-none');
}
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Candidate1', 'Candidate2'],
        datasets: [{
            label: '# of Votes',
            data: [voter1, voter2],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection
