<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Header -->
<?php include 'header.php';?>

<!-- Begin Page Content -->
<div class="container-fluid mt-4 p-4">
    <!-- Content -->
    <div class="col-md-8 mb-4 mx-auto">
        <div class="card mb-4">
            <form method="post" action="<?= base_url('peminjamanController/addToPeminjaman')?>">
            <div class="row card-body book-item">
                <?php foreach($buku as $b) : ?>
                <input class="id-buku" type="hidden" value="<?= $b->ID_BUKU?>"/>

                <div class="col-lg-12 mb-3">
                    <h3><?= $b->JUDUL_BUKU?></h3>
                    <!-- Availability -->
                    <?php 
                        if ($b->STATUS_BUKU=='Tersedia') {
                            echo "<span class='badge mb-2 badge-success'>Tersedia</span>";
                        } else {
                            echo "<span class='badge mb-2 badge-danger'>Sedang Dipinjam</span>";
                        }
                    ?>
                </div>
                <div class="col-lg-4 text-center">
                    <img class="rounded img-thumbnail" style="width:100%" src="<?= $b->URL_IMG_BUKU?>"/>
                </div>
                <div class="col-lg-8">
                    <table class="table table-striped">
                        <tr>
                            <td>Penulis</td>
                            <td><?= $b->PENULIS?></td>
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
                        <tr>
                            <td>ISBN</td>
                            <td>
                                <input id="isbn" type="hidden" value="<?= $b->ISBN?>"/>
                                <svg id="barcode" jsbarcode-value="<?= $b->ISBN?>"></svg>
                            </td>
                        </tr>
                    </table>

                    <!-- Button Pinjam -->
                    <?php
                        $isOnCart = false;
                        if ($this->cart->total_items()!== 0){
                            foreach ($this->cart->contents() as $item){
                                if ($item['id']== $b->ID_BUKU){
                                    $isOnCart = true;
                                } 
                            }
                        } ?>
                        
                        <?php if ($isOnCart):?>
                            <input class="id-buku" type="hidden" value="<?= $b->ID_BUKU?>"/>
                            <button class="btn btn-cart-delete btn-block btn-danger ml-2 flex-fill">
                                <i class="fas fa-trash mr-2"></i>Hapus
                            </button>
                        <?php else:?>
                            <button class="btn btn-pinjam btn-block btn-primary ml-2 flex-fill" <?=($b->STATUS_BUKU=='Tersedia')? '' : 'disabled';?>>
                                <i class="fas fa-plus mr-2"></i>Pinjam
                            </button>
                        <?php endif;?>
                   
                </div>
                <?php endforeach; ?>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Main Content -->
            
<!-- Footer -->
<?php include 'footer.php';?>

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