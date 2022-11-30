@extends('admin')
 
@section('title', 'Edit Kontak')
@section('content-title', 'Edit Kontak')
@section('content')
<form method="post" enctype="multipart/form-data" action="{{ route('master_k.update', $kontak->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="sosmed">JENIS SOSIAL MEDIA</label>
        <select class="form-control" id="sosmed" name='sosmed'>
            @foreach ($jenis_kontak as $jenis_kontak)
                <option value="{{ $jenis_kontak->id }}">{{ $jenis_kontak->jenis_kontak }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="deskripsi">DESKRIPSI KONTAK</label>
        <input type="text" class="form-control" id="deskripsi" name='deskripsi' value="{{ $kontak->deskripsi }}">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Save">
        <a href="{{ route('master_k.index') }}" class="btn btn-danger">Batal</a>
    </div>
</form>
</div>
</div>
</div>
</div>
@endsection
