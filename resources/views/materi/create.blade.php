<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
    var konten = document.getElementById("konten");
     CKEDITOR.replace(konten,{
     language:'en-gb'
   });
   CKEDITOR.config.allowedContent = true;
</script>

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
                        <form action="{{ url("/materi") }}" method="post" enctype="multipart/form-data">
                            <div class="form-group ">
                                <span class="d-inline h5">Nama Materi</span>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <div class="gallery"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Isi Materi (bisa lebih dari 1 gambar)</label> <br>
                                <input type="file" name="image[]" multiple id="gallery-photo-add"
                                    accept="image/x-png,image/gif,image/jpeg">
                            </div>
                            {{-- <div class="form-group">
                                <textarea id="konten" class="form-control" name="konten" rows="10" cols="50"
                                    style="height: 250"></textarea>
                            </div> --}}
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary" type="submit">Tambah</button>
                            </div>
                            @csrf
                        </form>

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