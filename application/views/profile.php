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
                              <h3 class="card-title">Upload Profile Picture</h3>
                          </div>
                          <div class="card-body">
                              <div class="row margin">
                                  <div class="col-lg-12">
                                      <form action="profile/aksi" method="post" enctype="multipart/form-data">
                                          <input type="file" name="file">
                                          <input type="submit" name="upload" value="Upload">
                                      </form>
                                      <table>
                                          <tr>
                                              <td><?= $showImage ?></td>
                                          </tr>
                                      </table>
                                  </div>
                              </div> <!-- /.card-row-margin -->
                          </div> <!-- /.card-body -->
                      </div> <!-- /.card-primary -->
                  </div> <!-- /.col12 -->
              </div> <!-- /.row -->
          </div> <!-- /.container-fluid -->
      </section> <!-- /.content -->

  </div> <!-- /.content-wrapper -->