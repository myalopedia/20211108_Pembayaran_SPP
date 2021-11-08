                        <div class="row m-t-35">
							<div class="col-md-9">
							<?php echo $this->session->flashdata("msg");?>
								<div class="card">
									<div class="card-header">
										<h4>Transaksi Baru</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped">
												<thead>
													<!-- <tr> -->
														<th>No</th>
														<th>Tanggal</th>
														<th>NIS</th>
														<th>Nama Siswa</th>
														<th>Total Tagihan(Rp)</th>
														<th></th>
													<!-- </tr> -->
												</thead>
												<tbody style="font-size: 14px;">
<?php $no=1; foreach($data_bayar_baru as $d) { ?>
													<tr>
														<td><?php echo $no++;?></td>
														<td class="text-left"><?php echo $d->tgl_pembayaran; ?></td>
														<td class="text-left"><?php echo $d->nis; ?></td>
														<td class="text-left"><?php echo $d->nama_siswa; ?></td>
														<td class="text-left"><?php echo number_format($d->total_tagihan,0,',','.'); ?></td>
														<td>
															<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#smallmodal">
                                                            	Lihat Detail
                                                        	</button>
														</td>
													</tr>

													<!-- modal approve -->
													<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true" data-backdrop="false">
														<div class="modal-dialog modal-lg" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="smallmodalLabel">Pembayaran <?php echo $d->id_pembayaran; ?></h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<p>Total Tagihan : Rp <?php echo number_format($d->total_tagihan,0,',','.'); ?></p>
																	<br><img src="<?php echo base_url('uploads/bukti/'.$d->bukti); ?>">
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#batalmodal" data-dismiss="modal">Tidak Sesuai</button>
																	<a href="<?php echo base_url('admin/pembayaran/approve/'.$d->id_pembayaran);?>" class="btn btn-primary">Approve</a>
																</div>
															</div>
														</div>
													</div>

													<!-- modal batal -->
													<div class="modal fade" id="batalmodal" tabindex="-1" role="dialog" aria-labelledby="batalmodalLabel" aria-hidden="true" data-backdrop="false">
														<div class="modal-dialog modal-sm" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="batalmodalLabel">Pembayaran <?php echo $d->id_pembayaran; ?></h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form" action="<?php echo base_url('admin/pembayaran/dibatalkan');?>" method="post">
                                                                    <input type="hidden" id="id_pembayaran" name="id_pembayaran" value="<?php echo $d->id_pembayaran; ?>">
                                                                    Keterangan: <textarea class="form-control" id="keterangan" name="keterangan" style="min-height: 100px;"></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                                            </div>
																</form>
                                                        </div>
                                                    </div>
<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									<div class="card-body">
										<h5 style="padding-top: 10px;">Profil</h5>
										<div class="text-center" style="margin-top: 8px; margin-bottom: 20px;">
											<img src="<?php echo base_url('uploads/admin/'.$foto_admin);?>" class="rounded-circle" style="width: 80px; height: 80px; margin-bottom: 8px;">
											<h6><?php echo $nama_admin; ?></h6>
											<small>Admin</small><br>
											<a href="<?php echo base_url('admin/akun/profil/'.$id_admin);?>"><button class="btn btn-primary" style="padding: 4px 40px; font-size: 14px; margin-top: 5px;">Edit Profil</button></a>
										</div>
									</div>
								</div>
								
								<div class="card" style="background-color: #00783E; color: #fff;">
									<div class="card-body">
										<h6 style="padding-top: 15px; color: #fff;">Jumlah Siswa Belum Bayar</h6>
										<span style="font-size: 60px; font-weight: 750;"><?php echo $jml_belum_bayar; ?></span><span style="font-size: 28px; font-weight: 600; margin-left: 5px;">siswa</span>
									</div>
								</div>
							</div>
                        </div>