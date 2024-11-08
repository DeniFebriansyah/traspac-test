<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Pegawai;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nip' => 'required|numeric|min:18|regex:/^[0-9]+$/|not_regex:/[<>]/',
            'nama' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/|not_regex:/[<>]/',
            'tempat_lahir' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/|not_regex:/[<>]/',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:20|regex:/^[a-zA-Z\s]+$/|not_regex:/[<>]/',
            'alamat' => 'required|string|max:255|not_regex:/[<>]/',
            'no_hp' => 'required|numeric|digits_between:10,13|regex:/^[0-9]+$/|not_regex:/[<>]/',
            'golongan' => 'required|string|not_regex:/[<>]/',
            'eselon' => 'required|string|max:10|regex:/^[a-zA-Z0-9\s]+$/|not_regex:/[<>]/',
            'jabatan' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/|not_regex:/[<>]/',
            'tempat_tugas' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/|not_regex:/[<>]/',
            'unit_kerja' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/|not_regex:/[<>]/',
            'npwp' => 'required|numeric|digits:15|regex:/^[0-9]+$/|not_regex:/[<>]/',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nip.required' => 'NIP wajib diisi',
            'nip.numeric' => 'NIP harus berupa angka',
            'nip.min' => 'NIP minimal 18 karakter',
            'nip.regex' => 'NIP hanya boleh berisi angka',
            'nip.not_regex' => 'NIP mengandung karakter yang tidak diizinkan',

            'nama.required' => 'Nama wajib diisi',
            'nama.string' => 'Nama harus berupa teks',
            'nama.max' => 'Nama maksimal 255 karakter',
            'nama.regex' => 'Nama hanya boleh berisi huruf dan spasi',
            'nama.not_regex' => 'Nama mengandung karakter yang tidak diizinkan',

            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tempat_lahir.string' => 'Tempat lahir harus berupa teks',
            'tempat_lahir.max' => 'Tempat lahir maksimal 100 karakter',
            'tempat_lahir.regex' => 'Tempat lahir hanya boleh berisi huruf dan spasi',
            'tempat_lahir.not_regex' => 'Tempat lahir mengandung karakter yang tidak diizinkan',

            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid',

            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
            'jenis_kelamin.in' => 'Jenis kelamin harus L atau P',

            'agama.required' => 'Agama wajib diisi',
            'agama.string' => 'Agama harus berupa teks',
            'agama.max' => 'Agama maksimal 20 karakter',
            'agama.regex' => 'Agama hanya boleh berisi huruf dan spasi',
            'agama.not_regex' => 'Agama mengandung karakter yang tidak diizinkan',

            'alamat.required' => 'Alamat wajib diisi',
            'alamat.string' => 'Alamat harus berupa teks',
            'alamat.max' => 'Alamat maksimal 255 karakter',
            'alamat.not_regex' => 'Alamat mengandung karakter yang tidak diizinkan',

            'no_hp.required' => 'Nomor HP wajib diisi',
            'no_hp.numeric' => 'Nomor HP harus berupa angka',
            'no_hp.digits_between' => 'Nomor HP harus antara 10-13 digit',
            'no_hp.regex' => 'Nomor HP hanya boleh berisi angka',
            'no_hp.not_regex' => 'Nomor HP mengandung karakter yang tidak diizinkan',

            'golongan.required' => 'Golongan wajib diisi',
            'golongan.string' => 'Golongan harus berupa teks',
            'golongan.max' => 'Golongan maksimal 10 karakter',
            'golongan.regex' => 'Golongan hanya boleh berisi huruf, angka dan spasi',
            'golongan.not_regex' => 'Golongan mengandung karakter yang tidak diizinkan',

            'eselon.required' => 'Eselon wajib diisi',
            'eselon.string' => 'Eselon harus berupa teks',
            'eselon.max' => 'Eselon maksimal 10 karakter',
            'eselon.regex' => 'Eselon hanya boleh berisi huruf, angka dan spasi',
            'eselon.not_regex' => 'Eselon mengandung karakter yang tidak diizinkan',

            'jabatan.required' => 'Jabatan wajib diisi',
            'jabatan.string' => 'Jabatan harus berupa teks',
            'jabatan.max' => 'Jabatan maksimal 100 karakter',
            'jabatan.regex' => 'Jabatan hanya boleh berisi huruf dan spasi',
            'jabatan.not_regex' => 'Jabatan mengandung karakter yang tidak diizinkan',

            'tempat_tugas.required' => 'Tempat tugas wajib diisi',
            'tempat_tugas.string' => 'Tempat tugas harus berupa teks',
            'tempat_tugas.max' => 'Tempat tugas maksimal 100 karakter',
            'tempat_tugas.regex' => 'Tempat tugas hanya boleh berisi huruf dan spasi',
            'tempat_tugas.not_regex' => 'Tempat tugas mengandung karakter yang tidak diizinkan',

            'unit_kerja.required' => 'Unit kerja wajib diisi',
            'unit_kerja.string' => 'Unit kerja harus berupa teks',
            'unit_kerja.max' => 'Unit kerja maksimal 100 karakter',
            'unit_kerja.regex' => 'Unit kerja hanya boleh berisi huruf dan spasi',
            'unit_kerja.not_regex' => 'Unit kerja mengandung karakter yang tidak diizinkan',

            'npwp.required' => 'NPWP wajib diisi',
            'npwp.numeric' => 'NPWP harus berupa angka',
            'npwp.digits' => 'NPWP harus 15 digit',
            'npwp.regex' => 'NPWP hanya boleh berisi angka',
            'npwp.not_regex' => 'NPWP mengandung karakter yang tidak diizinkan',

            'photo.required' => 'Foto wajib diisi',
            'photo.image' => 'File harus berupa gambar',
            'photo.mimes' => 'Format foto harus jpeg/png/jpg',
            'photo.max' => 'Ukuran foto maksimal 2MB',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                flash()->addError($error);
            }
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $validatedData = $validator->validated();
        if ($request->file('photo')) {
            $localDriver = Storage::createLocalDriver(['root' => 'upload']);
            $photo = $localDriver->put('photo_pegawai', $request->file('photo'));
            $validatedData['photo'] = $photo;
        }
        $profile = Profile::create([
            'nip'=>$validatedData['nip'],
            'nama'=>ucwords($validatedData['nama']),
            'tempat_lahir'=>ucwords($validatedData['tempat_lahir']),
            'tanggal_lahir'=>$validatedData['tanggal_lahir'],
            'jenis_kelamin'=>$validatedData['jenis_kelamin'],
            'agama'=>$validatedData['agama'],
            'photo' => $validatedData['photo'],
        ]);
        Pegawai::create([
            'nip'=>$profile->nip,
            'golongan'=>$validatedData['golongan'],
            'eselon'=>$validatedData['eselon'],
            'jabatan'=>ucwords($validatedData['jabatan']),
            'tempat_tugas'=>ucwords($validatedData['tempat_tugas']),
            'unit_kerja'=>ucwords($validatedData['unit_kerja']),
            'npwp' => $validatedData['npwp'],
        ]);
        Alamat::create([
            'nip'=>$profile->nip,
            'alamat'=>$validatedData['alamat'],
            'no_hp'=>$validatedData['no_hp'],
        ]);
        flash()->addSuccess('Data Berhasil Disimpan');
        return redirect()->route('pegawai')->with('success','Data Berhasil Disimpan');
    }
    public function update(Request $request, $id){
        $pegawai = Profile::with('pegawai')->with('alamat')->where('id', $id)->first();
        $validator = Validator::make($request->all(), [
            'nip' => 'required|numeric|min:18|regex:/^[0-9]+$/|not_regex:/[<>]/',
            'nama' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/|not_regex:/[<>]/',
            'tempat_lahir' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/|not_regex:/[<>]/',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:20|regex:/^[a-zA-Z\s]+$/|not_regex:/[<>]/',
            'alamat' => 'required|string|max:255|not_regex:/[<>]/',
            'no_hp' => 'required|numeric|digits_between:10,13|regex:/^[0-9]+$/|not_regex:/[<>]/',
            'golongan' => 'required|string|not_regex:/[<>]/',
            'eselon' => 'required|string|max:10|regex:/^[a-zA-Z0-9\s]+$/|not_regex:/[<>]/',
            'jabatan' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/|not_regex:/[<>]/',
            'tempat_tugas' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/|not_regex:/[<>]/',
            'unit_kerja' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/|not_regex:/[<>]/',
            'npwp' => 'required|numeric|digits:15|regex:/^[0-9]+$/|not_regex:/[<>]/',
            'photo'=> 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nip.required' => 'NIP wajib diisi',
            'nip.numeric' => 'NIP harus berupa angka',
            'nip.min' => 'NIP minimal 18 karakter',
            'nip.regex' => 'NIP hanya boleh berisi angka',
            'nip.not_regex' => 'NIP mengandung karakter yang tidak diizinkan',

            'nama.required' => 'Nama wajib diisi',
            'nama.string' => 'Nama harus berupa teks',
            'nama.max' => 'Nama maksimal 255 karakter',
            'nama.regex' => 'Nama hanya boleh berisi huruf dan spasi',
            'nama.not_regex' => 'Nama mengandung karakter yang tidak diizinkan',

            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tempat_lahir.string' => 'Tempat lahir harus berupa teks',
            'tempat_lahir.max' => 'Tempat lahir maksimal 100 karakter',
            'tempat_lahir.regex' => 'Tempat lahir hanya boleh berisi huruf dan spasi',
            'tempat_lahir.not_regex' => 'Tempat lahir mengandung karakter yang tidak diizinkan',

            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid',

            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
            'jenis_kelamin.in' => 'Jenis kelamin harus L atau P',

            'agama.required' => 'Agama wajib diisi',
            'agama.string' => 'Agama harus berupa teks',
            'agama.max' => 'Agama maksimal 20 karakter',
            'agama.regex' => 'Agama hanya boleh berisi huruf dan spasi',
            'agama.not_regex' => 'Agama mengandung karakter yang tidak diizinkan',

            'alamat.required' => 'Alamat wajib diisi',
            'alamat.string' => 'Alamat harus berupa teks',
            'alamat.max' => 'Alamat maksimal 255 karakter',
            'alamat.not_regex' => 'Alamat mengandung karakter yang tidak diizinkan',

            'no_hp.required' => 'Nomor HP wajib diisi',
            'no_hp.numeric' => 'Nomor HP harus berupa angka',
            'no_hp.digits_between' => 'Nomor HP harus antara 10-13 digit',
            'no_hp.regex' => 'Nomor HP hanya boleh berisi angka',
            'no_hp.not_regex' => 'Nomor HP mengandung karakter yang tidak diizinkan',

            'golongan.required' => 'Golongan wajib diisi',
            'golongan.string' => 'Golongan harus berupa teks',
            'golongan.max' => 'Golongan maksimal 10 karakter',
            'golongan.regex' => 'Golongan hanya boleh berisi huruf, angka dan spasi',
            'golongan.not_regex' => 'Golongan mengandung karakter yang tidak diizinkan',

            'eselon.required' => 'Eselon wajib diisi',
            'eselon.string' => 'Eselon harus berupa teks',
            'eselon.max' => 'Eselon maksimal 10 karakter',
            'eselon.regex' => 'Eselon hanya boleh berisi huruf, angka dan spasi',
            'eselon.not_regex' => 'Eselon mengandung karakter yang tidak diizinkan',

            'jabatan.required' => 'Jabatan wajib diisi',
            'jabatan.string' => 'Jabatan harus berupa teks',
            'jabatan.max' => 'Jabatan maksimal 100 karakter',
            'jabatan.regex' => 'Jabatan hanya boleh berisi huruf dan spasi',
            'jabatan.not_regex' => 'Jabatan mengandung karakter yang tidak diizinkan',

            'tempat_tugas.required' => 'Tempat tugas wajib diisi',
            'tempat_tugas.string' => 'Tempat tugas harus berupa teks',
            'tempat_tugas.max' => 'Tempat tugas maksimal 100 karakter',
            'tempat_tugas.regex' => 'Tempat tugas hanya boleh berisi huruf dan spasi',
            'tempat_tugas.not_regex' => 'Tempat tugas mengandung karakter yang tidak diizinkan',

            'unit_kerja.required' => 'Unit kerja wajib diisi',
            'unit_kerja.string' => 'Unit kerja harus berupa teks',
            'unit_kerja.max' => 'Unit kerja maksimal 100 karakter',
            'unit_kerja.regex' => 'Unit kerja hanya boleh berisi huruf dan spasi',
            'unit_kerja.not_regex' => 'Unit kerja mengandung karakter yang tidak diizinkan',

            'npwp.required' => 'NPWP wajib diisi',
            'npwp.numeric' => 'NPWP harus berupa angka',
            'npwp.digits' => 'NPWP harus 15 digit',
            'npwp.regex' => 'NPWP hanya boleh berisi angka',
            'npwp.not_regex' => 'NPWP mengandung karakter yang tidak diizinkan',

            'photo.image' => 'File harus berupa gambar',
            'photo.mimes' => 'Format foto harus jpeg/png/jpg',
            'photo.max' => 'Ukuran foto maksimal 2MB',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                flash()->addError($error);
            }
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $validatedData = $validator->validated();
        if ($request->file('photo')) {
        if(!empty($pegawai->photo)){
            $imagepath = public_path('upload/' . $pegawai->photo);
            if (file_exists($imagepath)) {
                unlink($imagepath);
            }
        }
            $localDriver = Storage::createLocalDriver(['root' => 'upload']);
            $photo = $localDriver->put('photo_pegawai', $request->file('photo'));
            $validatedData['photo'] = $photo;
        }
        $pegawai->update([
            'nama'=>ucwords($validatedData['nama']),
            'tempat_lahir'=>ucwords($validatedData['tempat_lahir']),
            'tanggal_lahir'=>$validatedData['tanggal_lahir'],
            'jenis_kelamin'=>$validatedData['jenis_kelamin'],
            'agama'=>$validatedData['agama'],
            'photo' => $validatedData['photo'],
        ]);
        $pegawai->pegawai->update([
            'golongan'=>$validatedData['golongan'],
            'eselon'=>$validatedData['eselon'],
            'jabatan'=>ucwords($validatedData['jabatan']),
            'tempat_tugas'=>ucwords($validatedData['tempat_tugas']),
            'unit_kerja'=>ucwords($validatedData['unit_kerja']),
            'npwp' => $validatedData['npwp'],
        ]);
        $pegawai->alamat->update([
            'alamat'=>$validatedData['alamat'],
            'no_hp'=>$validatedData['no_hp'],
        ]);        flash()->addSuccess('Data Berhasil Disimpan');
        return redirect()->route('pegawai')->with('success','Data Berhasil Disimpan');
    }
    public function delete(Request $request){
        $pegawai = Profile::find($request->id);
        if (!$pegawai) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
                'data' => NULL
            ], 404);
        }
        if(!empty($pegawai->photo)){
            $imagepath = public_path('upload/' . $pegawai->photo);
            if (file_exists($imagepath)) {
                unlink($imagepath);
            }
        }
        $pegawai->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus',
            'data' => NULL
        ],200);
    }
}