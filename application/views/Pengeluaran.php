<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-xl">Tambah <?= ($menu->name); ?></button>
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
                    <div id="editModal" class="modal fade bd-example-modal-xl" id="modalform" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <form id="form-submit" method="POST">
                            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="headId">Masukkan <?= ($menu->name); ?></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nama <?= ($menu->name); ?>" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group mb-3">
                                                    <input type="date" id="buy_date" name="buy_date" class="form-control" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group mb-3">
                                                    <input type="number" id="periode" name="periode" class="form-control" placeholder="Periode pengeluaran" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <input type="number" id="biaya" name="biaya" class="form-control" placeholder="Biaya pengeluaran" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <?= $optionTipe ?>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Masukkan keterangan pengeluaran"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="tombol-simpan" class="btn btn-primary">Save changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table id="tbl_data" class="table table-bordered table-hover">
                        <?= $tableHeader ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>