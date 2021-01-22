<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Navigation</h3>
                    </div>
                    <div class="card-body">
                        <div class="row margin">
                            <div class="col-12">
                                <form id="form-submit" method="post">
                            </div>
                            <div class="col-sm-2">
                                <p>Nama Menu:</p>
                                <input type="text" class="form-control" name="name" required="required"><br>
                            </div>
                            <div class="col-sm-2">
                                <p>Nama Link:</p>
                                <input type="text" class="form-control" name="link" required="required"><br>
                            </div>
                            <div class="col-sm-2">
                                <p>JS/CSS:</p>
                                <input type="text" class="form-control" name="second_id" required="required"><br>
                            </div>
                            <div class="col-sm-2">
                                <p>Tipe:</p>
                                <?= ($optionTipe) ?>
                            </div>
                            <div class="col-sm-2">
                                <p>Root:</p>
                                <select id="root" name="root" class="form-control select2bs4">
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <p>Icon:</p>
                                <input type="text" class="form-control" name="icon" required="required"><br>
                            </div>
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-success" id="tombol-simpan">Simpan</button></button>
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
                        <h3 class="card-title">Data User Detail</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class='table table-bordered table-striped table-hover'>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Link</th>
                                    <th>JS/CSS</th>
                                    <th>Tipe</th>
                                    <th>Root</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_data">
                            </tbody>
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
                                <div class="form-group">
                                    <label for="Nama Menu">Nama Menu</label>
                                    <input type="hidden" name="id_edit" class="form-control"></input>
                                    <input type="text" name="name_edit" class="form-control"></input>
                                </div>
                                <div class="form-group">
                                    <label for="Link">Link</label>
                                    <input type="text" name="link_edit" class="form-control"></input>
                                </div>
                                <div class="form-group">
                                    <label for="second_id">JS/CSS</label>
                                    <input type="text" name="second_id_edit" class="form-control"></input>
                                </div>
                                <div class="form-group">
                                    <label for="Tipe">Tipe</label>
                                    <?= ($optionTipeEdit) ?>
                                </div>
                                <div class="form-group">
                                    <label for="Root">Root</label>
                                    <select id="root_edit" name="root_edit" class="form-control select2bs4">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Icon">Icon</label>
                                    <input type="text" name="icon_edit" class="form-control"></input>
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