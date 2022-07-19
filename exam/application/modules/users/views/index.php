<div class="content-wrapper bg-primary">
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>

    <!-- Main content -->
    <div class="card card-solid m-3 bg-secondary rounded">
        <div class="card-body">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="text-black">Users</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-info rounded-pill exportPDF">
                                <span class=""><i class="fa fa-solid fa-file-export"></i></span> Export Records
                            </button>&nbsp;
                            <button type="button" class="btn btn-info rounded-pill addUser" data-bs-toggle="modal" data-bs-target="#modal_addUser">
                                <span class=""><i class="fas fa-plus-circle"></i></span> Add User
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row bg-white p-3">
                <div class="col-12">
                  <table id="usersTable" class="table table-bordered table-striped text-center usersTable">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Full Name</th>
                              <th>Date of Birth</th>
                              <th>Salary</th>
                              <th>Description</th>
                              <th>Job Description</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody></tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->

    <!-- Add User Modal -->
    <div id="modal_addUser" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="icon-user"></i> Add User</h4>
                    
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                        <form class="form_addUser" id="form_addUser" method="post">
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Full Name</label>
                                            <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name Here">
                                            <small class="err"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Date of Birth</label>
                                            <input type="text" class="form-control birthdate" name="birthdate" placeholder="Choose a Date">
                                            <small class="err"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Salary</label>
                                            <input type="text" class="form-control salary" name="salary" placeholder="Enter Salary Here" autocomplete="off">
                                            <small class="err"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea name="description" class="form-control" placeholder="Enter Description Here"></textarea>
                                            <small class="err"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Job Description</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend col-md-3">
                                                    <input type="file" name="job_description" class="form-control job_description" accept=".pdf">
                                                </div>
                                                <input type="text" class="fileSelected form-control" disabled>
                                            </div>
                                            <small class="err"></small>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary btn-sm btn-submits"><i class="fa fa-user"></i> Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div id="modal_updateUser" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="icon-user"></i> Update User</h4>
                    
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                        <form class="form_updateUser" id="form_updateUser" method="post">
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Full Name</label>
                                            <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name Here">
                                            <small class="err"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Date of Birth</label>
                                            <input type="text" class="form-control birthdate" name="birthdate" placeholder="Choose a Date">
                                            <small class="err"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Salary</label>
                                            <input type="text" class="form-control salary" name="salary" placeholder="Enter Salary Here" autocomplete="off">
                                            <small class="err"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea name="description" class="form-control" placeholder="Enter Description Here"></textarea>
                                            <small class="err"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Current Job Description</label>
                                            <input type="text" class="form-control" name="current_job_description" disabled>
                                            <small class="err"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Job Description (Optional)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend col-md-3">
                                                    <input type="file" name="job_description" class="form-control job_description" accept=".pdf">
                                                </div>
                                                <input type="text" class="fileSelected form-control" disabled>
                                            </div>
                                            <small class="err"></small>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <input type="hidden" name="user_id">
                                <button type="submit" class="btn btn-primary btn-sm btn-submits"><i class="fa fa-user"></i> Update User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div> <!-- End of Content Wrapper-->