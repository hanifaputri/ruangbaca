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
                                        <a class="btn btn-danger" href="<?= base_url('/peminjamanController/deleteCartById/'. $item['rowid']);?>">
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
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">
                            Saya menyetujui syarat dan ketentuan yang berlaku
                        </label>
                    </div>
                </div>
                <button type="submit" name="peminjaman" class="btn btn-block btn-primary">Pinjam Buku</button>
            </div>
            </form>
        </div>
    </div>
                        
        
</div>
<!-- End of Main Content -->

<!-- Start Barcode Script -->
<script src="<?php echo base_url('assets/js/JsBarcode.code128.min.js')?>"></script>
<script>
    let value = document.getElementById("isbn").value;
    let id = "#barcode";

    function initBarcode(value){
        JsBarcode(id, value, {
            width: 1.5,
            height: '30px',
            fontSize: '12px',
            displayValue: true
        });
    }
    window.onload = function() {
        initBarcode(value);
    };
    </script>
            
    
<!-- Header -->
<?php include 'footer.php';?>