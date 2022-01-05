<div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ url('/game') }}" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah game</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Soal</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <div class="alert"></div>
                            <div id='img_container'>
                                <img id="preview" src="" width="500px" alt="your image" title='' />
                            </div>
                            <div class="">
                                <div class="custom-file">
                                    <input type="file" name="image" required id="inputGroupFile01"
                                        class="imgInp custom-file-input" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Pilih gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Jawaban</p>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" name="benar" value="0"
                                        aria-label="Radio button for following text input">
                                </div>
                            </div>
                            <input type="text" name="jawaban[]" class="form-control" aria-label="Text input with radio button">
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" name="benar" value="1"
                                        aria-label="Radio button for following text input">
                                </div>
                            </div>
                            <input type="text" class="form-control" name="jawaban[]"
                                aria-label="Text input with radio button">
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" name="benar" value="2"
                                        aria-label="Radio button for following text input">
                                </div>
                            </div>
                            <input type="text" class="form-control" name="jawaban[]"
                                aria-label="Text input with radio button">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </form>
        </div>
    </div>
</div>
