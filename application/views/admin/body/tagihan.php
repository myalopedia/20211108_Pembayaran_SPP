                        <div class="row m-t-25">
                            <div class="col-md-12">
                                <?php echo $this->session->flashdata("msg");?>
                                <div class="card" style="padding: 20px; width: 100%;">
                                    <div class="text-right tambah">
                                    <a href="<?php echo base_url();?>admin/tagihan/tambah"><button class="btn btn-primary btn-tambah">
                                            Tambah</button></a>
                                    </div>
                        		    <div class="table-responsive">
                        			    <table class="table table-striped" id="dataTable" style="font-size: 14px;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-left">Tahun Angkatan</th>
                                                    <th class="text-left">Biaya Tagihan (Rp)</th>
                                                    <th class="text-left">Action</th>
                                                </tr>
                                            </thead>
                        				    <tbody>
<?php $no=1; foreach($data_tagihan as $d) { $id_tagihan = $d->id; ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td class="text-left"><?php echo $d->angkatan; ?></td>
                                                    <td class="text-left"><?php echo number_format($d->biaya,0,",","."); ?></td>
                                                    <td class="text-left" style="font-size: 18px;">
                                                        <a href="<?php echo base_url('admin/tagihan/hapus/'.$d->id); ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><span class="iconify" data-icon="fluent:delete-24-filled" style="color: #ED3338;"></span></a>
                                                        <a href="<?php echo base_url('admin/tagihan/edit/'.$d->id); ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="iconify" data-icon="bx:bx-edit" style="color: #FFB763;"></span></a> 
                                                    <?php 
                                                        $ket = $this->M_admin->ket($id_tagihan);
                                                        if($ket == 0) { ?> 
                                                            <button type="button" data-toggle="modal" data-target="#smallmodal<?php echo $d->id?>">
                                                                <span class="iconify" data-icon="logos:whatsapp"></span>
                                                            </button>
                                                        <?php } ?>                                                   
                                                    </td>
                                                </tr> 

            <!-- modal small -->
            <div class="modal fade" id="smallmodal<?php echo $d->id?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true" data-backdrop="false">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="smallmodalLabel">Blast Tagihan Angkatan <?php echo $d->angkatan; ?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form" action="<?php echo base_url('admin/tagihan/blast');?>" method="post">
                                <input type="text" class="form-control" id="id" name="id" value="<?php echo $d->id; ?>">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $d->keterangan; ?>">
                                <label>Deadline Bayar</label>
                                <input type="date" class="form-control" id="batas_waktu" name="batas_waktu" required>                            
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
                            </form>
					</div>
				</div>
			</div>
<?php } ?>                                                      
                                            </tbody>
                        			    </table>
                        		    </div>
                        	    </div>
                            </div>
                        </div>