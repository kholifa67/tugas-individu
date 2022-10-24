@extends('admin')
 
@section('title', 'Show Siswa')
@section('content-title', 'Show Siswa')
@section('content')
    <h1>Halaman Show Siswa</h1>
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header"></div>
                <div class="card-body text-center">
                    <img src="{{ asset('./template/img/'.$siswa->foto) }}" width="200", class="rounded-circles mt-3 mx-auto img-thumbnail">
                    <h4>{{ $siswa->nama }}</h4>
                    <h5>{{ $siswa->nisn }}</h5>
                    <h6>{{ $siswa->jk }}</h6>
                    <h6>{{ $siswa->alamat }}</h6>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-plus"></i>  kontak siswa</h6>
                </div>
                <div class="card-body">
                    @foreach($kontaks as $kontak)
                    <li>{{ $kontak->jenis_kontak }} : {{ $kontak->pivot->deskripsi }}</li>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-quote-left"></i>  about siswa</h6>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote text-center">
                        <p class="mb-0">{{ $siswa->about }}</p><br>
                        <footer class="blockquote-footer">Ditulis oleh <cite title="source title">{{ $siswa->nama }}</cite></footer>
                    </blockquote>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-tasks"></i>  project siswa</h6>
                </div>
                <div class="card-body">
    
                </div>
            </div>
        </div>
    </div>
@endsection
