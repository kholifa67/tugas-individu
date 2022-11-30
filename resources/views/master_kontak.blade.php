@extends('admin')
 
@section('title', 'Master Kontak')
@section('content-title', 'Master Kontak')
@section('content')
<br>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <strong>{{ $message }}</strong>
    <button type="button" class="btn btn-sm btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if ($message = Session::get('hapus'))
<div class="alert alert-danger alert-block">
    <strong>{{ $message }}</strong>
    <button type="button" class="btn btn-sm btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if ($message = Session::get('update'))
<div class="alert alert-success alert-block">
    <strong>{{ $message }}</strong>
    <button type="button" class="btn btn-sm btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if ($message = Session::get('delete'))
<div class="alert alert-danger alert-block">
    <strong>{{ $message }}</strong>
    <button type="button" class="btn btn-sm btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if ($message = Session::get('yesjadi'))
<div class="alert alert-success alert-block">
    <strong>{{ $message }}</strong>
    <button type="button" class="btn btn-sm btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<!--Modal Tambah Data-->
<div class="col-lg-12">
<div class="card shadow mb-4">
    <a class="btn btn-dark" style= "background-color:#ff1476"  href="{{ route('master_jkontak.create') }}">Tambah Jenis Kontak</a>
</div>
<!--Jenis Kontak-->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table">
                    <thead class="text-white" style= "background-color:#ff1476">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">JENIS KONTAK</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenis_kontak as $i => $item)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $item->jenis_kontak }}</td>
                                <td>
                                    {{-- <a href="{{ route('masterjeniskontak.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a> --}}
                                
                                        <a href="{{ route('master_jkontak.hapus', $item->id) }}"
                                        class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                       
                                </td>
                            </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>

        <!--Data Siswa-->
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow-mb-4">
                    <div class="card-header" style= "background-color:#ff1476">
                        <h6 class="m-0 font-weight-bold text-white">Data Siswa</h6>
                    </div>
                    <div class="card-body ">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">NISN</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            @foreach ($student as $item)
                                <tbody>
                                    <tr>
                                        <th>{{ $item->nisn }}</th>
                                        <th>{{ $item->nama }}</th>

                                        <td class="text-center">
                                            <a class="btn-warning" onclick="show({{ $item->id }})"><i
                                                    class="btn-sm warning fas fa-phone"></i></a>
                                            <a class="btn-success"
                                                href="{{ route('master_k.tambah', $item->id) }}"><i
                                                    class="btn-sm success fas fa-plus"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <div class="card-footer d-flex justify-content-center">
                            {{ $student->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-mb-4">
                    <div class="card-header" style= "background-color:#ff1476">
                        <h6 class="m-0 font-weight-bold text-white">Kontak Pribadi Siswa</h6>
                    </div>
                    <div class="card-body " id="kontak">
                        <div class="text-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function show(id) {
                $.get('master_k/' + id, function(data) {
                    $('#kontak').html(data);
                })

            }
        </script>
    </div>
@endsection