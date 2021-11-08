                        <div class="row m-t-25">
                            <div class="col-md-12">
                                <div class="card" style="padding: 40px 70px; width: 100%;">
                                    <form class="form" action="<?php echo base_url(); echo $url; ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <img src="<?php echo base_url($url_foto);?>" style="height: 100px; width: 100px; border-radius: 100%; padding-bottom: -20px; margin-right: 5px; vertical-align: bottom;">
                                            <input type="file" name="file" id="file">
                                            <br><small>*jpg | jpeg | png. maksimal 5MB</small> 
                                        </div> 
                                        <div class="form-group">
                                            <label>ID Admin</label>
                                            <input type="text" class="form-control" name="id_admin" id="id_admin" value="<?php echo $id_admin; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Admin</label>
                                            <input type="text" class="form-control" name="nama_admin" id="nama_admin">
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select id="disabledSelect" name="level" class="form-select form-control" required>
                                                <option value="">Select User</option>
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" id="password">
                                        </div>
                                        <hr>
                                        <div class="text-right">
                                            <button type="submit" class="btn au-btn--green">SIMPAN</a>
                                        </div>
                                    </form>
                        	    </div>
                            </div>
                        </div>