@extends('layouts.app')

@section('content')

@include('tugas.create')

@foreach ($tugas as $item)
@php
$jawaban = Illuminate\Support\Facades\DB::table("tugas_siswa")
->get();
@endphp

<div class="modal fade bd-example-modal-lg" id="editModal-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ url("/tugas-siswa/$item->id") }}" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nilai Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Nilai</label>
                            <input type="text" name="nilai" value="{{ $item->nilai }}" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    @csrf
                    @method('PUT')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endforeach

<section class="section">
    <div class="section-header">
        <h1>Laporan Tugas</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md" id="example">
                                <thead>
                                    <th>#</th>
                                    <th>Siswa</th>
                                    <th>Tugas</th>
                                    <th>Jawaban</th>
                                    <th>Nilai</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($tugas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->siswa }}</td>
                                        <td>{{ $item->tugas }}</td>
                                        <td> <a target="_blank" href="storage/{{ $item->link }}">gambar</a>
                                        </td>
                                        <td>{{ $item->nilai }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#editModal-{{ $item->id }}">
                                                Edit Nilai
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