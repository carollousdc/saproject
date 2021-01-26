<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Product</h3>
                </div>
                <div class="card-body">
                    <form id="form-submit" method="post" action="produk/tambahData">
                        <div class="row margin">
                            <div class="col-sm-3">
                                Nama Bahan: <input type="text" class="form-control" name="name" required="required" pattern="[A-Za-z0-9]{1,20}"><br>
                            </div>
                            <div class="col-sm-3">
                                Harga Bahan: <input type="number" class="form-control" name="b_price" id="b_price" required="required"><br>
                            </div>
                            <div class="col-sm-3">
                                Tipe: <input type="text" class="form-control" name="tipe" id="tipe" required="required"><br>
                            </div>
                            <div class="col-sm-3">
                                Expired: <input type="number" class="form-control" name="expired" id="expired" required="required"><br>
                            </div>
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-success" id="tombol-simpan">Simpan</button>
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
                    <h3 class="card-title">Data Produk</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 350px;">
                            <input type="text" id="searchbox" name="searchbox" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tbl_data" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Bahan</th>
                                <th>Harga Bahan</th>
                                <th>Tipe</th>
                                <th>Expired</th>
                                <th data-priority="1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Bahan</th>
                                <th>Harga Bahan</th>
                                <th>Tipe</th>
                                <th>Expired</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
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