<div id="myLogin"  class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <ul class="nav mt-2">
                                            <li class="mr-3 active"><a aria-controls="home" role="tab" data-toggle="tab" href="#huhu"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                                            <li><a aria-controls="hihi" role="tab" data-toggle="tab" href="#hihi"><i class="fa fa-user-plus"></i> Đăng ký</a></li>
                                        </ul>
                      
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="group-tabs">
                            
                            <div class="tab-content">
                            <div class="tab-pane active" id="huhu">
                          <p id="errLogin" class="text-danger"></p>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                              <label>Mật khẩu</label>
                              <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input">
                              <label class="form-check-label">Nhớ mật khẩu?</label>
                            </div><br>
                            <button class="btn btn-primary" id="xt-login">Đăng nhập</button>
                        </div>
                        <!-- è -->
                        <div class="tab-pane" id="hihi">
                          <p id="errSignup" class="text-danger"></p>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email2">
                            </div>
                             <div class="form-group">
                              <label>Họ và tên</label>
                              <input type="text" class="form-control" name="fullname2">
                            </div>
                            <div class="form-group">
                              <label>Mật khẩu</label>
                              <input type="password" class="form-control" name="password2">
                            </div>

                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="check">
                              <label class="form-check-label small">Tôi đã đọc <a href="#">điều khoản (F.A.Q)</a></label>
                            </div><br>
                            <button class="btn btn-primary" id="xt-signup">Đăng Ký</button>
                        </div>
                        <!-- èhw -->
                      </div>
                    </div>
                      </div>
                    </div>
                  </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
            