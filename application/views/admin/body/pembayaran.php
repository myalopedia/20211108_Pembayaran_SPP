                        <div class="row m-t-25">
                            <div class="col-md-8">
                                <div class="card" style="padding: 20px; width: 100%;">
                        		    <div class="table-responsive">
                        			    <table class="table table-striped" id="dataTable" style="font-size: 14px;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-left">Tanggal Pembayaran</th>
                                                    <th class="text-left">NISN</th>
                                                    <th class="text-left">Nama Siswa</th>
                                                    <th class="text-left">Status</th>
                                                    <th class="text-left"></th>
                                                </tr>
                                            </thead>
                        				    <tbody>
<?php $no=1; foreach($data_bayar as $d) { $status=$d->status; ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td class="text-left"><?php echo $d->tgl_pembayaran; ?></td>
                                                    <td class="text-left"><?php echo $d->nis; ?></td>
                                                    <td class="text-left"><?php echo $d->nama_siswa; ?></td>
                                                    <td class="text-left">
                                                        <?php if($status==1){echo '<p style="color: #3A74E5;">Approved</p>';} elseif($status==2){echo '<p style="color: #B8332B;">Dibatalkan</p>';} ?>
                                                    </td>
                                                    <td class="text-left" style="font-size: 18px;">                                                                                                            
                                                        <button type="button" data-toggle="modal" data-target="#smallmodal<?php echo $d->id_pembayaran;?>">
                                                            <span class="iconify" data-icon="akar-icons:info" style="color: #3AB2E5;"></span>
                                                        </button>                                                 
                                                    </td>
                                                </tr> 
                                                
                                                    <!-- modal detail -->
													<div class="modal fade" id="smallmodal<?php echo $d->id_pembayaran;?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true" data-backdrop="false">
														<div class="modal-dialog modal-lg" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="smallmodalLabel">Pembayaran <?php echo $d->id_pembayaran; ?></h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
                                                                    <div class="row" style="margin-bottom: 10px;">
                                                                        <div class="col-3">Tanggal Pembayaran</div>
                                                                        <div class="col-8"><?php echo $d->tgl_pembayaran;?></div>
                                                                    </div>
                                                                    <div class="row" style="margin-bottom: 10px;">
                                                                        <div class="col-3">NIS</div>
                                                                        <div class="col-8"><?php echo $d->nis;?></div>
                                                                    </div>
                                                                    <div class="row" style="margin-bottom: 10px;">
                                                                        <div class="col-3">Nama Siswa</div>
                                                                        <div class="col-8"><?php echo $d->nama_siswa;?></div>
                                                                    </div>
                                                                    <div class="row" style="margin-bottom: 10px;">
                                                                        <div class="col-3">Total Tagihan</div>
                                                                        <div class="col-8">Rp <?php echo number_format($d->total_tagihan,0,',','.'); ?></div>
                                                                    </div>
                                                                    <div class="row" style="margin-bottom: 10px;">
                                                                        <div class="col-3">Status</div>
                                                                        <div class="col-8"><?php if($status==1){echo '<p style="color: #3A74E5;">Approved</p>';} elseif($status==2){echo '<p style="color: #B8332B;">Dibatalkan</p>'; echo $d->keterangan;} ?></div>
                                                                    </div>
																	<p>Bukti Pembayaran</p>
																	<br><img src="<?php echo base_url('uploads/bukti/'.$d->bukti); ?>">
																</div>
															</div>
														</div>
													</div>
<?php } ?>                                                      
                                            </tbody>
                        			    </table>
                        		    </div>
                        	    </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="padding: 20px; width: 100%;">
                                    <div class="row">
                                        <div class="col"><b>Siswa yang belum bayar</b></div>
                                        <div class="col">
                                            <div class="text-right tambah"><a href="<?php echo base_url();?>admin/pembayaran/blast"><button class="btn btn-sm btn-primary">
                                            <span class="iconify icon" data-icon="akar-icons:whatsapp-fill"></span> Umumkan</button></a></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="scroll">
<?php $no=1; foreach($data_belum_bayar as $b) { ?>                                        
                                        <div  class="row">
                                            <div class="col-3 text-right"><img src="<?php echo base_url('uploads/siswa/'.$b->foto); ?>" style="width: 35px; height: 35px; border-radius: 100%;"></div>
                                            <div class="col-8 text-left" style="font-size: 14px; font-weight: 200px; vertical-align: middle;"><?php echo $b->nama_siswa;?></div>
                                        </div>
                                        <hr>
<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>