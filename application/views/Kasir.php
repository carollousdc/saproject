<section class="content">
    <div class="row">
        <div class="col-lg-1 col-sm-2">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Aktifkan Promo</label>
            </div>
        </div>
        <div class="col-lg-3 col-sm-4">
            <select id="p_promo" name="p_promo" class="form-control select2bs4"></select>
        </div>
        <div class="col-lg-3 col-sm-1">
            <!-- <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for products.."> -->
        </div>
        <div class="col-lg-5 col-sm-5">
            <a class="btn btn-app">
                <span class="badge bg-warning">3</span>
                <i class="fas fa-bullhorn"></i> Notifications
            </a>
            <a class="btn btn-app">
                <span class="badge bg-warning">3</span>
                <i class="fas fa-bullhorn"></i> Notifications
            </a>
            <a class="btn btn-app">
                <span class="badge bg-warning">3</span>
                <i class="fas fa-bullhorn"></i> Notifications
            </a>
            <a class="btn btn-app">
                <span class="badge bg-warning">3</span>
                <i class="fas fa-bullhorn"></i> Notifications
            </a>
        </div>
        <div class="col-lg-5 col-sm-5">
            <hr />
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Daftar Menu Bakmi Pelita 2 Bima</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div id="viewModal" class="card-body table-responsive" style="height: 660px;">
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
            <input type='hidden' id="barang" name="barang">
        </form>
        <div class="col-lg-7 col-sm-7">
            <hr />
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Daftar Menu Bakmi Pelita 2 Bima</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" id="searchbox" name="searchbox" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
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
                                        <div class="col-12">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                                <label class="custom-control-label" for="customSwitch2">Papperbowl</label>
                                            </div>
                                            <input type="hidden" id="paperbowl" name="paperbowl">
                                            <hr />
                                        </div>
                                        <div class="col-8">
                                            <div class="input-group mb-3">
                                                <input type="number" id="qty" name="qty" class="form-control" placeholder="Jumlah produk">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <input type="number" id="diskon" name="diskon" class="form-control" placeholder="Diskon">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <input type="number" id="pangsit" name="pangsit" class="form-control" placeholder="Jumlah pangsit">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <input type="number" id="baso" name="baso" class="form-control" placeholder="Jumlah baso">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                            </div>
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
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="customer" name="customer" placeholder="Customer name">
                                        </div>
                                        <div class="col-4">
                                            <input type="date" class="form-control" id="buy_date" name="buy_date">
                                        </div>
                                        <div class="col-2">
                                            <input type="number" class="form-control" id="no_order" name="no_order" readonly>
                                        </div>
                                        <div class="col-12">
                                            <hr />
                                            <table id="tbl_data" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Produk</th>
                                                        <th>Qty</th>
                                                        <th>Diskon</th>
                                                        <th>Promo</th>
                                                        <th>Harga</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3">
                                                <label>Metode Pembayaran:</label>
                                                <?= $optionMetode ?>
                                            </div>
                                            <div class="col-lg-3 col-sm-5">
                                                <label>Cash:</label>
                                                <input type='number' name="cash" id="cash" class="form-control">
                                            </div>
                                            <div class="col-lg-3 col-sm-3">
                                                <label>Tax:</label>
                                                <input type='number' id="tax" name="tax" class="form-control">
                                            </div>
                                            <div class="col-lg-3 col-sm-4">
                                                <label>Grand Total:</label>
                                                <input type='text' id="sumtotal" class="form-control" readonly>
                                            </div>
                                            <div class="col-6">
                                                <hr />
                                                <button type="button" id="reset" class="btn btn-block btn-warning form-control rounded">Reset</button>
                                            </div>
                                            <div class="col-6">
                                                <hr />
                                                <button type="button" id="pembayaran" class="btn btn-block btn-danger form-control rounded">Pembayaran</button>
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