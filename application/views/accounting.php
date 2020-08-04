  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Accounting</h1>
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
          <div class="col-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Income</h3>
              </div>
              <div class="card-body">
                <div class="row margin">
                  <div class="col-sm-12">
                    <form action="accounting/add_validation" method="post">
                  </div>
                  <div class="col-sm-7">
                    Name of income: <input type="text" class="form-control" name="name" required="required"><br>
                  </div>
                  <div class="col-sm-5">
                    Categories: <?= $dataCategories ?>
                  </div>
                  <div class="col-sm-7">
                    Date: <input type="date" id="date" name="date" class="form-control"><br>
                  </div>
                  <div class="col-sm-5">
                    Amount:<div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text">IDR</span></div><input type="text" id="rupiah" class="form-control" name="ammount" required="required"><br>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <input type="submit" class="btn btn-primary">
                  </div>
                  </form>
                  <!-- s -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Spending</h3>
              </div>
              <div class="card-body">
                <div class="row margin">
                  <div class="col-sm-12">
                    <form action="accounting/add_validation" method="post">
                  </div>
                  <div class="col-sm-4">
                    Username: <input type="text" class="form-control" name="username" required="required" pattern="[A-Za-z0-9]{1,20}"><br>
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
                    <input type="submit" class="btn btn-success toastsDefaultSuccess">
                    <!--    <button type="button" class="btn btn-success toastsDefaultSuccess">
                  Launch Success Toast
                </button> -->
                  </div>
                  </form>
                  <!-- s -->
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row (main row) -->

        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Income Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <?= $headTable ?>
                  <?= $valueTable ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Spending Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                  <?= $headTable ?>
                  <?= $valueTable ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="col-sm-6 float-sm-right">
                  <form action='accounting' method='post'>
                    <?= $optionCategories ?><br>
                </div>
                <div class="col-sm-6 float-sm-right">
                  <?= $optionDate ?>
                </div>
                <div class="col-sm-12 float-sm-right">
                  <?= $resultIncome ?>
                </div>
                <div class="col-sm-6 float-sm-right">
                  <br>
                  <input type='hidden' name='filterC' value='<?= $categories; ?>'>
                  <input type='hidden' name='filterD' value='<?= $date; ?>'>
                  <input type='submit' class="btn btn-primary form-control" value="filter">
                  </form>
                </div>
                <div class="col-sm-6 float-sm-left">
                  <br>
                  <form action='accounting' method='post'>
                    <input type='hidden' name='filterC' value=''>
                    <input type='submit' class="btn btn-secondary form-control" value="reset">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="col-sm-6 float-sm-right">
                  Amount: <?= $resultIncome ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?= $jsFile ?>
  <!-- /.content-wrapper -->