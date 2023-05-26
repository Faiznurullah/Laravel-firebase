@extends('apps.src.template')
@section('konten')
<div class="row mt-3 justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <p>Data Todolist</p>
            </div>
            <div class="card-body">
                <a href="/add" class="btn btn-sm btn-primary mb-3">Tambah data</a>
                @if (session('pesan'))
                <div class="alert alert-success">
                    {{ session('pesan') }}
                </div>
                @endif

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">no</th>
                        <th scope="col">nama</th>
                        <th scope="col">alamat</th>
                        <th scope="col">umur</th>
                        <th scope="col">action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                          $no = 1;  
                        @endphp
                        @forelse ($collection as $key => $item)
                      <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['alamat'] }}</td>
                        <td>{{ $item['umur'] }}</td>
                        <td>
                         <a href="/edit/{{ $key }}" class="btn btn-sm btn-success">Edit</a>
                         <a href="/hapus/{{ $key }}" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                      </tr> 
                      @empty
                        <p>Data kosong</p>    
                    @endforelse
                    </tbody>
                  </table>
                
            </div>
        </div>
    </div>
</div>
@endsection