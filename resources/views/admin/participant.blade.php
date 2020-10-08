@extends('layout.backend')

@section('participant-nav', 'bg-primary-light')

@section('content')
@if (\Session::has('success'))
<div class="position-fixed w-100 alert text-white alert-danger malert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!! \Session::get('success') !!}</strong>
</div>
@endif
    <div class="container-fluid py-2" style="overflow-x: hidden">
        <div class="row">
            <div class="col-md-11 offset-md-1 px-md-5 px-2">
                <h4 class="text-gray my-3">Participant</h4>
                    <form class="d-inline-block" action="">
                        <input type="hidden" name="level" value="Siswa">
                        <button class="{{ request()->query('level') == 'Siswa' || empty(request()->query('level')) ? 'btn-primary' : 'border-primary btn-white' }} btn px-4 my-2 mb-4 mx-2">Siswa</button>
                    </form>
                    <form class="d-inline-block" action="">
                        <input type="hidden" name="level" value="Guru">
                        <button class="{{ request()->query('level') == 'Guru' ? 'btn-primary' : 'border-primary btn-white' }} btn px-4 my-2 mb-4 mx-2">Guru</button>
                    </form>
                    <form class="d-inline-block" action="">
                        <input type="hidden" name="level" value="Lainnya">
                        <button class="{{ request()->query('level') == 'Lainnya' ? 'btn-primary' : 'border-primary btn-white' }} btn px-4 my-2 mb-4 mx-2">Lainnya</button>
                    </form>
                    <h5 id="filter-toggle" style="cursor: pointer; text-decoration: underline" class="text-primary">Filter</h5>
                    <div style="display: none" id="filter-content">
                        <form action="">
                            <input type="hidden" name="level" value="{{ empty(request()->query('level')) ? 'Siswa' : request()->query('level') }}" value="Siswa">
                            <div class="row px-2">
                                <div class="col-lg-4 col-md-6 px-2">
                                    <div class="holder py-2 pb-3">
                                        <div class="input-holder w-100">
                                            <input class="input py-4 w-100" type="text" name="name" id="name" placeholder=" ">
                                            <div class="placeholder">
                                                {{ (!empty(request()->query('name')) && request()->query('name') !== null) ? request()->query('name') : 'Nama'}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 px-2">
                                    <div class="holder py-2 pb-3">
                                        <div class="input-holder w-100">
                                            <select class="w-100" name="pilihan" id="pilihan">
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                            <div class="placeholder">
                                                {{ (!empty(request()->query('pilihan')) && request()->query('pilihan') !== null) ? request()->query('pilihan') : 'Pilihan voting'}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 px-2">
                                    <div class="holder py-2 pb-3">
                                        <div class="input-holder w-100">
                                            <select class="w-100" name="sorted" id="sorted">
                                                <option value=""></option>
                                                <option value="desc">Terbaru</option>
                                                <option value="asc">Terlama</option>
                                            </select>
                                            <div class="placeholder">Urutan Berdasarkan</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-6 text-right mb-3">
                                    <a class="btn btn-white border-primary px-5" href="{{ route('admin.participant') }}">Reset</a>
                                    <button class="btn btn-primary px-5">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="w-100" style="overflow-x: auto !important">
                        @if (request()->query('level') == "Siswa")
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Email</th>
                                        <th>Vote</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($voters) >= 1)
                                        @foreach ($voters as $voter)
                                        <tr>
                                            <td scope="row">{{ $voter->name }}</td>
                                            <td>{{ $voter->kelas }}</td>
                                            <td>{{ $voter->email }}</td>
                                            <td>{{ $voter->vote_id }}</td>
                                            <td>
                                                <form action="{{ route('participant.delete', $voter->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" onclick="return confirm('Yakin ?')" class="btn btn-danger shadow text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <div class="alert alert-danger mt-2" role="alert">
                                            <strong>Tidak ada data yang ditemukan</strong>
                                        </div>
                                    @endif
                                </tbody>
                            </table>
                            {{ $voters->appends(request()->query())->links() }}
                        @else
                            @if (request()->query('level') == "Guru")
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Profesi</th>
                                        <th>Email</th>
                                        <th>Vote</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($voters) >= 1)
                                        @foreach ($voters as $voter)
                                        <tr>
                                            <td scope="row">{{ $voter->nip }}</td>
                                            <td>{{ $voter->name }}</td>
                                            <td>{{ $voter->profesi }}</td>
                                            <td>{{ $voter->email }}</td>
                                            <td>{{ $voter->vote_id }}</td>
                                            <td>
                                                <form action="{{ route('participant.delete', $voter->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" onclick="return confirm('Yakin ?')" class="btn btn-danger shadow text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <div class="alert alert-danger mt-2" role="alert">
                                            <strong>Tidak ada data yang ditemukan</strong>
                                        </div>
                                    @endif
                                </tbody>
                            </table>
                            {{ $voters->appends(request()->query())->links() }}
                            @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Profesi</th>
                                        <th>Email</th>
                                        <th>Vote</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($voters) >= 1)
                                        @foreach ($voters as $voter)
                                        <tr>
                                            <td scope="row">{{ $voter->name }}</td>
                                            <td>{{ $voter->profesi }}</td>
                                            <td>{{ $voter->email }}</td>
                                            <td>{{ $voter->vote_id }}</td>
                                            <td>
                                                <form action="{{ route('participant.delete', $voter->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" onclick="return confirm('Yakin ?')" class="btn btn-danger shadow text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <div class="alert alert-danger mt-2" role="alert">
                                            <strong>Tidak ada data yang ditemukan</strong>
                                        </div>
                                    @endif
                                </tbody>
                            </table>
                            {{ $voters->appends(request()->query())->links() }}
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#filter-toggle').click(function() {
                $('#filter-content').slideToggle()
            })
        })
    </script>
@endsection
