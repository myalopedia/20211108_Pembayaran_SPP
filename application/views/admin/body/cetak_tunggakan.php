<html>
<head>
   <title>Data laporan</title>
   <link href="<?php echo base_url();?>/assets/css/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="<?php echo base_url();?>/assets/css/responsive.css" rel="stylesheet">

    
    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url();?>assets/admin/vendor/bootstrap-4.1/bootstrap.css" rel="stylesheet" media="all">
</head>
 <div class="col-12 m-0 p-5" id="content">
                    <div class="col-12 m-0 pt-3 pb-3">
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <center>
                                <h1 style="font-family:verdana;">Laporan Tunggakan</h1>
                                <p style="font-family:times new roman;">SMK Muhammadiyah 1 Semarang</p>
                                <small style="width: 100%; display: block; text-align: center"><?php if(isset($inp_tgl_awal)) echo date('d F Y', strtotime($inp_tgl_awal))."-".date('d F Y', strtotime($inp_tgl_akhir)); ?></small>
                        </center>
                        </div>
                        <div class="card-body">
                            <table class="table">
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
    <script>
        window.print();
    </script>
                        		    </div>
                        	    </div>
                            </div>
                        </div>

                            <!-- Jquery JS-->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>