<section class="content">
    <!-- Small boxes (Stat box) -->
    <!-- /.row (main row) -->
    <div class="row">
        <div class="col-7">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data <?= ($menu->name); ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tbl_data" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Customer</th>
                                <th>Total</th>
                                <th data-priority="1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Customer</th>
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
        <div class="col-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Statistic <?= ($menu->name); ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <canvas id="myChart" width="400" height="386"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-12">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <div class="percentageRevenue"></div>
                            <h5 class="description-header pendapatan"></h5>
                            <span class="description-text">TODAY SALE</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <div class="percentageCost"></div>
                            <h5 class="description-header pengeluaran"></h5>
                            <span class="description-text">TODAY COST</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <div class="percentageNetIncome"></div>
                            <h5 class="description-header profit"></h5>
                            <span class="description-text">TODAY PROFIT</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                        <div class="description-block">
                            <div class="percentageGoalDay"></div>
                            <h5 class="description-header fixedcost"></h5>
                            <span class="description-text">GOAL COMPLETIONS / Day</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
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