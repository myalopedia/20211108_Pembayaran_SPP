
              <div class="col-12 m-0 p-5" id="content">
                    <?php
                    if($this->session->userdata('level_admin') == 1)
                    {
                    ?>
                    <div class="col-12 m-0 pt-3 pb-3">
                        <form class="row g-3" target="_blank" method="POST" action="<?php echo base_url(); ?>admin/cetak/cetak_tunggakan">
                            <input type="hidden" name="filter" <?php if(isset($inp_tgl_awal)) echo "value='true'"; else echo "value='false'"; ?>>
                            
                            <input type="hidden" name="angkatan" <?php if(isset($angkatan)) echo "value='".$angkatan."'"; ?> class="form-control" id="inputEmail4" required>
                            
                            <input type="hidden" name="jurusan" <?php if(isset($jurusan)) echo "value='".$jurusan."'"; ?> class="form-control" id="inputPassword4" required>
                            
                            <button type="submit" class="btn btn-success btn-sm"><span class="iconify" data-icon="bytesize:print"></span> Cetak</button>
                        </form>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="col-12 m-0 p-0">
                        <form class="row g-3" method="POST" action="<?php echo base_url(); ?>admin/tunggakan">
                            <input type="hidden" name="filter" value="true">
                            <div class="col-md-4">
                                <label for="inputEmail4" class="form-label">Tahun Angkatan</label>
                                <select class="form-control" name="angkatan" required>
                                    <option value="" selected>-- Pilih Angkatan --</option>
                                    <?php
                                    foreach ($get_angkatan as $ga) {
                                    ?>
                                    <option value="<?php echo $ga->angkatan ;?>" <?php if(isset($angkatan) && $angkatan == $ga->angkatan) echo 'selected'; ?>><?php echo $ga->angkatan ;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputEmail4" class="form-label">Tahun Jurusan</label>
                                <select class="form-control" name="jurusan" required>
                                    <option value="" selected>-- Pilih Jurusan --</option>
                                    <?php
                                    foreach ($get_jurusan as $gj) {
                                    ?>
                                    <option value="<?php echo $gj->jurusan ;?>" <?php if(isset($jurusan) && $jurusan == $gj->jurusan) echo 'selected'; ?>><?php echo $gj->jurusan ;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4 row">
                                <div class="col-6">
                                    <label for="inputPassword4" class="form-label mt-3"></label>
                                    <input type="submit" class="btn btn-primary form-control">
                                </div>
                                <?php if(isset($angkatan))
                                {
                                ?>
                                <div class="col-6">
                                    <label for="inputPassword4" class="form-label mt-3"></label>
                                    <a href="<?php echo base_url(); ?>admin/tunggakan/" class="btn btn-danger form-control">Reset</a>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="card-body">
                            <table class="table table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Total Tunggakan(Rp)</th>
                                    <th>Tahun Angkatan</th>
                                    <th>Batas Waktu</th>
                                </tr>

<?php $no=1; foreach($data_bayar as $d) {?>
                            
                                                     <td class="text-center"><?php echo $no++; ?></td>
                                                    <td class="text-left"><?php echo $d->nis; ?></td>
                                                    <td class="text-left"><?php echo $d->nama_siswa; ?></td>
                                                    <td class="text-left">Rp <?php echo number_format($d->biaya,0,',','.'); ?></td>
                                                    <td class="text-left"><?php echo $d->angkatan; ?></td>
                                                     <td class="text-left"><?php echo date('d F Y', strtotime($d->batas_waktu)); ?></td>   
                                                    </td>
                                                </tr> 
<?php } ?>                                                      
                                            </tbody>
                     			    </table>
                        		    </div>
                        	    </div>
                            </div>
                        </div>