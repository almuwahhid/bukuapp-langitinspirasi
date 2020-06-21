<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/concept/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="assets/css/style-skripsi.css">
    <title>Aplikasi Manage Buku</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html"><img src="assets/images/hope.png" alt="" style="height:40px;width:40px;margin-top:-5px" class="user-avatar-md">&nbsp;Manage Buku App</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/admin.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?= $data['account']->nama ?></h5>
                                </div>
                                <a class="dropdown-item" href="admin/ubahpassword"><i class="fas fa-cog mr-2"></i>Ubah Password</a>
                                <a class="dropdown-item" href="admin/logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div> -->
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu <span style="margin-left:10px" class="badge badge-secondary"><?= $_SESSION['level'] ?></span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php if($data['page'] == "dashboard")echo " active";?> " href="index.php"><i class="fas fa-home"></i>Dashboard</a>
                            </li>
                            <?php
                            if($_SESSION['level'] == "admin" || $_SESSION['level'] == "penulis"){
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link<?php if($data['page'] == "buku" || $data['page'] == "bukupenulis" )echo " active";?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-book"></i>Buku </a>
                                <!-- <span class="badge badge-success">6</span> -->
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?hal=buku">Daftar Buku</a>
                                        </li>
                                        <?php
                                        if($_SESSION['level'] == "admin"){
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?hal=buku&&action=tambah">Tambah Buku</a>
                                        </li>
                                        <?php
                                        }?>
                                    </ul>
                                </div>
                            </li>
                            <?php
                            }?>
                            <?php
                            if($_SESSION['level'] == "admin"){
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link<?php if($data['page'] == "artikel")echo " active";?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-users"></i>Manage Penulis </a>
                                <!-- <span class="badge badge-success">6</span> -->
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?hal=penulis">Daftar Penulis</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?hal=penulis&action=tambah">Tambah Penulis</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php
                            }?>
                            <?php
                            if($_SESSION['level'] == "pemilik"){
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link<?php if($data['page'] == "admin")echo " active";?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-users"></i>Manage Admin </a>
                                <!-- <span class="badge badge-success">6</span> -->
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?hal=admin">Daftar Admin</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?hal=admin&action=tambah">Tambah Admin</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php
                            }?>
                            <li class="nav-item ">
                                <a class="nav-link<?php if($data['page'] == "royalti")echo " active";?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fab fa-sellsy"></i>Royalti </a>
                                <!-- <span class="badge badge-success">6</span> -->
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?hal=royalti">Daftar Penjualan Buku</a>
                                        </li>
                                        <?php
                                        if($_SESSION['level'] == "admin"){
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?hal=royalti&action=tambah">Tambah Penjualan Buku</a>
                                        </li>
                                        <?php
                                        }?>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php if($data['page'] == "pengaturan")echo " active";?> " href="index.php?hal=pengaturan"><i class="fas fa-cogs"></i>Pengaturan</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="index.php?action=logout"><i class="fa fa-fw fa-toggle-on"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
