@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Materi</h1>
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
                            <h4>Daftar Materi</h4>
                            <a href="{{ url('/materi/create') }}" class="btn btn-success btn-sm">Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md" id="example">
                                    <thead>
                                        <th>#</th>
                                        <th>Materi</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($materi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td><a href="{{ url("materi/$item->id") }}" class="btn btn-info">Detail</a></td>
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
