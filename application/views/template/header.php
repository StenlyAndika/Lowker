<!DOCTYPE html>
<html>
	<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="description" content="simple style template">
    <meta name="author" content="Stenly Andika">

    <!-- Title Page-->
    <title>Bursa Kerja Online Kota Sungai Penuh</title>

    <!-- Tab Icon -->
    <link rel="icon" href="<?= base_url() ?>/img/logo.png">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url() ?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Datatables CSS -->
    <link href="<?= base_url() ?>/lib/datatables/datatables.css" rel="stylesheet">

    <!-- Datepicker CSS -->
    <link href="<?= base_url() ?>/lib/datepicker/css/bootstrap-datepicker.css" rel="stylesheet">

    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet"/>

    <!-- Custom Style -->
    <link href="<?= base_url() ?>/lib/customstyle.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>/lib/sailor/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/lib/sailor/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>/lib/sailor/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/lib/sailor/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/lib/sailor/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>/lib/sailor/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>/lib/sailor/css/style.css" rel="stylesheet">

	</head>
	<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
        <h1 class="Logo">
          <a class="navbar-brand" href="<?= base_url() ?>"><img style="	width: 350px;" src="<?= base_url() ?>img/logo-header.png"></a>
        </h1>
        <nav id="navbar" class="navbar">
          <ul>
            <li>
              <button type="button" class="btn active" data-toggle="modal" data-target="#modallogin"><strong>Login</strong></button>
              <button type="button" class="btn getstarted ml-auto"  data-toggle="modal" data-target="#modaldaftar"><strong>Daftar</strong></button>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
      </div>
    </header><!-- End Header -->
    <main id="main">