<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Masuk</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="img"><img src="https://www.scandinavian-architects.com/images/Projects/86/09/24/a41ec9bb699e4a7ba5fbe10e4c524517/a41ec9bb699e4a7ba5fbe10e4c524517.6e7b65d0.jpg?1591773146" style="height:360px;widt:500px" /></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Masuk</h1>
                                    </div>
                                    <form method="post">
                                        <table width="300" align="center" border="0" cellspacing="5" cellpadding="5">
                                            <tr>
                                                <td colspan="2"><?php echo @$error; ?></td>
                                            </tr>

                                            <tr>
                                                <td width="100">Email</td>
                                                <td width="329"><input required type="text" class="form-control" name="EMAIL_USER" /></td>
                                            </tr>

                                            <tr>
                                                <td>Password </td>
                                                <td><input required type="password" class="form-control" name="PASSWORD_USER" /></td>
                                            </tr>
                                            <?php echo $this->session->flashdata('pesan') ?>
                                            <tr>
                                                <td colspan="2" align="right">
                                                    <input style="height:45px;width:200px" type="submit" name="Login" class="btn btn-primary" value="Masuk" />
                                                </td>
                                            </tr>
                                        </table>
                                    </form>

                                    <div class="mt-4">
                                        <span>Belum punya akun? <a href="<?= base_url('/register') ?>">Daftar</a></span>
                                    </div>

                                    <!-- Bootstrap core JavaScript-->
                                    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
                                    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                                    <!-- Core plugin JavaScript-->
                                    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

                                    <!-- Custom scripts for all pages-->
                                    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>
</body>

</html>