@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Materi</h1>
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
                        <div class="card-body">
                            <div class="form-group ">
                                <span class="d-inline h5">{{ $materi->title }}</span>
                                <span class="ml-5 btn btn-info">Edit</span>
                            </div>

                            <div class="form-group">
                                @foreach ($detail_materi as $item)
                                    <img src="{{ asset("/storage/$item->image") }}" width="500px" style="margin-top: 5px" alt="" />
                                    <br>
                                @endforeach
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script>
        $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>'))
                        .attr('src', event.target.result)
                        .attr('class', "gambar")
                        .attr('width', "400px")
                        .css('margin', '5px')
                        .appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'div.gallery');
        });
    });

   
    </script>
@endsection