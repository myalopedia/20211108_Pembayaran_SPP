<div class="row mt-20">            
    <div class="col-lg-4 col-md-4 col-sm-12 mt-10">
        <a href="<?php echo base_url('home');?>"><button class="btn-menu">Pengumuman</button></a>               
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 mt-10">
        <a href="<?php echo base_url('riwayat');?>"><button class="btn-menu active">Riwayat Pembayaran</button></a>               
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 mt-10">
        <a href="<?php echo base_url('profil');?>"><button class="btn-menu">Informasi Siswa</button></a>               
    </div>
</div>

<div class="row mt-70">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <th class="text-green">No</th>
                            <th class="text-green">Tanggal</th>
                            <th class="text-green">Keterangan</th>
                            <th class="text-green">Total Tagihan</th>
                            <th class="text-green">Status</th>
                            <th></th>
                        </thead>
                        <tbody>
<?php $no=1; foreach ($data_riwayat as $d) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo$d->tgl_pembayaran; ?></td>
                                <td><?php echo$d->deskripsi; ?></td>
                                <td>Rp <?php echo$d->total_tagihan; ?></td>
                                <td>
                                    <?php if ($d->status==0) {echo 'Ditinjau';} elseif($d->status==1) { echo 'Approved';} elseif($d->status==2) { echo 'Dibatalkan';} ?>
                                </td>
                                <td class="text-left" style="font-size: 18px;">                                                                                                            
                                    <button type="button" class="btn btn-t" data-toggle="modal" data-target="#smallmodal<?php echo $d->id_pembayaran;?>">
                                        <span class="iconify" data-icon="akar-icons:info" style="color: #3AB2E5;"></span>
                                    </button>                                                 
                                </td>
                            </tr>

                                                    <!-- modal detail -->
													<div class="modal fade" id="smallmodal<?php echo $d->id_pembayaran;?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true" data-backdrop="false">
														<div class="modal-dialog" role="document">
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
                                                                        <div class="col-3">Deskripsi</div>
                                                                        <div class="col-8"><?php echo $d->deskripsi;?></div>
                                                                    </div>
                                                                    <div class="row" style="margin-bottom: 10px;">
                                                                        <div class="col-3">Status</div>
                                                                        <div class="col-8"> <?php 
                                                                            if($d->status==0){echo 'Ditinjau';} 
                                                                            elseif($d->status==1){echo '<span style="color: #3A74E5;">Approved</span>';} 
                                                                            elseif($d->status==2){echo '<p style="color: #B8332B;">Dibatalkan</p>'; echo $d->keterangan; echo '<br><a href="'.base_url().'bayar/edit/'.$d->id_pembayaran.'" class="btn btn-danger btn-upload">Edit Pembayaran</a>'; } ?>
                                                                        </div>
                                                                    </div>
																	<p>Bukti Pembayaran</p>
																	<br><img src="<?php echo base_url('uploads/bukti/'.$d->bukti); ?>" width="300" height="auto">
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
    </div>
</div>