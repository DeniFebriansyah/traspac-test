<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginForm(){
        return view('login');
    }
    public function auth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'required|regex:/^[a-zA-Z0-9\s\-\_\.\@\!\#\$\%\^\&\*\(\)]+$/',
        ], [
            'nip.required' => 'NIP harus diisi.',
            'nip.regex' => 'NIP hanya boleh berisi huruf dan angka.',
            'password.required' => 'Password harus diisi.',
            'password.regex' => 'Password mengandung karakter yang tidak diizinkan.',
        ]);

        if ($validator->fails()) {
            foreach($validator->errors()->all() as $error) {
                flash()->addError($error);
            }
            return redirect()->back()->withInput();
        }
        $credentials = $validator->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            flash('Berhasil Login Users');
            return redirect('/');
        }
        flash()->addError('Gagal Login');
        return back()->withErrors([
            'nip' => 'Data Tidak Sesuai',
        ])->onlyInput('nip');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}