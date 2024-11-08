<div class="modal fade" id="viewData" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDataTitle">Edit Kategori</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-3">
                    <div class="card-header">
                        Data Pegawai
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" name="nip" id="v-nip" readonly
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="v-nama" readonly
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" id="v-tempat_lahir"
                                        readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" id="v-tanggal_lahir"
                                        value="{{ old('tanggal_lahir') }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Jenis Kelamin</label>
                                    <div class="form-check ps-0">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="v-laki-laki" value="Laki-Laki" readonly disabled>
                                            <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="v-perempuan" value="Perempuan" readonly disabled>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="form-control" id="v-agama" readonly disabled>
                                        <option value="" hidden>Pilih Satu</option>
                                        <option value="Islam">
                                            Islam
                                        </option>
                                        <option value="Kristen">
                                            Kristen
                                        </option>
                                        <option value="Katolik">
                                            Katolik
                                        </option>
                                        <option value="Hindu">
                                            Hindu
                                        </option>
                                        <option value="Buddha">
                                            Buddha
                                        </option>
                                        <option value="Konghucu">
                                            Konghucu
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="v-alamat" rows="3" readonly disabled></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_hp">No Hp</label>
                                    <input type="text" name="no_hp" class="form-control" id="v-no_hp" readonly
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 d-grid">
                                    <label for="pas_foto">Pas Foto</label>
                                    <img src="" id="v-photo" class="img-preview" alt="">
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
                                    <select name="golongan" class="form-control" id="v-golongan" readonly disabled>
                                        <option value="" hidden>Pilih Golongan</option>
                                        <optgroup label="Golongan I (Pangkat: Juru)">
                                            <option value="I/a">I/a: Juru Muda</option>
                                            <option value="I/b">I/b: Juru Muda Tingkat I</option>
                                            <option value="I/c">I/c: Juru</option>
                                            <option value="I/d">I/d: Juru Tingkat I</option>
                                        </optgroup>
                                        <optgroup label="Golongan II (Pangkat: Pengatur)">
                                            <option value="II/a">II/a: Pengatur Muda</option>
                                            <option value="II/b">II/b: Pengatur Muda Tingkat I</option>
                                            <option value="II/c">II/c: Pengatur</option>
                                            <option value="II/d">II/d: Pengatur Tingkat I</option>
                                        </optgroup>
                                        <optgroup label="Golongan III (Pangkat: Penata)">
                                            <option value="III/a">III/a: Penata Muda</option>
                                            <option value="III/b">III/b: Penata Muda Tingkat I</option>
                                            <option value="III/c">III/c: Penata</option>
                                            <option value="III/d">III/d: Penata Tingkat I</option>
                                        </optgroup>
                                        <optgroup label="Golongan IV (Pangkat: Pembina)">
                                            <option value="IV/a">IV/a: Pembina</option>
                                            <option value="IV/b">IV/b: Pembina Tingkat I</option>
                                            <option value="IV/c">IV/c: Pembina Utama Muda</option>
                                            <option value="IV/d">IV/d: Pembina Utama Madya</option>
                                            <option value="IV/e">IV/e: Pembina Utama</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="eselon">Eselon</label>
                                    <select name="eselon" class="form-control" id="v-eselon" readonly disabled>
                                        <option value="" hidden>Pilih Eselon</option>
                                        <option value="I">Eselon I</option>
                                        <option value="II">Eselon II</option>
                                        <option value="III">Eselon III</option>
                                        <option value="IV">Eselon IV</option>
                                        <option value="V">Eselon V</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" id="v-jabatan"
                                        readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tempat_tugas">Tempat Tugas</label>
                                    <input type="text" name="tempat_tugas" class="form-control"
                                        id="v-tempat_tugas" readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="unit_kerja">Unit Kerja</label>
                                    <input type="text" name="unit_kerja" class="form-control" id="v-unit_kerja"
                                        readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="npwp">NPWP</label>
                                    <input type="text" name="npwp" class="form-control" id="v-npwp"
                                        readonly disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
