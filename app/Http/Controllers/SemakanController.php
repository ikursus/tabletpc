<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

class SemakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senaraiPermohonan = Permohonan::where('harga_belian', '>', 0)
        ->latest()
        ->paginate(2);

        return view('semakan/template_list_semakan', compact('senaraiPermohonan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semakan.borang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $data = $request->all();

        // return $data;
        // die and dump data
        // dd($data)
        // Simpan $data ke dalam table permohonan
        Permohonan::create($data);

        // Bagi response setelah selesai simpan data
        // return 'Rekod berjaya disimpan';
        return redirect('/semakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return 'Ini adalah halaman semakan permohonan ID: ' . $id;
        $page_title = 'Halaman Semakan';
        //return view('semakan/template_detail_semakan');
        // return view('semakan/template_detail_semakan')->with('id', $id)->with('page_title', $page_title);
        // return view('semakan/template_detail_semakan', ['id' => $id, 'page_title' => $page_title]);

        $input_nama = '<input type="text" name="nama">';

        return view('semakan/template_detail_semakan', compact('id', 'page_title', 'input_nama'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Dapatkan data daripada table permohonan berdasarkan ID dan limit 1
        // rekod sahaja
        // Penggunaan find() hanya boleh digunakan pada carian ID
        // $item = Permohonan::where('nama_pemohon', '=', 'John Doe')->first();
        $item = Permohonan::find($id);
        // $item = Permohonan::findOrFail($id);

        if (is_null($item))
        {
            return redirect('/semakan');
        }

        return view('semakan/edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'nama_pemohon' => ['required', 'min:3'],
            'jawatan_pemohon' => ['required'],
            'harga_belian' => ['required', 'numeric']
        ]);

        $data = $request->all();

        // return $data;
        // die and dump data
        // dd($data)
        // Simpan $data ke dalam table permohonan
        $permohonan = Permohonan::find($id);
        $permohonan->update($data);

        // Bagi response setelah selesai simpan data
        // return 'Rekod berjaya disimpan';
        return redirect('/semakan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permohonan = Permohonan::find($id);
        $permohonan->delete();

        return redirect('/semakan');
    }
}
