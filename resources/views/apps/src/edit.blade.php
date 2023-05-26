@extends('apps.src.template')
@section('konten')
    <div class="row mt-3 justify-content-center">
      <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <p>Edit Todolist</p>
            </div>
            <div class="card-body"> 
                <form action="/update/{{ $key }}" method="POST">
                    @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="{{ $data_edit['nama'] }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="{{ $data_edit['alamat'] }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label>Umur</label>
                    <input type="number" name="umur" value="{{ $data_edit['umur'] }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button class="btn btn-sm btn-primary mt-2" type="submit">Update data</button>
                </form>
            </div>
        </div>
      </div>
    </div>
@endsection