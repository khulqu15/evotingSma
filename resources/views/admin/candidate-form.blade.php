@extends('layout.backend')

@section('candidates-nav', 'bg-primary-light')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-11 offset-md-1 px-md-5 px-2">
            <h4 class="text-gray mt-3">Create Candidate</h4>
            <a class="btn btn-white border-primary px-5 mt-4 mb-1 mt-5 mx-4 text-primary" href="{{ URL::previous() }}"><i class="fas fa-backspace"></i></a>

            <div class="row mt-3">
                <div class="col-md-8">
                    @if(\Route::current()->getName() == 'candidate.create')
                        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                    @else
                        {{-- <form action="{{ route('admin.update', $me->id) }}" method="POST"> --}}
                    @endif
                        {{ csrf_field() }}
                        <div class="holder px-2 py-3">
                            <div class="input-holder w-100">
                                <input  value="{{ \Route::current()->getName() == 'candidate.create' ? '' : $me->name }}"
                                        class="input py-4 w-100" type="text" required name="ketua" id="ketua" placeholder=" ">
                                <div class="placeholder">Ketua</div>
                            </div>
                        </div>
                        <div class="holder px-2 pt-3 pb-2">
                            <div class="input-holder w-100">
                                <input value="{{ \Route::current()->getName() == 'candidate.create' ? '' : $me->email }}"
                                        class="input py-4 w-100" type="text" required name="kelas_ketua" id="kelas_ketua" placeholder=" ">
                                <div class="placeholder">Kelas Ketua</div>
                                <small class="ml-2 mb-0">contoh: 10 Ips '19</small>
                            </div>
                        </div>
                        <div class="holder px-2 py-3">
                            <div class="input-holder w-100">
                                <input  value="{{ \Route::current()->getName() == 'candidate.create' ? '' : $me->name }}"
                                        class="input py-4 w-100" type="text" required name="wakil" id="wakil" placeholder=" ">
                                <div class="placeholder">Wakil</div>
                            </div>
                        </div>
                        <div class="holder px-2 pt-3 pb-2">
                            <div class="input-holder w-100">
                                <input value="{{ \Route::current()->getName() == 'candidate.create' ? '' : $me->email }}"
                                        class="input py-4 w-100" type="text" required name="kelas_wakil" id="kelas_wakil" placeholder=" ">
                                <div class="placeholder">Kelas Wakil Ketua</div>
                                <small class="ml-2">contoh: 10 Ips '19</small>
                            </div>
                        </div>
                        <div class="holder px-2 pt-3 pb-2">
                            <div class="input-holder w-100">
                                <textarea class="input py-4 w-100" style="height: 150px" placeholder=" " id="visi" name="visi"></textarea>
                                <div class="placeholder">Kelas Wakil Ketua</div>
                            </div>
                        </div>
                        <div class="holder px-2 pt-3 pb-2">
                            <div class="input-holder w-100">
                                <div id="misi-label pb-3">Misi</div>
                                <textarea class="editor" style="height: 100px" placeholder=" " id="misi" name="misi"></textarea>
                            </div>
                        </div>
                        <div class="holder px-2 pt-3 pb-2">
                            <div class="input-holder w-100">
                                <input onchange="loadFile(event)" class="input py-4 w-100" type="file" required name="kelas_wakil" id="kelas_wakil" placeholder=" ">
                                <div class="placeholder">Foto</div>
                                <small class="ml-2">Foto size < 1MB</small>
                            </div>
                        </div>
                        <div class="w-100 text-right pt-5">
                            <button class="btn btn-primary rounded-lg px-5 shadow">
                                {{ \Route::current()->getName() == 'candidate.create' ? 'Create New Admin' : "Update $me->name" }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 text-center">
                    <img class="sticky-top w-100" style="top: 100px" src="{{  asset('img/vector/candidate.svg') }}" id="preview" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        function loadFile(event) {
            var reader = new FileReader()
            reader.onload = function() {
                var preview = document.getElementById('preview')
                preview.src = reader.result
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    })
</script>
@endsection
