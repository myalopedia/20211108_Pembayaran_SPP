                        <div class="row m-t-25">
                            <div class="col-md-12">
                                <div class="card" style="padding: 15px; width: 100%;">
                                    <form class="form" action="<?php echo base_url(); echo $url; ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <img src="<?php echo base_url($url_foto);?>" style="height: 100px; width: 100px; border-radius: 100%; padding-bottom: -20px; margin-right: 5px; vertical-align: bottom;">
                                            <input type="file" name="file" id="file">
                                            <input type="hidden" class="form-control" name="foto" id="foto" value="<?php echo $foto; ?>"> 
                                            <br><small>*jpg | jpeg | png. maksimal 5MB</small> 
                                        </div> 
                                        <div class="row">
                                            <div class="col form-group">
                                                <label>NIS</label>
                                                <?php if ($ket=='edit') { ?>
                                                    <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $nis; ?>" readonly>
                                                <?php } else { ?> 
                                                    <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $nis; ?>" required>
                                                <?php } ?>
                                            </div>
                                            <div class="col form-group">
                                                <label>Tahun Masuk</label>
                                                <input type="text" class="form-control" id="angkatan" name="angkatan" value="<?php echo $angkatan; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">                                        
                                            <div class="col-8 form-group">
                                                <label>Nama Siswa</label>
                                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?php echo $nama_siswa; ?>" required>
                                            </div>
                                            <div class="col-4 form-group">
                                                <label>Jenis Kelamin</label>
                                                <?php echo form_dropdown('jk',$dd_jk, $id_jk, ' id="jk" required class="form-control"');?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label>Kelas</label>
                                                <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $kelas; ?>" required>
                                            </div>
                                            <div class="col form-group">
                                                <label>Jurusan</label>
                                                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $jurusan; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" required>
                                            </div>
                                            <div class="col form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control" id="alamat" name="alamat" required><?php echo $alamat; ?></textarea>
                                            </div>
                                            <div class="col form-group">
                                                <label>No. Handphone</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">+62</span>
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>" required>
                                                </div>
                                                <div class="row">
                                                <div class="col form-group">
                                                <label>No. Handphone Orang Tua</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">+62</span>
                                                    <input type="text" class="form-control" id="no_hp_ortu" name="no_hp_ortu" value="<?php echo $no_hp_ortu; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($ket == 'edit') { ?>
                                        <div class="form-group">
                                            <label>Password</label><br>                                            
                                                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#smallmodal">
                                                Ganti Password?</button>                                            
                                        </div> 
                                        <?php } ?>                                       
                                        <hr>
                                        <!-- <div class="text-right"> -->
                                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                                            <a href="<?php echo base_url('admin/siswa');?>" class="btn btn-danger">BATAL</a>
                                        <!-- </div> -->
                                    </form>
                        	    </div>
                            </div>
                        </div>


                        <!-- modal small -->
			<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true" data-backdrop="false">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="smallmodalLabel">Ganti Password</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form" action="<?php echo base_url('admin/siswa/ganti_password');?>" method="post">
                                <input type="hidden" class="form-control" id="nis" name="nis" value="<?php echo $nis; ?>">
                                <input type="password" class="form-control" id="pass_baru" name="pass_baru" placeholder="Password Baru" required>                            
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
                            </form>
					</div>
				</div>
			</div>