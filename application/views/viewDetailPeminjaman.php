<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Header -->
<?php include 'header.php';?>

<!-- Begin Page Content -->
<div class="container-fluid mt-4 p-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-4 text-dark">Detail Peminjaman</h1>
        </div>

    <!-- Content -->
    <div class="col-md-8 mb-4 mx-auto">
        <div class="card mb-4">
            <!-- <div class="card-header justify-content-center font-weight-bold">
                Detail Buku
            </div> -->

            <form method="post" name="peminjaman" action="<?= base_url('/peminjamancontroller/addDataPeminjaman');?>">
            <div class="card-body">
                <!-- List Start -->
                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Buku</th>
                                    <th scope="col">Durasi Peminjaman</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php $i = 0; ?>
                            <?php foreach ($this->cart->contents() as $item): ?>
                                <tr>
                                    <td class="align-middle"><?=($i+1).'.'?></td>
                                    <td class="align-middle">
                                        <input type="hidden" name="idUser[]" value="<?= $this->session->userdata('id')?>" />
                                        <input type="hidden" class="cart-id" name="idRow[]" value="<?= $item['rowid']?>" />
                                        <input type="hidden" name="idBuku[]" value="<?= $item['id']?>" />
                                        <div class="d-sm-flex align-items-center">
                                        <!-- Book Image -->
                                        <div class="mr-3">
                                            <img class="bg-gray-100 rounded border p-1 " style="width:72px;" src="<?= $item['options']['imgUrl'] ?>"/>
                                        </div>
                                        <div class="mr-3 flex-grow-1">
                                            <h6 class="font-weight-bold"><?= $item['name'] ?></h6>
                                            <div class="text-gray-500"><?= $item['options']['penulis'] ?></div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-sm-flex align-items-center mb-2">
                                            <select name="durasi[]" id="inputDurasi" class="form-control d-inline mr-2" style="max-width:75px;">
                                                <option selected>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select><span>hari</span>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a class="btn btn-cart-delete btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                                <tr>
                                    <td class="text-right" colspan="2">
                                        Total Peminjaman
                                    </td>
                                    <td colspan="2">
                                        <?= ($i)?> buku
                                    </td>
                                </tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <!-- List End -->
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing" required>
                        <label class="custom-control-label" for="customControlAutosizing">
                            Saya menyetujui syarat dan ketentuan yang berlaku
                        </label>
                    </div>
                </div>
                <button type="button" data-toggle="modal" data-target="#submitModal" class="btn btn-block btn-primary">Pinjam Buku</button>
                
                <!-- <button type="submit" name="peminjaman" class="btn btn-block btn-primary">Pinjam Buku</button> -->
            
                <!-- Peminjaman Modal-->
                <div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Peminjaman</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah kamu yakin ingin melakukan peminjaman?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                                <button class="btn btn-primary" type="submit">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php include 'footer.php';?>