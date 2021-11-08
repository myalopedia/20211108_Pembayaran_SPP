<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?> | Pembayaran SPP</title>
    <?php $this->view($head); ?>
</head>
<body>
    <div class="container">
        <div class="account-wrap">
            <div class="dropdown">
                <button class="btn btn-t dropdown-toggle" type="button" data-toggle="dropdown">
                    <img src="<?php echo base_url('uploads/siswa/'.$foto_siswa);?>" class="img-nav" style=""> <?php echo $nama_siswa; ?>
                </button>
                
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url('profil');?>"><span class="iconify icon" data-icon="gg:profile"></span>Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url('login/logout');?>"><span class="iconify icon" data-icon="ant-design:logout-outlined"></span>Logout</a>
                </div>
            </div>
        </div>
									

        <?php $this->view($body); ?> 
    
    </div>

    <?php $this->view($foot); ?> 

</body>
</html> 