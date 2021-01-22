<section class="content">
    <div class="row">
        <div class="col-lg-5 col-sm-5">
            <div class="card">
                <div class="card-header">
                    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for products..">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div id="viewModal" class="card-body table-responsive" style="height: 730px;">
                                <div class="row" id="viewModals">
                                    <?= ($listProduk) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form id="dataproduk" method="post">
            <input type='hidden' id="bahan_baku" name="bahan_baku">
        </form>
        <div class="col-lg-7 col-sm-7">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Daftar Menu Bakmi Pelita 2 Bima</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="headId">Detail Product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <input type="number" id="qty" name="qty" class="form-control" placeholder="Jumlah produk">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <input type="number" id="diskon" name="diskon" class="form-control" placeholder="Diskon produk">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Tambahkan keterangan jika dibutuhkan."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <input type="button" class="btn btn-flat btn-light bg-purple w-100 " id="btn-submit" data-dismiss="modal" value="Tambah">
                                </div>
                            </div>
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <form id="form-submit" method="post" action="">
                        <div class="row">
                            <div class="col-12">
                                <div id="viewModal" class="card-body table-responsive">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="pesan"></div>
                                        </div>
                                        <div class="col-5">
                                            <?= ($optionSupplier) ?>
                                        </div>
                                        <div class="col-4">
                                            <input type="date" class="form-control" id="buy_date" name="buy_date">
                                        </div>
                                        <div class="col-3">
                                            <select id="metode_pembayaran" class="form-control select2bs4" name="metode_pembayaran">
                                                <option value="0">Tunai</option>
                                                <option value="1">Transfer</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <hr />
                                            <table id="tbl_data" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Bahan Baku</th>
                                                        <th>Qty</th>
                                                        <th>Diskon</th>
                                                        <th>Keterangan</th>
                                                        <th>Harga</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-5">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                                <p></p>
                                            </div>
                                            <div class="col-4">
                                                <label>Grand Total:</label>
                                                <input type='text' id="sumtotal" class="form-control" readonly>
                                            </div>
                                            <div class="col-12">
                                                <hr />
                                                <button type="submit" id="pembayaran" class="btn btn-block btn-danger form-control rounded">Pembayaran</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>