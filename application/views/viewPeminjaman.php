<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    .jumbotron-top {
        background: #FC466B; 
        background: -webkit-linear-gradient(to right, #3F5EFB, #FC466B); 
        background: linear-gradient(to right, #3F5EFB, #FC466B); 
    }
</style>
<!-- Begin Page Content -->
<!-- Page Heading -->
<div class="jumbotron-top  d-flex flex-column justify-content-center align-items-center p-4">
    <div class="p-4">
        <h1 class="h1 text-light font-weight-bold text-center">Mau cari buku apa?</h1>
    </div>   
    <div class="bg-gray-100 rounded shadow-lg p-3 mb-4">
        <!-- Topbar Search -->
        <form class="form-inline navbar-search" method="get" action="<?= base_url() ?>home/search">
            <div class="input-group">
                <input type="text" name="q" class="form-control bg-white border-0 small" placeholder="Cari buku"
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <select class="custom-select border-0" id="inputGroupSelect02">
                        <option selected>Semua Kategori</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container-fluid p-4">
    <?php 
    $key = $this->input->get('q');
        if ($key){
            $res = sizeof($buku);
    ?>
    <div class="d-sm-flex align-items-center justify-content-left">
        <p>Menampilkan <?=$res;?> hasil pencarian "<?=$key;?>"</p>
    </div>
    <?php 
        }
    ?>

    <!-- Content Row -->
    <div class="row mt-4">

        <!-- Book -->
        <?php foreach($buku as $b) : ?>
        <div class="col-xl-2 col-md-3 col-sm-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-body p-3">
                    <img style="height:240px; width:100%; object-fit: cover;" class="mb-4 img-thumbnail" src="<?= $b->URL_IMG_BUKU?>" />
                    <span class="badge badge-secondary mb-2"><?= $b->NAMA_KATEGORI?></span>
                    <h6 class="font-weight-bold text-gray-900"><?= $b->JUDUL_BUKU?></h6>
                    <p class="m-0"><?php echo ($b->STATUS_BUKU=='Tersedia')? "<span>Tersedia</span>": "<span class='text-danger'>Tidak Tersedia</span>"; ?></p>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('/peminjaman/' . $b->ID_BUKU);?>">
                    <button type="button" class="btn btn-block btn-primary" <?php echo ($b->STATUS_BUKU=='Tersedia')? '' : 'disabled';?> >Pinjam Buku</button>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

</div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

   
    