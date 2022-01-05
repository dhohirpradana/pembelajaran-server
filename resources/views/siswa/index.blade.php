@extends('layouts.app')

@section('content')

    @include('siswa.create')

    @foreach ($siswa as $item)
       
            
        <div class="modal fade bd-example-modal-lg" id="editModal-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ url("/siswa/$item->id") }}" method="post">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Nama</label>
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>NIK</label>
                                    <input type="text" name="nik" value="{{ $item->nik }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Password (di isi jika ingin mengganti password)</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="{{ $item->tanggal_lahir }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Jenis Kelamin</label>
                                    <select name="jekel" class="form-control">
                                        @if ($item->jekel == "laki-laki")
                                            <option value="laki-laki" selected>Laki - Laki</option>
                                            <option value="perempuan">Perempuan</option>    
                                        @else
                                            <option value="laki-laki">Laki - Laki</option>
                                            <option value="perempuan" selected>Perempuan</option>    
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Nama Orang Tua</label>
                                    <input type="text" name="nama_ortu" value="{{ $item->nama_ortu }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Alamat</label>
                                    <textarea name="alamat" cols="30" rows="10" class="form-control">{{ $item->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Whatsapp</label>
                                    <input type="number" name="whatsapp" value="{{ $item->whatsapp }}" class="form-control" required>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            @csrf
                            @method('PUT')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade bd-example-modal-lg" id="deleteModal-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ url("/siswa/$item->id") }}" method="post">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin akan menghapus secara permanen ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        


    @endforeach
   

    <section class="section">
        <div class="section-header">
            <h1>Siswa</h1>
        </div>

        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>{{ session('msg') }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
       
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                Tambah
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md" id="example">
                                    <thead>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>tanggal lahir</th>
                                        <th>jenis kelamin</th>
                                        <th>orang tua</th>
                                        <th>alamat</th>
                                        <th>whatsapp</th>
                                        
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->nik }}</td>
                                                <td>{{ $item->tanggal_lahir }}</td>
                                                <td>{{ $item->jekel }}</td>
                                                <td>{{ $item->nama_ortu }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->whatsapp }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal-{{ $item->id }}">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $item->id }}">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection