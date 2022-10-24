<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Symfony\Contracts\Service\Attribute\Required;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::all();
        return view('master_siswa', compact('data'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_siswa');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masage = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'numeric' => ':attribute harus diisi angka',
            'mimes' => ':attribute harus bertipe foto'
        ];

        $this->validate($request, [
            'nama' => 'required|min:7|max:30',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'required|mimes:jpg,png,jpeg',
            'about' => 'required|min:10'
        ], $masage);

        // ambil parameter
        $file = $request->file('foto');
        // rename
        $nama_file = time() . '_' . $file->getClientOriginalName();
        // proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        siswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'foto' => $nama_file,
            'about' => $request->about
        ]);

        Session::flash('success', "data berhasil ditambahkan!!");
        return redirect('/master_s');
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
        $siswa = siswa::find($id);
        $kontaks = $siswa->kontak()->get();
        // return($kontak);
        return view('show_siswa', compact('siswa', 'kontaks'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // ambil parameter
        $siswa = siswa::find($id);
        return view('edit_siswa', compact('siswa'));
        //
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
        $masage = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'numeric' => ':attribute harus diisi angka',
            'mimes' => ':attribute harus bertipe foto'
        ];

        $this->validate($request, [
            'nama' => 'required|min:7|max:30',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'mimes:jpg,png,jpeg',
            'about' => 'required|min:10'
        ], $masage);

        if ($request->foto != '') {
            $siswa = Siswa::find($id);
            file::delete('./template/img/' . $siswa->foto);
            $file = $request->file('foto');
            // rename
            $nama_file = time() . '_' . $file->getClientOriginalName();
            // proses upload
            $tujuan_upload = './template/img';
            $file->move($tujuan_upload, $nama_file);
            // simpan ke db
            $siswa->nisn = $request->nisn;
            $siswa->nama = $request->nama;
            $siswa->jk = $request->jk;
            $siswa->alamat = $request->alamat;
            $siswa->foto = $nama_file;
            $siswa->about = $request->about;

            $siswa->save();
            Session::flash('success', "data berhasil diupdate!!");
            return redirect('master_s');
        } else {
            $siswa = Siswa::find($id);
            $siswa->nisn = $request->nisn;
            $siswa->nama = $request->nama;
            $siswa->jk = $request->jk;
            $siswa->alamat = $request->alamat;
            $siswa->about = $request->about;

            $siswa->save();
            Session::flash('success', "data berhasil diupdate!!");
            return redirect('master_s');
        }
        //
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
        $siswa = siswa::find($id)->delete();
        Session::flash('success', "data berhasil dihapus!!");
        return redirect('/master_s');
        //
    }
}
