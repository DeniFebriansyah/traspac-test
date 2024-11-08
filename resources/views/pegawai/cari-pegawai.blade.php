@extends('layout.app')
@section('breadcrumb')
    <ol class="breadcrumb my-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a>
        </li>
        <li class="breadcrumb-item active"><span>Cari Pegawai</span>
        </li>
    </ol>
@endsection
@section('content')
    <style>
        .img-preview {
            width: 150px;
        }
    </style>

    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-coreui-toggle="pill" data-coreui-target="#pills-home"
                type="button" role="tab" aria-controls="pills-home" aria-selected="true">Nama Pegawai</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-coreui-toggle="pill" data-coreui-target="#pills-profile"
                type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Unit Kerja</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
            tabindex="0">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form action="" id="search">
                            <p>Cari Berdasarkan NIP</p>
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="nip" id="nip"
                                        placeholder="Masukkan NIP" required maxlength="18"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" pattern="[0-9]{1,18}">
                                </div>
                                <div class="col">
                                    <button type="submit" id="submitBtn" class="btn btn-primary w-100">Cari Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card my-3 d-none" id="result">
                    @include('pegawai.result')
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <div class="container">
                <div class="card my-3">
                    <div class="card-body">
                        <form action="" id="searchUK">
                            <p>Cari Berdasarkan Unit Kerja</p>
                            <div class="row">
                                <div class="col-md-10">
                                    <select name="unit_kerja" id="uk" class="form-control" required>
                                        <option value="" hidden>Pilih Unit Kerja</option>
                                        @foreach ($uk as $item)
                                            <option value="{{ $item->unit_kerja }}">{{ $item->unit_kerja }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <button type="submit" id="submitBtnUK" class="btn btn-primary w-100">Cari
                                        Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-container">
                            <table class="table table-striped" style="width: 100%;" id="table-1">
                                <thead>
                                    <th>No</th>
                                    <th class="text-start">NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Lihat Detail</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pegawai.view')
@endsection
@section('script')
    <script>
        let pegawais = [];

        function view(id) {
            var usedData = pegawais.find(item => item.id === id)
            console.log(usedData);
            console.log(usedData.jabatan);

            $('#v-nip').val(usedData.profile.nip)
            $('#v-nama').val(usedData.profile.nama)
            $('#v-tempat_lahir').val(usedData.profile.tempat_lahir)
            $('#v-tanggal_lahir').val(usedData.profile.tanggal_lahir)
            $('#v-photo').attr('src', 'upload/' + usedData.profile.photo);
            if (usedData.profile.jenis_kelamin === 'L') {
                $('#v-laki-laki').prop('checked', true);
            } else if (usedData.profile.jenis_kelamin === 'P') {
                $('#v-perempuan').prop('checked', true);
            }
            $('#v-agama').val(usedData.profile.agama)
            $('#v-alamat').val(usedData.alamat.alamat)
            $('#v-no_hp').val(usedData.alamat.no_hp)
            $('#v-golongan').val(usedData.golongan)
            $('#v-eselon').val(usedData.eselon)
            $('#v-jabatan').val(usedData.jabatan)
            $('#v-tempat_tugas').val(usedData.tempat_tugas)
            $('#v-unit_kerja').val(usedData.unit_kerja)
            $('#v-npwp').val(usedData.npwp)
        }
        $(document).ready(function() {

            let table = $('#table-1').DataTable();
            $('#search').on('submit', function(e) {
                e.preventDefault();
                let nip = $('#nip').val();
                $.ajax({
                    url: 'cari-pegawai',
                    data: {
                        nip: nip
                    },
                    type: 'GET',
                    beforeSend: function() {
                        $('#submitBtn').prop('disabled', true).html(
                            '<i class="fas fa-spinner fa-spin me-2"></i> Loading...'
                        );
                    },
                    success: function(response) {
                        $('#result').removeClass('d-none');
                        $('#submitBtn').prop('disabled', false).html('Cari Data');
                        let data = response.data;
                        $('#vr-nip').val(data.nip)
                        $('#vr-nama').val(data.nama)
                        $('#vr-tempat_lahir').val(data.tempat_lahir)
                        $('#vr-tanggal_lahir').val(data.tanggal_lahir)
                        if (data.jenis_kelamin === 'L') {
                            $('#vr-laki-laki').prop('checked', true);
                        } else if (data.jenis_kelamin === 'P') {
                            $('#vr-perempuan').prop('checked', true);
                        }
                        $('#vr-agama').val(data.agama)
                        $('#vr-alamat').val(data.alamat.alamat)
                        $('#vr-no_hp').val(data.alamat.no_hp)
                        $('#vr-photo').attr('src', 'upload/' + data.photo);
                        $('#vr-golongan').val(data.pegawai.golongan)
                        $('#vr-eselon').val(data.pegawai.eselon)
                        $('#vr-jabatan').val(data.pegawai.jabatan)
                        $('#vr-tempat_tugas').val(data.pegawai.tempat_tugas)
                        $('#vr-unit_kerja').val(data.pegawai.unit_kerja)
                        $('#vr-npwp').val(data.pegawai.npwp)
                    },
                    error: function(xhr) {
                        $('#submitBtn').prop('disabled', false).html('Cari Data');
                        $('#result').addClass('d-none');
                        Swal.fire({
                            title: xhr.responseJSON.message,
                            icon: "error"
                        });
                    }
                });
            });
            $('#searchUK').on('submit', function(e) {
                e.preventDefault();
                let uk = $('#uk').val();
                $.ajax({
                    url: 'unit-kerja',
                    data: {
                        unit_kerja: uk
                    },
                    type: 'GET',
                    beforeSend: function() {
                        $('#submitBtnUK').prop('disabled', true).html(
                            '<i class="fas fa-spinner fa-spin me-2"></i> Loading...'
                        );
                    },
                    success: function(response) {
                        $('#submitBtnUK').prop('disabled', false).html('Cari Data');

                        if (response.success) {
                            pegawais = response.data; // Simpan data respons di variabel global
                            table.clear().draw();

                            $.each(pegawais, function(index, item) {
                                table.row.add([
                                    index + 1,
                                    item.nip,
                                    item.profile.nama,
                                    item.jabatan,
                                    `<a href="javascript:void(0)" class="text-dark"
                                style="text-decoration: none;" onclick="view('${item.id}')"
                                data-coreui-toggle="modal" data-coreui-target="#viewData">
                                <i class="fa-duotone fa-solid fa-magnifying-glass"></i> Lihat Detail
                             </a>`
                                ]).draw(false);
                            });
                        } else {
                            $('#result').addClass('d-none');
                            Swal.fire({
                                title: response.message,
                                icon: "error"
                            });
                        }
                    },
                    error: function(xhr) {
                        $('#submitBtn').prop('disabled', false).html('Cari Data');
                        $('#result').addClass('d-none');
                        Swal.fire({
                            title: xhr.responseJSON.message,
                            icon: "error"
                        });
                    }
                });
            });
        });
    </script>
@endsection
