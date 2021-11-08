        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <!-- <div style="font-size: 21px; padding-left: 10px;">
                            Panel Admin
                        </div> -->
                        <img src="<?php echo base_url('assets/img/logo.png');?>">
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <?php
                        if($level_admin == 1)
                        {
                        ?>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/dashboard">
                                <span class="iconify icon" data-icon="radix-icons:dashboard"></span>Dashboard</a>                            
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/pembayaran">
                                <span class="iconify icon" data-icon="uil:invoice"></span>Data Pembayaran</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/siswa">
                                <span class="iconify icon" data-icon="la:file-invoice"></span>Data Siswa</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/tagihan">
                                <span class="iconify icon" data-icon="grommet-icons:announce"></span>Data Tagihan</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/laporan">
                                <span class="iconify icon" data-icon="carbon:report"></span>Laporan</a>
                        </li>
                        <?php
                        if($level_admin == 1)
                        {
                        ?>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/akun">
                                <span class="iconify icon" data-icon="ant-design:user-outlined"></span>User Admin</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/login/logout">
                                <span class="iconify icon" data-icon="ls:logout"></span>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
        
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <img src="<?php echo base_url('assets/img/logo.png');?>">
            </div>
            <div class="dropdown-divider"></div>
            <div class="akun">
                <table border="0">
                    <tr>
                        <td rowspan="2"><img src="<?php echo base_url('uploads/admin/'.$foto_admin);?>" class="img-akun"></td>
                        <td class="line" style="width: 90px; border-bottom: 1px solid #E5E5E5;"><a href="<?php echo base_url('admin/akun/profil/'.$id_admin);?>"><span class="iconify icon" data-icon="gg:profile"></span>Profil</a></td>
                    </tr>
                    <tr>
                        <td class="line"><a href="<?php echo base_url();?>admin/login/logout"><span class="iconify icon" data-icon="teenyicons:logout-outline"></span>Logout</a></td>
                    </tr>
                </table>
            </div>
            <div class="dropdown-divider"></div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <?php
                        if($level_admin == 1)
                        {
                        ?>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/dashboard">
                                <span class="iconify icon" data-icon="radix-icons:dashboard"></span>Dashboard</a>                            
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/pembayaran">
                                <span class="iconify icon" data-icon="uil:invoice"></span>Data Pembayaran</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/siswa">
                                <span class="iconify icon" data-icon="la:file-invoice"></span>Data Siswa</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/tagihan">
                                <span class="iconify icon" data-icon="grommet-icons:announce"></span>Data Tagihan</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/laporan">
                                <span class="iconify icon" data-icon="carbon:report"></span>Laporan</a>
                        </li>
                        <?php
                        if($level_admin == 1)
                        {
                        ?>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/akun">
                            <span class="iconify icon" data-icon="ant-design:user-outlined"></span>User Admin</a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->