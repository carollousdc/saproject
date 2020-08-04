  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Data item</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">Data item</li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                  <div class="col-12">
                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">Create User</h3>
                          </div>
                          <div class="card-body">
                              <div class="row margin">
                                  <div class="col-12">
                                      <form id="form-submit" method="post">
                                  </div>
                                  <div class="col-sm-5">
                                      Daftar barang: <?= $dataItem ?>
                                  </div>
                                  <div class="col-sm-5">
                                      Quantity: <input type="number" class="form-control" id="qty" name="qty"><br>
                                  </div>

                                  <div class="col-sm-2">
                                      <label></label>
                                      <input type="button" id="addbarang" class="btn btn-success form-control" value="Add">
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
                              <h3 class="card-title">Data item Detail</h3>

                              <div class="card-tools">
                                  <div class="input-group input-group-sm" style="width: 150px;">
                                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                      <div class="input-group-append">
                                          <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="card-body">
                              <table class='table table-bordered table-striped table-hover'>
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Nama item</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody id="displayhasil">
                                  </tbody>
                              </table>
                          </div>

                          <!-- /.card-header -->
                          <div class="card-body">
                              <table class='table table-bordered table-striped table-hover'>
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Nama item</th>
                                          <th>Kategori</th>
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
                                  <button type="button" class="close" data-dismiss="modal">×</button>
                                  <h4 class="modal-title">Edit Data</h4>
                              </div>
                              <div class="modal-body">
                                  <form>
                                      <div class="form-group">
                                          <label for="name">Nama item</label>
                                          <input type="text" name="name_edit" class="form-control"></input>
                                      </div>
                                      <div class="form-group">
                                          <label for="kategori">Kategori</label>
                                          <input type="text" name="kategori_edit" class="form-control"></input>
                                          <input type="hidden" name="id_edit" class="form-control"></input>
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

              </div><!-- row -->
              <div class="row justify-content-end">
                  <div class="col-md-2 mt-4">
                      <button type="submit" class="btn btn-primary form-control w-100 " id="tombol-simpan">Save</button>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->