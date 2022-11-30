<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\project;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::paginate(5);
        return view('master_project', compact('data'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $siswa = siswa::find($id);
        return view('create_project', compact('siswa'));
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
            'nama_p' => 'required|min:7|max:30',
            'deskripsi' => 'required|min:10',
            'tanggal' => 'required'
        ], $masage);

        project::create([
            'id_siswa' => $request->id_siswa,
            'nama_project' => $request->nama_p,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal
        ]);

        Session::flash('success', "project berhasil ditambahkan!!");
        return redirect('/master_p');
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
        $project = siswa::find($id)->project()->get();
        return view('show_project', compact('project'));
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
        $siswa = project::find($id);
        return view('edit_project', compact('siswa'));
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
            'nama_p' => 'required|min:7|max:30',
            'deskripsi' => 'required|min:10',
            'tanggal' => 'required'
        ], $masage);

            $project = project::find($id);
            $project->nama_project = $request->nama_p;
            $project->deskripsi = $request->deskripsi;
            $project->tanggal = $request->tanggal;

            $project->save();
            Session::flash('success', "project berhasil diupdate!!");
            return redirect('master_p');
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
        $siswa = project::find($id)->delete();
        Session::flash('success', "project berhasil dihapus!!");
        return redirect('/master_p');
        //
    }
}
