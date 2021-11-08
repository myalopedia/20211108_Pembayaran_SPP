                        <div class="row m-t-25">
                            <div class="col-md-12">
                                <?php echo $this->session->flashdata("msg");?>
                                <div class="card" style="padding: 20px; width: 100%;">
                                    <div class="text-right tambah">
                                    <a href="<?php echo base_url();?>admin/akun/tambah"><button class="btn btn-primary btn-tambah">
                                            Tambah</button></a>
                                    </div>
                        		    <div class="table-responsive">
                        			    <table class="table table-striped" id="dataTable" style="font-size: 14px;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-left">Foto</th>
                                                    <th class="text-left">Username</th>
                                                    <th class="text-left">Nama Admin</th>
                                                    <th class="text-left">Level</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                        				    <tbody>
<?php $no=1; foreach($data_admin as $d) { ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td class="text-left"><img src="<?php echo base_url('uploads/admin/'.$d->foto);?>" style="width: 35px; height: 35px;"></td>
                                                    <td class="text-left"><?php echo $d->id_admin; ?></td>
                                                    <td class="text-left"><?php echo $d->nama_admin; ?></td>
                                                    <td>
                                                        <?php
                                                        if($d->level == 0)
                                                            echo "User";
                                                        else 
                                                            echo "Admin";
                                                        ?>
                                                    </td>
                                                        
                                                    <td class="text-center" style="font-size: 18px;">
                                                        <a href="<?php echo base_url('admin/akun/profil/'.$d->id_admin); ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="iconify" data-icon="bx:bx-edit" style="color: #FFB763;"></span></a>
                                                        <a href="<?php echo base_url('admin/akun/hapus/'.$d->id_admin); ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><span class="iconify" data-icon="fluent:delete-24-filled" style="color: #ED3338;"></span></a>
                                                    </td>
                                                </tr> 
<?php } ?>           
                                            </tbody>
                        			    </table>
                        		    </div>
                        	    </div>
                            </div>
                        </div>