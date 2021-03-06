<section class="content">
    <!-- Small boxes (Stat box) -->
    <!-- /.row (main row) -->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data <?= $menu->name ?></h3>
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
                                <th>id</th>
                                <th>Tanggal Pembelian</th>
                                <th>Supplier</th>
                                <th>Metode Pembayaran</th>
                                <th>Total</th>
                                <th data-priority="1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Tanggal Pembelian</th>
                                <th>Supplier</th>
                                <th>Metode Pembayaran</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-12">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-2">
                    </div>
                    <div class="col-2">
                        <input type="text" id="sumMasterTotal" class="form-control" readonly>
                    </div>
                </div>
            </div>
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
                                <label for="id">Username</label>
                                <input type="text" name="id_edit" class="form-control"></input>
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