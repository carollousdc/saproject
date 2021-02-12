      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">Upload Profile Picture</h3>
                          </div>
                          <div class="card-body">
                              <div class="row margin">
                                  <div class="col-lg-6">
                                      <form action="profile/aksi" method="post" enctype="multipart/form-data">
                                          <input type="file" name="file" class="form-control">
                                          <input class="btn btn-block btn-danger form-control rounded" type="submit" name="upload" value="Upload">
                                      </form>
                                      <table>
                                          <tr>
                                              <td><?= $showImage ?></td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>