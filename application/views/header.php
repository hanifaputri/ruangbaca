<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar fixed-top shadow">
                    <!-- Logo -->
                    <div class="d-sm-inline-block">
                    <a href="<?= base_url() ?>">
                        <img class="img-fluid" style="height:32px;" src="<?php echo base_url() ?>assets/img/logo_horizontal.png" />
                    </a>
                    </div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link text-dark dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <i class="fas fa-bell fa-fw"></i> -->
                                <!-- <button type="button" class="btn btn-info"> -->
                                    Daftar Peminjamanmu
                                <!-- Counter - Alerts -->
                                <span class="badge badge-success ml-2"><?= sizeOf($this->cart->contents()) ?></span>
                                <!-- </button> -->
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Daftar Peminjaman
                                </h6>
                                <!-- List Start -->
                                <?php $i = 0; ?>
                                <?php foreach ($this->cart->contents() as $item): ?>
                                    <a class="dropdown-item d-flex align-items-center">
                                        <!-- Book Image -->
                                        <div class="mr-3">
                                            <img class="bg-gray-100 rounded border p-1 " style="width:72px;" src="<?= $item['options']['imgUrl'] ?>"/>
                                        </div>
                                        <div class="mr-3 flex-grow-1">
                                            <h6 class="font-weight-bold"><?= $item['name'] ?></h6>
                                            <div class="text-gray-500"><?= $item['options']['penulis'] ?></div>
                                        </div>
                                        <div>
                                            <button class="btn btn-danger"
                                            onClick="window.location='<?= base_url('/peminjamanController/deleteCartById/'. $item['rowid']);?>'"
                                            >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </a>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                                
                                <?php if ($i==0):?>
                                    <!-- Empty State -->
                                    <div class="d-flex flex-column align-items-center" href="#">
                                        <img style="width:128px;" src="<?php echo base_url("assets/img/empty_cart.png"); ?>" />
                                        <p>Tidak ada peminjaman</p>
                                    </div>
                                <?php endif; ?>

                                <!--
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                -->
                                <a style="cursor:pointer;" class="dropdown-item text-center small text-gray-500"
                                onClick="window.location='<?= base_url('/peminjamancontroller/viewdetailpeminjaman');?>'">
                                    Lihat Semua Peminjaman
                                </a>
                               <!-- /peminjamanController/resetCart -->
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama');?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url() ?>assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Buffer -->
                <div style="height:65px"></div>