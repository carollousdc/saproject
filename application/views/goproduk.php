<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-12">
            <form id="form-submit" method="post" action="produk/tambahData">
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah <?= ($menu->name) ?></h3>
                        <button type="button" class="btn btn-tool float-right" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="card-body">
                        <div id="setheight" style="height: 100%;">
                            <div class="row margin">
                                <?= ($input_form) ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-plus-square"></i></span>
                                    </div>
                                    <?= ($optionPromo) ?>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-plus-square"></i></span>
                                    </div>
                                    <?= ($optionBahan) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success" id="tombol-simpan">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
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
                <div class="card-body">
                    <table id="tbl_data" class="table table-bordered table-hover">
                        <?= $tableHeader ?>
                    </table>
                </div>
            </div>
        </div>
        <div id="editModal" class="modal fade" role="dialog">
            <form id="form-edit" method="post">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <?= ($edit_form) ?>
                            <div class="form-group">
                                <label for="promo">Promo</label>
                                <select id="promo_edit" name="promo_edit" class="form-control select2bs4">
                                    <?= ($option_edit) ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="btn_update_data">Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>