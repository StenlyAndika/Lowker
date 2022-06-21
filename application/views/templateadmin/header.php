<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="description" content="simple style template">
    <meta name="author" content="Stenly Andika">

    <!-- Title Page-->
    <title>Bursa Kerja Online Kota Sungai Penuh</title>

    <!-- Bootstrap CSS-->
    <link href="<?= base_url() ?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Datatables CSS -->
    <link href="<?= base_url() ?>/lib/datatables/datatables.css" rel="stylesheet">
    
    <!-- Datepicker CSS -->
    <link href="<?= base_url() ?>/lib/datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
	
    <!-- Main CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/lib/style.css">

    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet"/>
</head>
<body>
	<div class="menu-container">
		<div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <div class="userimg">
                            <img src="<?= base_url('img/Logo.png')?>" />
                        </div>
                    </a>
                </li>
                
                <?php if ( $this->session->userdata('idm') != NULL ) { ?>
                    <li>
                        <a href="<?= base_url() ?>member">
                            <span class="icon"><i class="fa-solid fa-house"></i></span>
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>perusahaan">
                            <span class="icon"><i class="fa-solid fa-building"></i></span>
                            <span class="title">Perusahaan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>lowongan">
                            <span class="icon"><i class="fa-solid fa-file-contract"></i></span>
                            <span class="title">Lowongan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>member/profil">
                            <span class="icon"><i class="fa-solid fa-user"></i></span>
                            <span class="title">Profil</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>auth/logout">
                            <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                            <span class="title">Keluar</span>
                        </a>
                    </li>
                <?php } elseif ( $this->session->userdata('username') != NULL ) { ?>
                    <li>
                        <a href="<?= base_url() ?>admin">
                            <span class="icon"><i class="fa-solid fa-house"></i></span>
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>perusahaan">
                            <span class="icon"><i class="fa-solid fa-building"></i></span>
                            <span class="title">Perusahaan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>lowongan">
                            <span class="icon"><i class="fa-solid fa-file-contract"></i></span>
                            <span class="title">Lowongan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/profil">
                            <span class="icon"><i class="fa-solid fa-user"></i></span>
                            <span class="title">Profil</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>auth/logout">
                            <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                            <span class="title">Keluar</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
		</div>
	</div>

	<div class="menu-bar">
		<div class="topbar">
			<div class="toggle">
				<i class="fa-solid fa-bars"></i>
			</div>
			<div class="menu-title">
                <?php if ( $this->session->userdata('idm') != NULL ) { ?>
                    <h4>MEMBER AREA</h4>
                <?php } elseif ( $this->session->userdata('username') != NULL ) { ?>
                    <h4>ADMIN AREA</h4>
                <?php } ?>
			</div>
		</div>
	</div>

    <div class="main-content">