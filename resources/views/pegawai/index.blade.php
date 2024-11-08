@extends('layout.app')
@section('breadcrumb')
    <ol class="breadcrumb my-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a>
        </li>
        <li class="breadcrumb-item active"><span>List User</span>
        </li>
    </ol>
@endsection
@section('content')
    @inject('carbon', 'Carbon\Carbon')
    <style>
        .img-preview {
            width: 150px;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between my-2">
                <h4 class="align-content-center">List Pegawai</h4>
                <a href="{{ route('cetak-pegawai') }}" class="btn btn-primary">Cetak Daftar Pegawai</a>
            </div>
            <div class="table-container">
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-start">NIP</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Lihat Detail</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawais as $key => $data)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td class="text-start">{{ $data->nip }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->tempat_lahir }}</td>
                                <td>{{ $carbon::parse($data->tanggal_lahir)->isoFormat('DD MMMM YYYY') }}</td>
                                <td>{{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $data->agama }}</td>
                                <td>
                                    <a href="javascript:void(0)" class="text-dark" style="text-decoration: none;"
                                        onclick="view('{{ $data->id }}')" data-coreui-toggle="modal"
                                        data-coreui-target="#viewData">
                                        <i class="fa-duotone fa-solid fa-magnifying-glass"></i> Lihat Detail
                                    </a>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <div class="icon">
                                                <i class="fa-duotone fa-solid fa-ellipsis-vertical"></i>
                                            </div>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{ route('edit-pegawai', $data->id) }}"><i
                                                    class="fa-duotone fa-solid fa-pen me-3"></i>Edit</a>
                                            <a class="dropdown-item text-danger" href="#"
                                                onclick="hapus('{{ $data->id }}')"><i
                                                    class="fa-duotone fa-solid fa-trash me-3"></i>Delete </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('pegawai.view')
@endsection
@section('script')
    <script>
        let data = '<?php echo json_encode($pegawais); ?>'
        data = JSON.parse(data)

        function view(id) {
            var usedData = data.find(item => item.id === id)
            console.log(usedData)
            $('#v-nip').val(usedData.nip)
            $('#v-nama').val(usedData.nama)
            $('#v-tempat_lahir').val(usedData.tempat_lahir)
            $('#v-tanggal_lahir').val(usedData.tanggal_lahir)
            if (usedData.jenis_kelamin === 'L') {
                $('#v-laki-laki').prop('checked', true);
            } else if (usedData.jenis_kelamin === 'P') {
                $('#v-perempuan').prop('checked', true);
            }
            $('#v-agama').val(usedData.agama)
            $('#v-alamat').val(usedData.alamat.alamat)
            $('#v-no_hp').val(usedData.alamat.no_hp)
            $('#v-photo').attr('src', 'upload/' + usedData.photo);
            $('#v-golongan').val(usedData.pegawai.golongan)
            $('#v-eselon').val(usedData.pegawai.eselon)
            $('#v-jabatan').val(usedData.pegawai.jabatan)
            $('#v-tempat_tugas').val(usedData.pegawai.tempat_tugas)
            $('#v-unit_kerja').val(usedData.pegawai.unit_kerja)
            $('#v-npwp').val(usedData.pegawai.npwp)
        }

        function hapus(id) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('delete-pegawai') }}',
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            id
                        },
                        success: function(response) {
                            Swal.fire(
                                'Terhapus!',
                                'Data berhasil dihapus.',
                                'success'
                            ).then((result) => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                        }
                    });
                }
            });
        }


        $(document).ready(function() {
            $('#table-1').DataTable({
                responsive: true,
            });
        });
    </script>
@endsection
