<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Siswa;
use App\Models\jenis_kontak;
use App\Models\kontak;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = siswa::paginate(5);
        $jenis_kontak = jenis_kontak::all();
        return view('master_kontak', compact('student', 'jenis_kontak'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function tambah($id)
    {
        $siswa = siswa::find($id);
        $jenis_kontak = jenis_kontak::all();
        return view('create_kontak', compact('siswa', 'jenis_kontak'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $message=[
                'required'=>':attribute harus di isi yaa....',
                'min'=>':attribute minimal :min karakter ya...',
            ];
    
            //validasi data
            $this->validate($request,[
              
            ], $message);
    
            //insert data
            kontak::create([
                'siswa_id' => $request->siswa_id,
                'jenis_kontak_id' => $request->sosmed,
                'deskripsi' => $request->deskripsi,

            ]);
            Session::flash('success', "Data Berhasil Di Tambahkan");
            return redirect('/master_k');
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontak=siswa::find($id)->kontak()->get();
        return view('show_kontak', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontak = kontak::find($id);
        $jenis_kontak = jenis_kontak::all();
        return view('/edit_kontak', compact('kontak', 'jenis_kontak'));
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
        $message = [
            'required' => ';attribute isi woi',
            'min' => ':attribute minimal :min karakter woi',
            'max' => ':attribute maksimal :max karakter woi'
        ];
        $validateData = $request->validate([
            'sosmed' => 'required',
            'deskripsi' => 'required'
        ], $message);

        $kontak = kontak::find($id);
        $kontak->jenis_kontak_id = $request->sosmed;
        $kontak->deskripsi = $request->deskripsi;
        $kontak->save();
        // kontak::find($id)->update($validateData);
        Session::flash('update', 'Selamat!!! Kontak Anda Berhasil Diupdate');
        return redirect('/master_k');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function hapus($id)
    {
        $siswa = kontak::find($id)->delete();
        Session::flash('hapus', "kontak berhasil dihapus!!");
        return redirect('/master_k');
        //
    }
}
