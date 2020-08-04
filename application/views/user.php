  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data user</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data user</li>
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
                  <div class="col-sm-4">
                    Username: <input type="text" class="form-control" name="id" required="required" pattern="[A-Za-z0-9]{1,20}"><br>
                  </div>
                  <div class="col-sm-4">
                    E-mail: <input type="email" class="form-control" name="email"><br>
                  </div>
                  <div class="col-sm-4">
                    Password: <input type="password" class="form-control" name="password" required="required" pattern="[A-Za-z0-9]{1,20}"><br>
                  </div>

                  <div class="col-sm-6">
                    Firstname: <input type="text" class="form-control" name="firstname" required="required" pattern="[A-Za-z0-9]{1,20}"><br>
                  </div>

                  <div class="col-sm-6">
                    Lastname: <input type="text" class="form-control" name="lastname" required="required" pattern="[A-Za-z0-9]{1,20}"><br>
                  </div>

                  <div class="col-sm-12">
                    <button type="button" class="btn btn-success" id="tombol-simpan">Simpan</button>
                    <!--    <button type="button" class="btn btn-success toastsDefaultSuccess">
                  Launch Success Toast
                </button> -->
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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tbl_data" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Icon</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Icon</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>First Name</th>
                      <th>Last Name</th>
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
                  <form>
                    <div class="form-group">
                      <label for="id">Username</label>
                      <input type="text" name="id_edit" class="form-control"></input>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email_edit" class="form-control"></input>
                    </div>
                    <div class="form-group">
                      <label for="firstname">Firstname</label>
                      <input type="text" name="firstname_edit" class="form-control"></input>
                    </div>
                    <div class="form-group">
                      <label for="lastname">Lastname</label>
                      <input type="text" name="lastname_edit" class="form-control"></input>
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
        <!--tes -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->