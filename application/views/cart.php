<!-- List Start -->
<?php foreach ($this->cart->contents() as $item): ?>
    <a class="cart-item dropdown-item d-flex align-items-center">
        <!-- Book Image -->
        <div class="mr-3">
            <input type="hidden" class="cart-id" value="<?=$item['rowid']?>" />
            <img class="bg-gray-100 rounded border p-1 " style="width:72px;" src="<?= $item['options']['imgUrl'] ?>"/>
        </div>
        <div class="mr-3 flex-grow-1">
            <h6 class="font-weight-bold"><?= $item['name'] ?></h6>
            <div class="text-gray-500"><?= $item['options']['penulis'] ?></div>
        </div>
        <div>
            <button class="btn btn-cart-delete btn-danger"><i class="fas fa-trash"></i></button>
        </div>
    </a>
<?php endforeach; ?>

<?php if ($this->cart->total_items()==0):?>
    <!-- Empty State -->
    <div class="d-flex flex-column align-items-center" href="#">
        <img style="width:128px;" src="<?php echo base_url("assets/img/empty_cart.png"); ?>" />
        <p>Tidak ada peminjaman</p>
    </div>
<?php endif; ?>
<!-- List End-->