<div class="row mt-20">            
    <div class="col-lg-4 col-md-4 col-sm-12 mt-10">
        <a href="<?php echo base_url('home');?>"><button class="btn-menu">Pengumuman</button></a>               
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 mt-10">
        <a href="<?php echo base_url('riwayat');?>"><button class="btn-menu">Riwayat Pembayaran</button></a>               
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 mt-10">
        <a href="<?php echo base_url('profil');?>"><button class="btn-menu active">Informasi Siswa</button></a>               
    </div>
</div>

<div class="row mt-70">
    <div class="col-12">
    <?php echo $this->session->flashdata("msg");?>
        <div class="card">
            <div class="card-body profil">                
                <form class="form mb-50" action="<?php echo base_url('profil/save');?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mt-30">
                        <img src="<?php echo base_url($url_foto);?>" style="height: 100px; width: 100px; border-radius: 100%; padding-bottom: -20px; margin-right: 5px; vertical-align: bottom;">
                        <input type="file" name="file" id="file">
                        <input type="hidden" class="form-control" name="foto" id="foto" value="<?php echo $foto; ?>"> 
                        <br><small>*jpg | jpeg | png. maksimal 5MB</small> 
                    </div> 
                    <h4 style="color: #01793F; margin-top: 20px; margin-bottom: 30px;">Data Siswa</h4>
                    <div class="row">
                        <div class="col form-group">
                            <label>NIS</label>
                            <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $nis; ?>" readonly>
                        </div>
                         <div class="col form-group">
                            <label>NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $nisn; ?>" readonly>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?php echo $nama_siswa; ?>" required>
                        </div>
                        <div class="col form-group">
                            <label>Tahun Masuk</label>
                            <input type="text" class="form-control" id="angkatan" name="angkatan" value="<?php echo $angkatan; ?>" readonly>
                        </div>
                    </div>
                    <div class="col form-group">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jk" class="form-control" id="exampleFormControlSelect1">
                              <option value="Laki-laki" <?php if($jk == 'Laki-laki') echo "selected"; ?>>Laki-laki</option>
                              <option value="Perempuan" <?php if($jk == 'Perempuan') echo "selected"; ?>>Perempuan</option>
                            </select>
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
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>" required>
                        </div>
                        <div class="col form-group">
                            <label>No. Handphone</label>
                            <div class="input-group">
                                <span class="input-group-addon">+62</span>
                                <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>" required>
                            </div>
                            <div class="row">
                        <div class="col form-group">
                            <label>No. Handphone Orang Tua</label>
                            <div class="input-group">
                                <span class="input-group-addon">+62</span>
                                <input type="number" class="form-control" id="no_hp_ortu" name="no_hp_ortu" value="<?php echo $no_hp_ortu; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-10">
                            <button type="button" class="btn btn-secondary btn-upload" data-toggle="modal" data-target="#smallmodal">
                                Ganti Password?</button> 
                        </div>
                        <div class="col mt-10">
                            <button type="sumbit" class="btn btn-primary btn-upload">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>                
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
							<form class="form" action="<?php echo base_url('profil/ganti_password');?>" method="post">
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