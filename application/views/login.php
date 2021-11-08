<!DOCTYPE html>
<html>
<head>
	<title>Login | Pembayaran SPP</title>
    <?php $this->view($head); ?>
</head>

<body class="animsition" style="background: url('<?php echo base_url('assets/img/bg-login.png');?>');">
	<div class="page-wrapper" style="background: url('<?php echo base_url('assets/img/bg-login.png');?>');">
        <div class="container">
            <div class="login-wrap">
                <?php echo $this->session->flashdata("msg");?>
                    <div class="login-content">
                        <div class="login-form">
                            <div class="text-center">
                                <label><b>Selamat Datang! Silahkan Login.</b></label>
                            </div>
                            <br>
                            <form class="form" action="<?php echo base_url($url); ?>" method="post">
                                <div class="form-group">
                                    <label for="username">username</label>
                                    <input type="text" class="form-login" id="username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">password</label>
                                    <input type="password" class="form-login" id="password" name="password">
                                </div>
                                <button class="btn btn-block btn-primary" style="margin-top: 50px; border-radius: 10px;" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
		
	</div>

	<?php $this->view($foot); ?>

</body>
</html>