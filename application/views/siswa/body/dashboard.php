        <div class="row mt-20">            
            <div class="col-lg-4 col-md-4 col-sm-12 mt-10">
                <a href="<?php echo base_url('home');?>"><button class="btn-menu active">Pengumuman</button></a>               
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-10">
                <a href="<?php echo base_url('riwayat');?>"><button class="btn-menu">Riwayat Pembayaran</button></a>               
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-10">
                <a href="<?php echo base_url('profil');?>"><button class="btn-menu">Informasi Siswa</button></a>               
            </div>
        </div>

        <div class="row mt-70">
            <div class="col-12">
            <?php echo $this->session->flashdata("msg"); 
                if (!empty($status)) { ?>
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show col-md-6">
                        <span class="badge badge-pill badge-danger">Perhatian</span>
                        Pembayaran Dibatalkan. Cek <a href="<?php echo base_url('riwayat');?>">Riwayat Pembayaran</a>!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
                </div>
            <?php } ?>
                <div class="card">
                    <div class="card-header">
                        Jumlah Pembayaran dengan NIS <?php echo $nis; ?>
                    </div>
                    <div class="card-body">
                        <div class="tagihan">
                            <?php foreach ($data_tagihan as $d) { echo '
                                Pembayaran '.$d->keterangan.' '.$d->ket_tambahan.' Anda adalah Rp '.number_format($d->biaya,0,",",".").'<br>';
                            } ?>
                            <?php if (!empty($data_tagihan)) { ?>
                                Mohon selesaikan pembayaran dan upload bukti pembayaran sebelum <?php $date=date_create($d->batas_waktu); echo date_format($date, 'd F Y'); ?><br>                            
                        </div> 
                        
                        <div class="note">
                            <ul>
                                <li>Pembayaran melalui Bank Jateng 87899097471 a.n. SMK Muhammadiyah 1 Semarang atau melalui Bank Mandiri  8987123472877747 a.n. SMK 1 Muhammadiyah dengan mencantumkan NIS Anda</li>
                                <li>Abaikan pesan ini jika Anda sudah membayar dan sudah upload bukti pembayaran</li>
                            </ul>
                            <?php } else { ?>
                                Belum ada tagihan.
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php if (!empty($data_tagihan)) { ?>
        <div class="row mt-50">
            <div class="section">
                Upload Bukti Pembayaran<br>
                <a href="<?php echo base_url('bayar'); ?>"><button class="btn btn-primary btn-upload">Upload</button></a>
            </div>            
        </div>
    <?php } ?>