<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $data = new \stdClass();
        $data->total_profile = Profile::count();
        return view('index', compact('data'));
    }
    public function pegawai(){
        $pegawais = Profile::with('pegawai')->with('alamat')->get();
        return view('pegawai.index', compact('pegawais'));
    }
    public function addPegawai(){
        return view('pegawai.add-pegawai');
    }
    public function editPegawai($id){
        $pegawai = Profile::with('pegawai')->with('alamat')->where('id', $id)->first();
        return view('pegawai.edit-pegawai', compact('pegawai'));
    }
    public function user(){
        $user = User::get();
        return view('user', compact('user'));
    }
    public function cariPegawai(Request $request){
        if($request->ajax()){
            $request->validate([
                'nip' => 'required|regex:/^[a-zA-Z0-9]+$/|not_regex:/[<>\/&;]/',
            ], [
                'nip.required' => 'NIP harus diisi.',
                'nip.regex' => 'NIP hanya boleh berisi huruf dan angka.',
                'nip.not_regex' => 'NIP tidak boleh mengandung karakter khusus.',
            ]);
            $data = Profile::where('nip', $request->nip)->with('pegawai', 'alamat')->first();
            if(!$data){
                return response()->json([
                    'success' => false,
                    'message' => 'NIP Tidak Ditemukan'
                ], 404);
            }
            return response()->json([
                'success' => true,
                'message' => 'NIP Ditemukan',
                'data' => $data,
            ]);
        }
        $uk = Pegawai::select('id', 'unit_kerja')->get()->unique('unit_kerja');
        return view('pegawai.cari-pegawai', compact('uk'));
    }
    public function unitKerja(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'unit_kerja' => 'required|exists:pegawais,unit_kerja|not_regex:/[<>\/&;]/',
            ], [
                'unit_kerja.required' => 'Unit Kerja harus diisi.',
                'unit_kerja.exists' => 'Unit Kerja tidak ditemukan.',
                'unit_kerja.not_regex' => 'Unit Kerja tidak boleh mengandung karakter khusus.',
            ]);
            $data = Pegawai::where('unit_kerja', $request->unit_kerja)->with('profile','alamat')->get();
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unit Kerja Tidak Ditemukan'
                ], 404);
            }
            return response()->json([
                'success' => true,
                'message' => 'Unit Kerja Ditemukan',
                'data' => $data,
            ]);
        }
    }
    public function cetakPegawai(Request $request){
        $pegawai = Profile::with('pegawai')->with('alamat')->get();
        $pdf = PDF::loadView('pegawai.cetak-pegawai', compact('pegawai'))->setPaper('a4', 'landscape');
        return $pdf->stream('data-pegawai.pdf');
        // return view('pegawai.cetak-pegawai', compact('pegawai'));
    }
}