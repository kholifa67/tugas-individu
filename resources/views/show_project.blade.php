@if ($project->isEmpty())
    <h6 class="text-center">Siswa Belum Memiliki Project</h6>

@else
    @foreach($project as $item)
        <div class="card mb-3">
            <div class="card-header">
                <strong>{{ $item->nama_project }}</strong>
            </div>

            <div class="card-body">
                <strong>Tanggal Project :</strong>
                <p>{{ $item->tanggal }}</p>
                <strong>Deskripsi Project :</strong>
                <p>{{ $item->deskripsi }}</p>
            </div>

            <div class="card-footer">
                <a href="{{ route('master_p.edit', $item->id)  }}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                <a href="{{ route('master_p.hapus', $item->id)  }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
            </div>
        </div>
    @endforeach
@endif
