                        <div class="row m-t-25">
                            <div class="col-md-12">
                                <?php echo $this->session->flashdata("msg");?>
                                <div class="card" style="padding: 20px; width: 100%;">
                                    <div class="text-right tambah">
                                        <a href="<?php echo base_url();?>admin/siswa/tambah"><button class="btn btn-primary btn-tambah">
                                            Tambah</button></a>
                                    </div>
                        		    <div class="table-responsive">
                        			    <table class="table table-striped" id="dataTable" style="font-size: 14px;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-left">NIS</th>
                                                    <th class="text-left">Nama Siswa</th>
                                                    <th class="text-left">Kelas</th>
                                                    <th class="text-left">Jurusan</th>
                                                    <th class="text-left">Jenis Kelamin</th>
                                                    <th class="text-left">Tempat, Tanggal Lahir</th>
                                                    <th class="text-left">Alamat</th>
                                                    <th class="text-left">No. Handphone</th>
                                                    <th class="text-left">No. Handphone OrangTua</th>
                                                    <th class="text-left">Action</th>
                                                </tr>
                                            </thead>
                        				    <tbody>
<?php $no=1; foreach($data_siswa as $d) { 
    $date=date_create($d->tgl_lahir); ?>            
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td class="text-left"><?php echo $d->nis; ?></td>
                                                    <td class="text-left"><?php echo $d->nama_siswa; ?></td>
                                                    <td class="text-left"><?php echo $d->kelas; ?></td>
                                                    <td class="text-left"><?php echo $d->jurusan; ?></td>
                                                    <td class="text-left"><?php echo $d->jk; ?></td>
                                                    <td class="text-left"><?php echo $d->tempat_lahir.', '.date_format($date,"d F Y"); ?></td>
                                                    <td class="text-left"><?php echo $d->alamat; ?></td>
                                                    <td class="text-left"><?php echo $d->no_hp; ?></td>
                                                    <td class="text-left"><?php echo $d->no_hp_ortu; ?></td>
                                                    <td class="text-left" style="font-size: 18px;">                                                                                                              
                                                        <a href="<?php echo base_url('admin/siswa/edit/'.$d->nis); ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="iconify" data-icon="bx:bx-edit" style="color: #FFB763;"></span></a>
                                                        <a href="<?php echo base_url('admin/siswa/hapus/'.$d->nis); ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><span class="iconify" data-icon="fluent:delete-24-filled" style="color: #ED3338;"></span></a>                                                       
                                                    </td>
                                                </tr> 
<?php } ?>                                                      
                                            </tbody>
                        			    </table>
                        		    </div>
                        	    </div>
                            </div>
                        </div>