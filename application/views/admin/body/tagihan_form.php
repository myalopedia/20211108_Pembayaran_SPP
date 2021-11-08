                        <div class="row m-t-25">
                            <div class="col-md-12">
                                <div class="card" style="padding: 50px; width: 100%;">
                                    <form class="form-horizontal" action="<?php echo base_url(); echo $url; ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2" for="email">Tahun Angkatan</label>
                                            <div class="col-sm-10">
                                                <input type="type" class="form-control" id="angkatan" name="angkatan" value="<?php echo $angkatan; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2" for="biaya">Biaya</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control" id="biaya" name="biaya" value="<?php echo $biaya; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2" for="email">Keterangan</label>
                                            <!-- <div class="col-sm-3"><?php echo form_dropdown('ket',$dd_ket, $id_ket, ' id="ket" required class="form-control"');?></div>                                             -->
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="keterangan" name="keterangan" style="min-height: 150px;"><?php echo $keterangan; ?></textarea>
                                            </div>
                                        </div>
                                        <hr>
                                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                                            <a href="<?php echo base_url('admin/tagihan');?>" class="btn btn-danger">BATAL</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <script>
                            document.getElementById("ket").onchange = function() {myFunction()};

                            function myFunction() {
                                var x = document.getElementById("ket").value;
                                if ( x = 2 ) {
                                    document.getElementById('keterangan').style.visibility = "visibile";
                                } else {
                                    document.getElementById('keterangan').style.display = "none";
                                }
                            }
                        </script> -->