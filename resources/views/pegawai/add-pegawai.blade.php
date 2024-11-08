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
    <style>
        .img-preview {
            width: 150px;
        }
    </style>
    <form action="{{ route('store-pegawai') }}" enctype="multipart/form-data" method="post" class="card pt-3 my-3">
        @csrf
        <div class="card-body">
            <div class="card mb-3">
                <div class="card-header">
                    Data Pegawai
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nip">NIP</label>
                                <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror"
                                    id="nip" maxlength="18" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    value="{{ old('nip') }}">
                                @error('nip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir"
                                    class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                                    value="{{ old('tempat_lahir') }}">
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Jenis Kelamin</label>
                                <div class="form-check ps-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                            type="radio" name="jenis_kelamin" id="laki-laki" value="L"
                                            {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                            type="radio" name="jenis_kelamin" id="perempuan" value="P"
                                            {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                    </div>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="agama">Agama</label>
                                <select name="agama" class="form-control @error('agama') is-invalid @enderror"
                                    id="agama">
                                    <option value="" hidden>Pilih Satu</option>
                                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen
                                    </option>
                                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik
                                    </option>
                                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                    </option>
                                </select>
                                @error('agama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_hp">No Hp</label>
                                <input type="text" name="no_hp"
                                    class="form-control @error('no_hp') is-invalid @enderror" maxlength="13"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    placeholder="Contoh: 081234567890" value="{{ old('no_hp') }}">
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pas_foto">Pas Foto</label>
                                <input type="file" name="photo" onchange="previewImage(this)"
                                    class="form-control @error('photo') is-invalid @enderror" accept="image/*">
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 d-none" id="prevResult">
                            <div class="mb-3 d-grid">
                                <label for="pas_foto">Review Pas Photo</label>
                                <img src="" id="previewPhoto" class="img-preview" alt="Pas Foto">
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Data Pekerjaan
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama">Golongan</label>
                                <select name="golongan" class="form-control @error('golongan') is-invalid @enderror"
                                    id="golongan">
                                    <option value="" hidden>Pilih Golongan</option>
                                    <optgroup label="Golongan I (Pangkat: Juru)">
                                        <option value="I/a" {{ old('golongan') == 'I/a' ? 'selected' : '' }}>I/a: Juru
                                            Muda</option>
                                        <option value="I/b" {{ old('golongan') == 'I/b' ? 'selected' : '' }}>I/b: Juru
                                            Muda Tingkat I</option>
                                        <option value="I/c" {{ old('golongan') == 'I/c' ? 'selected' : '' }}>I/c: Juru
                                        </option>
                                        <option value="I/d" {{ old('golongan') == 'I/d' ? 'selected' : '' }}>I/d: Juru
                                            Tingkat I</option>
                                    </optgroup>
                                    <optgroup label="Golongan II (Pangkat: Pengatur)">
                                        <option value="II/a" {{ old('golongan') == 'II/a' ? 'selected' : '' }}>II/a:
                                            Pengatur Muda</option>
                                        <option value="II/b" {{ old('golongan') == 'II/b' ? 'selected' : '' }}>II/b:
                                            Pengatur Muda Tingkat I</option>
                                        <option value="II/c" {{ old('golongan') == 'II/c' ? 'selected' : '' }}>II/c:
                                            Pengatur</option>
                                        <option value="II/d" {{ old('golongan') == 'II/d' ? 'selected' : '' }}>II/d:
                                            Pengatur Tingkat I</option>
                                    </optgroup>
                                    <optgroup label="Golongan III (Pangkat: Penata)">
                                        <option value="III/a" {{ old('golongan') == 'III/a' ? 'selected' : '' }}>III/a:
                                            Penata Muda</option>
                                        <option value="III/b" {{ old('golongan') == 'III/b' ? 'selected' : '' }}>III/b:
                                            Penata Muda Tingkat I</option>
                                        <option value="III/c" {{ old('golongan') == 'III/c' ? 'selected' : '' }}>III/c:
                                            Penata</option>
                                        <option value="III/d" {{ old('golongan') == 'III/d' ? 'selected' : '' }}>III/d:
                                            Penata Tingkat I</option>
                                    </optgroup>
                                    <optgroup label="Golongan IV (Pangkat: Pembina)">
                                        <option value="IV/a" {{ old('golongan') == 'IV/a' ? 'selected' : '' }}>IV/a:
                                            Pembina</option>
                                        <option value="IV/b" {{ old('golongan') == 'IV/b' ? 'selected' : '' }}>IV/b:
                                            Pembina Tingkat I</option>
                                        <option value="IV/c" {{ old('golongan') == 'IV/c' ? 'selected' : '' }}>IV/c:
                                            Pembina Utama Muda</option>
                                        <option value="IV/d" {{ old('golongan') == 'IV/d' ? 'selected' : '' }}>IV/d:
                                            Pembina Utama Madya</option>
                                        <option value="IV/e" {{ old('golongan') == 'IV/e' ? 'selected' : '' }}>IV/e:
                                            Pembina Utama</option>
                                    </optgroup>
                                </select>
                                @error('golongan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="eselon">Eselon</label>
                                <select name="eselon" class="form-control @error('eselon') is-invalid @enderror"
                                    id="eselon">
                                    <option value="" hidden>Pilih Eselon</option>
                                    <option value="I" {{ old('eselon') == 'I' ? 'selected' : '' }}>Eselon I
                                    </option>
                                    <option value="II" {{ old('eselon') == 'II' ? 'selected' : '' }}>Eselon
                                        II</option>
                                    <option value="III" {{ old('eselon') == 'III' ? 'selected' : '' }}>
                                        Eselon III</option>
                                    <option value="IV" {{ old('eselon') == 'IV' ? 'selected' : '' }}>Eselon
                                        IV</option>
                                    <option value="V" {{ old('eselon') == 'V' ? 'selected' : '' }}>Eselon V
                                    </option>
                                </select>
                                @error('eselon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan"
                                    class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                    value="{{ old('jabatan') }}">
                                @error('jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tempat_tugas">Tempat Tugas</label>
                                <input type="text" name="tempat_tugas"
                                    class="form-control @error('tempat_tugas') is-invalid @enderror" id="tempat_tugas"
                                    value="{{ old('tempat_tugas') }}">
                                @error('tempat_tugas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="unit_kerja">Unit Kerja</label>
                                <input type="text" name="unit_kerja"
                                    class="form-control @error('unit_kerja') is-invalid @enderror" id="unit_kerja"
                                    value="{{ old('unit_kerja') }}">
                                @error('unit_kerja')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="npwp">NPWP</label>
                                <input type="text" name="npwp"
                                    class="form-control @error('npwp') is-invalid @enderror" id="npwp"
                                    value="{{ old('npwp') }}" maxlength="15" pattern="[0-9]*">
                                @error('npwp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer" style="text-align: end;">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
        function previewImage(input) {
            var preview = document.querySelector('#prevResult').classList.remove('d-none');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#previewPhoto').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#table-1').DataTable({
                responsive: true,
            });
        });
    </script>
@endsection
