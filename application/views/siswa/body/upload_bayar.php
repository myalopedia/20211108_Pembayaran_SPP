        <div class="row mt-50">
            <!-- <div class="section"> -->
                <div class="col-lg-8 col-md-10 col-11 mx-auto">
                    <div class="row">
                        <div class="col-sm-1"><a href="<?php echo base_url('home');?>"><span class="iconify" data-icon="akar-icons:arrow-left" style="color: grey; font-size: 24px;"></span></a></div>
                        <div class="col-sm-11 text-center">Silakan Upload Bukti Pembayaran</div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-body" style="padding: 50px;">
                            <form class="form-horizontal" action="<?php echo base_url($url);?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id_pembayaran;?>" readonly>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="NIS">NIS</label> 
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $nis;?>" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="Nama">Nama Siswa</label> 
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama_siswa;?>" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="Total Tagihan">Total Tagihan</label> 
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="number" class="form-control" id="tagihan" name="tagihan" value="<?php echo $tagihan;?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="Nama">Keterangan</label> 
                                    <div class="col-sm-9">
                                        <?php if($ket == 'upload') { ?>
                                            <textarea class="form-control" id="keterangan" name="keterangan"><?php foreach ($keterangan as $k) { echo $k->keterangan.' '.$k->ket_tambahan.';'; }?> </textarea>
                                        <?php } elseif($ket == 'edit') { ?>
                                            <textarea class="form-control" id="keterangan" name="keterangan"><?php echo $keterangan; ?> </textarea>
                                        <?php } ?>
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="Upload">Upload Bukti</label> 
                                    <div class="col-sm-9">
                                        <input type="file" id="file" name="file">
                                        <input type="hidden" id="bukti" name="bukti" value="<?php echo $bukti; ?>">
                                    </div>
                                </div>
                                <br>
                                <!-- <div class="form-group row"> -->
                                    <div style="align: right;">
                                        <button type="submit" class="btn btn-sm btn-primary btn-upload">Kirim</button>
                                        <a href="<?php echo base_url('home');?>" class="btn btn-sm btn-secondary btn-upload">Batal</a>
                                    </div>
                                <!-- </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>