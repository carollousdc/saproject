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
                            <div class="col-sm-4">
                                Nama Promo: <input type="text" class="form-control" name="name" id="name" required="required" pattern="[A-Za-z0-9]{1,20}"><br>
                            </div>
                            <div class="col-sm-2">
                                Harga: <input type="number" class="form-control" name="p_price" id="p_price" required="required"><br>
                            </div>
                            <div class="col-sm-2">
                                Diskon: <input type="number" class="form-control" name="p_diskon" id="p_diskon" required="required"><br>
                            </div>
                            <div class="col-sm-2">
                                Start Expired: <input type="date" class="form-control" name="start_expired" id="start_expired" required="required"><br>
                            </div>
                            <div class="col-sm-2">
                                Finish Expired: <input type="date" class="form-control" name="finish_expired" id="finish_expired" required="required"><br>
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
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tbl_data" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Promo</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Start Expired</th>
                                <th>Finish Expired</th>
                                <th data-priority="1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Promo</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Start Expired</th>
                                <th>Finish Expired</th>
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
                        <form id="form-edit" method="post">
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input type="hidden" name="id_edit">
                                <input type="text" name="name_edit" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Harga</label>
                                <input type="number" name="p_price_edit" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label for="kontak">Diskon</label>
                                <input type="number" name="p_diskon_edit" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label for="name">Start Expired</label>
                                <input type="date" name="start_expired_edit" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Finish Expired</label>
                                <input type="date" name="finish_expired_edit" class="form-control"></input>
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