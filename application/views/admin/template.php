<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?> | Panel Admin Pembayaran SPP</title>
    <?php $this->view($head); ?>
</head>

<body class="animsition">
    <div class="page-wrapper">
    <?php $this->view($menu); ?>

    <!-- PAGE CONTAINER-->
    
    <div class="page-container">
        	<!-- MAIN CONTENT-->
            <div class="main-content">
            	<div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1"><?php echo $title; ?></h2>                                    
                                </div>
                            </div>
                        </div>
                        <?php $this->view($content); ?>
                    </div>
                </div>
            </div>

        </div>

    </div>

        <?php $this->view($foot); ?>

</body>
</html>