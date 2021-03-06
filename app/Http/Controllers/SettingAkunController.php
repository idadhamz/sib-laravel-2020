<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

use App\User;
use App\Models\petugas;

use Auth;

class SettingAkunController extends Controller
{

    public function index_akun()
    {

        // get data
        $id_role = Auth::user()->id_role;
        $data_akun = User::where('id', Auth::user()->id)->get();

 
        // mengirim data jabatan ke view index
        // return view('pemohon.dataJabatan.index',['jabatan' => $DataJabatan]);
        return view('setting_akun.index', compact('data_akun', 'id_role'));
 
    }

    public function edit_akun($id)
    {
        $data_akun_edit = User::where('id', $id)->get();
        $data_petugas = petugas::where('id_user', $id)->get();
        $name = Auth::user()->name;
        $id_role = Auth::user()->id_role;
        // passing data jabatan yang didapat ke view edit.blade.php
        return view('setting_akun.form', compact('data_akun_edit', 'name', 'id_role', 'data_petugas'));
    }

    public function update_akun(Request $request)
    {

        $rules = [
            'email' => 'required',
            'name' => 'required',
            'password' => 'required|confirmed',
        ];

        $customMessages = [
            'email.required' => 'Email wajib diisi!',
            'name.required' => 'Nama wajib diisi!',
            'password.required' => 'Password wajib diisi!',
         ];

        $this->validate($request, $rules, $customMessages);

        User::where('id', $request->id)->update([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'updated_at' => now()
        ]);

        if($request->id_petugas == null){

            $DataPetugas = new petugas;
            $DataPetugas->id_user = Auth::user()->id;
            $DataPetugas->nip = request('nip');
            $DataPetugas->nama = request('name');
            $DataPetugas->jk = request('jk');
            $DataPetugas->no_telp = request('no_telp');
            $DataPetugas->jabatan = request('jabatan');
            $DataPetugas->created_at = now();
            $DataPetugas->save();

        }elseif($request->id_petugas != null){

            petugas::where('id_petugas', $request->id_petugas)->update([
                'nip' => $request->nip,
                'nama' => $request->name,
                'jk' => $request->jk,
                'no_telp' => $request->no_telp,
                'jabatan' => $request->jabatan,
                'updated_at' => now()
            ]);
            
        }

        return redirect('/setting-akun/index')->with('message_edit', 'Data Berhasil diubah!');
    }

}
