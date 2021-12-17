<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Header -->
<?php include 'header.php';?>

<!-- Begin Page Content --> 
<div class="container-fluid mt-4 p-4">

    <!-- Page Heading --> 
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-4 text-dark">Riwayat Peminjaman</h1>
    </div>

    <!-- Content -->
    <div class="col-md-8 mb-4 mx-auto">
        <div class="card mb-4">
            <form method="post" name="pengembalian">
            <div class="card-body">
                <!-- List Start --> 
                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">ID Peminjaman</th>
                                    <th scope="col">Nama Buku</th>
                                    <th scope="col">Tanggal Peminjaman</th>
                                    <th scope="col">Tanggal Pengembalian</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ($pengembalian as $item): ?>
                                <tr>
                                    <td class="align-middle"><?=($i+1)."."?></td>
                                    <td class="align-middle">
                                        <input type="hidden" name="idUser[]" value="<?= $this->session->userdata('id')?>" />
                                        <input type="hidden" name="idBuku[]" value="<?= $item->ID_BUKU ?>" />
                                        <div class="d-sm-flex align-items-center">

                                        <!-- ID Peminjaman -->
                                        <div class="mr-3">
                                            <h6 class="font-weight-bold"><?= $item->ID_PEMINJAMAN ?></h6>
                                        </div>
                                    </td>

                                    <!-- Book Image -->
                                    <td class="align-middle">
                                        <div class="mr-3">
                                            <img class="bg-gray-100 rounded border p-1 " style="width:72px;" src="<?= $item->URL_IMG_BUKU ?>"/>
                                        </div>
                                        <div class="mr-3 flex-grow-1">
                                            <h6 class="font-weight-bold"><?= $item->JUDUL_BUKU ?></h6>
                                            <div class="text-gray-500"><?= $item->PENULIS ?></div>
                                        </div>
                                    </td>
                                    </td>

                                    <!-- Borrowed Date -->
                                    <td class="align-middle">
                                        <h6 class="font-weight-bold"><?= $item->TGL_PINJAM ?></h6>
                                    </td>

                                    <!-- Returned Date -->
                                    <td class="align-middle">
                                        <h6 class="font-weight-bold"><?= $item->TGL_KEMBALI ?></h6>
                                    </td>

                                    <!-- Duration -->
                                    <td class="align-middle">
                                        <h6 class="font-weight-bold"><?= $item->DURASI_PEMINJAMAN ?></h6>
                                    </td>

                                    <!-- Status -->
                                    <td class="align-middle">
                                        <div><h6 class="font-weight-bold"><?= $item->STATUS_PENGEMBALIAN ?></h6></div>
                                    </td>

                                    <!-- Return Book -->
                                    <td class ="align-middle">
                                        <a href="<?= base_url('pengembalian/'.$item->ID_PEMINJAMAN);?>" >
                                        <?php 
                                            if ($item->TGL_KEMBALI != null) {
                                                echo "<button disabled type='button' name='pengembalian' class='btn btn-block btn-primary'>Kembalikan</button>";
                                            } else {
                                                echo "<button type='button' name='pengembalian' class='btn btn-block btn-primary'>Kembalikan</button>";
                                            }
                                        ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </form>    
            </div>
        </div>
    </div>
