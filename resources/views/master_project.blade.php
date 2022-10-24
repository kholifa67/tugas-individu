@extends('admin')
 
@section('title', 'Master Project')
@section('content-title', 'Master Project')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="row">
    <div class="col-lg-5">  
     <div class="card shadow mb-4">
     <div class="card-header">
       <h6 class="m-0 font-weight-bold text-primary"><i class="  "></i>  Kontak Siswa</h6>
     </div>
        <div class="card-body">
        <table class="table">
                 <thead>
                     <tr>                 
                     <th scope="col">NISN</th>   
                     <th scope="col">NAMA</th>
                     <th scope="col">ACTION</th>
                     </tr>
                 </thead>
                 @foreach($data as $item)
                 <tr>
                     <td> {{ $item->nisn }} </td> 
                     <td> {{ $item->nama }} </td>
                     <td class="text-center">
                         <a onclick="show({{ $item->id }})" class="btn btn-sm btn-info btn-circle"><i class="fas fa-folder-open"> </i></a>
                         <a href="{{ route('master_p.create', $item->id)   }}" class="btn btn-sm btn-success btn-circle"><i class="fas fa-plus"> </i></a>   
                     </td>
                 </tr>
                 @endforeach
        </table>
                 <div class="card-footer d-flex justify-content-end">
                     {{ $data->links() }}  
                 </div>
        </div>
     
   </div>
 </div>
     <!-- ketiga -->
     <div class="col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header">
          <h6 class="m-0 font-weight-bold text-primary"><i class=""></i> About Siswa</h6>
          </div>
          <div id="project" class="card-body">
        <h6 class="text-center">pilih siswa dulu</h6>
          </div>
        </div>   
     </div>
 </div>
 <script>
    function show(id){
        $.get('master_p/'+id, function(data){
            $('#project').html(data);
        })
    }
 </script>
@endsection
