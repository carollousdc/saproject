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
                            <?= ($input_form) ?>
                            <div class="col-sm-2">
                                Promo:
                                <?= ($optionPromo) ?>
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
                                <th>Nama Produk</th>
                                <th>Tipe</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Promo</th>
                                <th data-priority="1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Tipe</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Promo</th>
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
                        <h4 class="modal-title">Edit Data</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <?= ($edit_form) ?>
                            <div class="form-group">
                                <label for="promo">Promo</label>
                                <select id="promo_edit" name="promo_edit" class="form-control select2bs4">
                                    <?= ($option_edit) ?>
                                </select>
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