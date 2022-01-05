<div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ url("/siswa") }}" method="post">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label>password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Jenis Kelamin</label>
                            <select name="jekel" class="form-control">
                                <option value="laki-laki">Laki - Laki</option>
                                <option value="perempuan">Perempuan</option>    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Nama Orang Tua</label>
                            <input type="text" name="nama_ortu" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Alamat</label>
                            <textarea name="alamat" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Whatsapp</label>
                            <input type="number" name="whatsapp" class="form-control" required>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>