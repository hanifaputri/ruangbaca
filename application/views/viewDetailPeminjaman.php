<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
                <!-- Begin Page Content -->
                <div class="container-fluid mt-8 p-4">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h2 mb-4 text-dark">Detail Peminjaman</h1>
                     </div>

                    <!-- Content -->
                    <div class="col-md-8 mb-4 mx-auto">
                        <div class="card mb-4">
                            <div class="card-header justify-content-center font-weight-bold">
                                Detail Buku
                            </div>

                            <form method="post" action="<?= base_url('peminjamanController/addToPeminjaman')?>">
                            <div class="row card-body">
                                <?php foreach($buku as $b) : ?>
                                <div class="col-md-4 text-center">
                                    <img class="rounded img-thumbnail" style="width:100%" src="<?= $b->URL_IMG_BUKU?>"/>
                                </div>
                                <div class="col-md-8">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>Judul Buku</td>
                                            <td>
                                                <input id="idBuku" name="idBuku" type="hidden" value="<?= $b->ID_BUKU?>"/>
                                                <?= $b->JUDUL_BUKU?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ISBN</td>
                                            <input id="cardJob" type="hidden" value="Tes"/>
                                            <td><?= $b->ISBN?></td>
                                        </tr>
                                        <tr>
                                            <td>Penerbit</td>
                                            <td><?= $b->NAMA_PENERBIT?></td>
                                        </tr>
                                        <tr>
                                            <td>Kategori</td>
                                            <td><?= $b->NAMA_KATEGORI?></td>
                                        </tr>
                                        <tr>
                                            <td>Bahasa</td>
                                            <td><?= $b->NAMA_BAHASA?></td>
                                        </tr>
                                    </table>

                                        <div class="form-row mb-2">
                                            <label for="inputDurasi" class="col-md-8 col-form-label">
                                                Masukkan durasi<br/>peminjaman
                                            </label>
                                            <div class="col-md-4">
                                                <select name="durasi" id="inputDurasi" class="form-control d-inline mr-2" style="width:100px;">
                                                    <option selected>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                </select> <span>hari</span>
                                            </div>
                                        </div> 
                                        <div class="form-row">
                                        <button data-toggle="modal" data-target="#submitModal" type="button" class="btn btn-block btn-primary">Pinjam Buku</button>

                                        </div>

                                        <!-- Logout Modal-->
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
                                <?php endforeach; ?>
                            </div>
                            </form>
                        </div>
                    </div>
                                        

                </div>
                        
            </div>
            <!-- End of Main Content -->

            

            
