<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah <?= $menu->name ?></h3>
                </div>
                <div class="card-body">
                    <form id="form-submit" method="post" action="produk/tambahData">
                        <div class="row margin">
                            <div class="col-sm-3">
                                Nama Supplier: <input type="text" class="form-control" name="name" id="name" required="required"><br>
                            </div>
                            <div class="col-sm-3">
                                Alamat: <input type="text" class="form-control" name="alamat" id="alamat" required="required"><br>
                            </div>
                            <div class="col-sm-3">
                                Kontak: <input type="text" class="form-control" name="kontak" id="kontak" required="required"><br>
                            </div>
                            <div class="col-sm-3">
                                Kode: <input type="text" class="form-control" name="kode" id="kode" required="required"><br>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success" id="tombol-simpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah <?= $menu->name ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tbl_data" class="table table-bordered table-hover">
                        <?= $tableHeader ?>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Edit Data</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input type="hidden" name="id_edit">
                                <input type="text" name="name_edit" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Harga Beli</label>
                                <input type="text" name="alamat_edit" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label for="kontak">Harga Jual</label>
                                <input type="text" name="kontak_edit" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label for="kode">Harga Jual</label>
                                <input type="text" name="kode_edit" class="form-control"></input>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btn_update_data">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>