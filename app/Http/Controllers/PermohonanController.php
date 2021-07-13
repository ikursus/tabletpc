<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermohonanController extends Controller
{
    public function senarai()
    {
        // Dapatkan data daripada table permohonan
        // $senaraiPermohonan = DB::table('permohonan')->get();
        // Fungsi Pagination - limitkan data dipaparkan pada 1 page
        // $senaraiPermohonan = DB::table('permohonan')->paginate(2);
        // $senaraiPermohonan = DB::table('permohonans')
        // ->where('harga_belian', '>', 0)
        // ->paginate(2);
        // dd($senaraiPermohonan);
        $senaraiPermohonan = DB::table('permohonans')
        ->join('users', 'permohonans.user_id', '=', 'users.id')
        ->select('permohonans.*', 'users.name')
        ->paginate(2);

        return view('template_permohonan/senarai', compact('senaraiPermohonan'));
    }

    public function paparBorang()
    {
        return view('template_permohonan.borang');
    }

    public function simpanData(Request $request)
    {
        // Validation
        $request->validate([
            'nama_pemohon' => ['required', 'min:3'],
            'jawatan_pemohon' => ['required'],
            'harga_belian' => ['required', 'numeric']
        ]);

        // $data = $request->all();
        // $data = $request->input('nama_pemohon');
        // $data = $request->only(['nama_pemohon', 'jawatan_pemohon', 'gred_pemohon']);
        // $data = $request->except(['nama_pemohon', 'jawatan_pemohon']);
        // return $data;
        // Dapatkan data yang nak disimpan
        $data = $request->only([
            'nama_pemohon',
            'jawatan_pemohon',
            'gred_pemohon',
            'jabatan_pemohon',
            'jenis_tablet',
            'harga_belian',
            'tarikh_belian'
        ]);

        // return $data;
        // die and dump data
        // dd($data)
        // Simpan $data ke dalam table permohonans
        DB::table('permohonans')->insert($data);

        // Bagi response setelah selesai simpan data
        // return 'Rekod berjaya disimpan';
        return redirect('/permohonan');
    }

    public function edit($id)
    {
        // Dapatkan data daripad table permohonans berdasarkan ID dan limit 1
        // rekod sahaja
        $item = DB::table('permohonans')->where('id', '=', $id)->first();

        return view('template_permohonan/edit', compact('item'));
    }

    public function update($id, Request $request)
    {
        // Validation
        $request->validate([
            'nama_pemohon' => ['required', 'min:3'],
            'jawatan_pemohon' => ['required'],
            'harga_belian' => ['required', 'numeric']
        ]);

        $data = $request->only([
            'nama_pemohon',
            'jawatan_pemohon',
            'gred_pemohon',
            'jabatan_pemohon',
            'jenis_tablet',
            'harga_belian',
            'tarikh_belian'
        ]);

        // return $data;
        // die and dump data
        // dd($data)
        // Simpan $data ke dalam table permohonans
        DB::table('permohonans')->where('id', '=', $id)->update($data);

        // Bagi response setelah selesai simpan data
        // return 'Rekod berjaya disimpan';
        return redirect('/permohonan');
    }

    public function destroy($id)
    {
        DB::table('permohonans')->where('id', '=', $id)->delete();

        return redirect('/permohonan');
    }
}
