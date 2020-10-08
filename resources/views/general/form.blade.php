@extends('layout.frontend')

@section('content')
<div class="px-0 container-fluid bg-form position-absolute" style="background-image: url('img/wall/mesjid.jpg');">
    <div class="overlay-primary py-5 mt-5 overlay-show w-100 h-100"></div>
    <div class="row py-5">
        <div class="col-md-12 py-5 my-5">

        </div>
    </div>
</div>

<div class="container pt-5">
    <div class="row pt-4 mt-5">
        <div class="col-md-8 offset-md-2 py-5 mt-5">
            <div class="w-100 pt-4 mt-5 rounded-lg bg-white shadow">
                <h4 class="px-5">Formulir Pendaftaran Voting</h4>
                <div class="row px-5 py-3">
                    <div class="col-4">
                        <div class="ctr-user w-100 pt-4 pb-3 text-center bg-primary-light rounded" id="siswa-toggle">
                            <img src="img/icon/siswa.png" height="50px" alt="">
                            <h5 class="text-black">Siswa</h5>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="ctr-user w-100 pt-4 pb-3 text-center border rounded" id="guru-toggle">
                            <img src="img/icon/guru.png" height="50px" alt="">
                            <h5 class="text-black">Guru</h5>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="ctr-user w-100 pt-4 pb-3 text-center border rounded" id="lainnya-toggle">
                            <img src="img/icon/lainnya.png" height="50px" alt="">
                            <h5 class="text-black">Lainnya</h5>
                        </div>
                    </div>
                </div>
                <form action="{{ url('user/voting') }}" method="POST" id="siswa-form" class="w-100 d-inline-block">
                    {{ csrf_field() }}
                    <div class="holder px-5 py-2">
                        <div class="input-holder">
                          <input type="hidden" value="Siswa" name="level">
                          <input class="input py-4 w-100" type="text" required name="nis" placeholder=" ">
                          <div class="placeholder">Nis</div>
                        </div>
                    </div>
                    <div class="container px-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="holder py-3">
                                    <div class="input-holder">
                                        <select class="w-100" required name="gender" id="gender">
                                            <option value="L">Mas</option>
                                            <option value="P">Mbak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="holder py-3">
                                    <div class="input-holder">
                                      <input class="input py-4 w-100" required type="text" name="name" placeholder=" ">
                                      <div class="placeholder">Nama</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="holder px-5 py-2">
                        <div class="input-holder">
                          <input class="input py-4 w-100" required type="text" name="email" placeholder=" ">
                          <div class="placeholder">Email</div>
                        </div>
                    </div>
                    <div class="container px-5">
                        <div class="row">
                            <div class="col-6">
                                <div class="holder py-3">
                                    <div class="input-holder">
                                        <select class="w-100" required name="kelas" id="kelas">
                                            <option value=""></option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                      <div class="placeholder">Kelas</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="holder py-3">
                                    <div class="input-holder">
                                        <select class="w-100" required name="jurusan" id="jurusan">
                                            <option value=""></option>
                                            <option value="Mipa">Mipa</option>
                                            <option value="Ips">Ips</option>
                                            <option value="Bahasa">Bahasa</option>
                                        </select>
                                      <div class="placeholder">Jurusan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-100 btn btn-primary btn-lg py-3 rounded-lg mt-4">Submit</button>
                </form>
                <form action="{{ url('user/voting') }}" method="POST" id="guru-form" class="w-100 d-none">
                    {{ csrf_field() }}
                    <div class="holder px-5 py-2">
                        <div class="input-holder">
                          <input type="hidden" value="Guru" name="level">
                          <input class="input py-4 w-100" type="text" name="nip" placeholder=" ">
                          <div class="placeholder">Nip</div>
                        </div>
                    </div>
                    <div class="container px-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="holder py-3">
                                    <div class="input-holder">
                                        <select class="w-100" name="gender" id="gender">
                                            <option value="L">Pak</option>
                                            <option value="P">Bu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="holder py-3">
                                    <div class="input-holder">
                                      <input class="input py-4 w-100" name="name" type="text" placeholder=" ">
                                      <div class="placeholder">Nama</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="holder px-5 py-2">
                        <div class="input-holder">
                          <input class="input py-4 w-100" name="email" type="text" placeholder=" ">
                          <div class="placeholder">Email</div>
                        </div>
                    </div>
                    <div class="holder px-5 py-3">
                        <div class="input-holder">
                            <select class="w-100" name="profesi" id="jurusan">
                                <option value=""></option>
                                <option value="Guru">Guru</option>
                                <option value="TU">TataUsaha</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                          <div class="placeholder">Guru Mapel</div>
                        </div>
                    </div>
                    <button class="w-100 btn btn-primary btn-lg py-3 rounded-lg mt-4">Submit</button>
                </form>
                <form action="{{ url('user/voting') }}" method="POST" id="lainnya-form" class="w-100 d-none">
                    {{ csrf_field() }}
                    <input type="hidden" value="Lainnya" name="level">
                    <div class="container px-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="holder py-3">
                                    <div class="input-holder">
                                        <select class="w-100" name="gender" id="gender">
                                            <option value="L">Laki laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="holder py-3">
                                    <div class="input-holder">
                                        <input type="hidden" value="Lainnya" name="level">
                                        <input class="input py-4 w-100" name="name" type="text" placeholder=" ">
                                        <div class="placeholder">Nama</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="holder px-5 py-2">
                        <div class="input-holder">
                          <input name="email" class="input py-4 w-100" type="text" placeholder=" ">
                          <div class="placeholder">Email</div>
                        </div>
                    </div>
                    <div class="holder px-5 py-2">
                        <div class="input-holder">
                            <select class="w-100" name="profesi" id="profesi">
                                <option value=""></option>
                                <option value="Satpam">Satpam</option>
                                <option value="TKebun">Tukang Kebun</option>
                                <option value="PKantin">Penjual Kantin</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                          <div class="placeholder">Profesi</div>
                        </div>
                    </div>
                    <button class="w-100 btn btn-primary btn-lg py-3 rounded-lg mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        let voter = localStorage.getItem('id_voter')
        if(voter) {
            window.location.href = "{{ url('voted/user') }}"
        }
        $('select').change(function() {
            let value = $(this).val
            if(value !== "") {
                $(this).next('.placeholder').addClass('placeholder-active')
            }
        })
        $('#siswa-toggle').click(function() {
            $(this).addClass('bg-primary-light').removeClass('border')
            $('#guru-toggle').removeClass('bg-primary-light').addClass('border')
            $('#lainnya-toggle').removeClass('bg-primary-light').addClass('border')
            $('#siswa-form').addClass('d-inline-block').removeClass('d-none')
            $('#guru-form').removeClass('d-inline-block').addClass('d-none')
            $('#lainnya-form').removeClass('d-inline-block').addClass('d-none')
        })
        $('#guru-toggle').click(function() {
            $(this).addClass('bg-primary-light').removeClass('border')
            $('#siswa-toggle').removeClass('bg-primary-light').addClass('border')
            $('#lainnya-toggle').removeClass('bg-primary-light').addClass('border')
            $('#guru-form').addClass('d-inline-block').removeClass('d-none')
            $('#siswa-form').removeClass('d-inline-block').addClass('d-none')
            $('#lainnya-form').removeClass('d-inline-block').addClass('d-none')
        })
        $('#lainnya-toggle').click(function() {
            $(this).addClass('bg-primary-light').removeClass('border')
            $('#guru-toggle').removeClass('bg-primary-light').addClass('border')
            $('#siswa-toggle').removeClass('bg-primary-light').addClass('border')
            $('#lainnya-form').addClass('d-inline-block').removeClass('d-none')
            $('#siswa-form').removeClass('d-inline-block').addClass('d-none')
            $('#guru-form').removeClass('d-inline-block').addClass('d-none')
        })
    })
</script>
@endsection
