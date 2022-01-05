@extends('layouts.app')

@section('content')

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
                                        <th>Link</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($tugas as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->siswa }}</td>
                                                <td>{{ $item->tugas }}</td>
                                                <td> <a  target="_blank" href="{{ $item->link }}">Ini</a></td>
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