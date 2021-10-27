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
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- jQuery -->
<script type="text/javascript">
$(document).ready(function(){
    $('#liveToastBtn').click(function(){
        // var text_val = $('#first').find('#second_child').html();
        console.log('Masuk');
    });

    // Add to Cart 
    $('.btn-pinjam').click(function(){
        let id = $(this).parents('.book-item').find('.id-buku').val();
        // console.log(id);

        $.ajax({
            url : "<?= base_url('/cartController/add')?>",
            data:{id : id},
            method:'POST',
            success:function(data) {
                let totalData = parseInt(<?= $this->cart->total_items();?>);
                // $('.badge-total-item').html(totalData);
                // $('.cart-content').html(data);
                // $('.dropdown-toggle').dropdown();
                location.reload();
                // $('#liveToast').toast('show');

                console.log(totalData);
                console.log("Data successfully added.");
            },
            error: function() {
                console.log('Error');
            }
        });
    });

    $('.btn-cart-delete').click(function(){
        let id = $('.cart-id').val();
        // let id = $(this).parents('.cart-item').find('.cart-id').val();

        // console.log(id);
        $.ajax({
            url : "<?= base_url('/cartController/remove')?>",
            data:{id : id},
            method:'POST',
            success:function(data) {
                // $('.cart-content').html(data);
                // $('.dropdown-toggle').dropdown();
                location.reload();
                // console.log($('.cart-content').html());
                console.log("Item = <?= $this->cart->total_items(); ?>");
                console.log("Cart has been deleted.");
            },
            error: function() {s
                console.log('Error');
            }
        });
    });
});
</script>
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
                                <span class="badge badge-total-item badge-success ml-2"><?=$this->cart->total_items() ?></span>
                                <!-- </button> -->
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Daftar Peminjaman
                                </h6>
                                <div class="cart-content">
                                    <?php include 'cart.php'; ?>
                                </div>

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