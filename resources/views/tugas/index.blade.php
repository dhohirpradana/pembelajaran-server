@extends('layouts.app')

@section('content')

    @include('tugas.create')

    @foreach ($tugas as $item)
       
        <div class="modal fade bd-example-modal-lg" id="deleteModal-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ url("/tugas/$item->id") }}" method="post">

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
            <h1>Tugas</h1>
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
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($tugas as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
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