                        <div class="row m-t-25">
                            <div class="col-md-12">
                                <?php echo $this->session->flashdata("msg");?>   
                                <div class="card" style="padding: 25px; width: 100%;"> 
                                    <div class="row">
                                        <div class="col-md-3" style="border-right: 1px solid #666; font-size: 13px;">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="profil-tab" data-toggle="pill" href="#profiltab" role="tab" aria-controls="profil" aria-selected="true">Profil <span class="iconify" style="margin-left: 5px;" data-icon="bx:bx-user"></span></a>
                                                <a class="nav-link" id="ganti-password-tab" data-toggle="pill" href="#ganti-password" role="tab" aria-controls="ganti-password" aria-selected="false">Ganti Password <span class="iconify" style="margin-left: 5px;" data-icon="teenyicons:password-outline"></span></a>
                                            </div>
                                        </div>
                                        <div class="col-md-8" style="margin-left: 20px; font-size: 14px;">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="profiltab" role="tabpanel" aria-labelledby="profil-tab">
                                                    <form class="form" action="<?php echo base_url('admin/akun/update');?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <img src="<?php echo base_url($url_foto);?>" style="height: 100px; width: 100px; padding-bottom: -20px; margin-right: 5px; vertical-align: bottom;">
                                                            <input type="file" name="file" id="file">
                                                            <input type="hidden" class="form-control" name="foto" id="foto" value="<?php echo $foto; ?>"> 
                                                            <br><small>*jpg | jpeg | png. maksimal 5MB</small> 
                                                        </div>  
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" class="form-control" name="id" id="id" value="<?php echo $username; ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Admin</label>
                                                            <input type="text" class="form-control" name="nama_admin" id="nama_admin" value="<?php echo $nama_admin; ?>">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Level</label>
                                                            <select id="disabledSelect" name="level" id="level" class="form-select form-control" required>
                                                                <option value="">Select User</option>
                                                                <option value="0" <?php if($level == '0') echo "selected"; ?>>User</option>
                                                                <option value="1" <?php if($level == '1') echo "selected"; ?>>Admin</option>
                                                            </select>
                                                        </div>
                                                        <div style="margin-top: 20px;">
                                                            <button type="submit" class="btn btn-sm btn-success">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="ganti-password" role="tabpanel" aria-labelledby="ganti-password-tab">
                                                    <form class="form" action="<?php echo base_url('admin/akun/ganti_password');?>" method="post">
                                                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>"> 
                                                        <div class="form-group">
                                                            <label>Password Baru</label>
                                                            <input type="password" class="form-control" name="new_pass" id="new_pass">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Konfirmasi Password Baru</label>
                                                            <input type="password" class="form-control" name="confirm_pass" id="confirm_pass">
                                                        </div>
                                                        <div style="margin-top: 20px;">
                                                            <button type="submit" class="btn btn-sm btn-success">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        	    </div>
                            </div>
                        </div>