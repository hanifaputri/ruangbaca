            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ruangbaca 2021<br/>Alizza Iman Raddin - Ghina Zahirah - Hanifa Putri Rahima.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluar</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin keluar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="<?= base_url('/logout')?>">Keluar</a></a>
                </div>
            </div>
        </div>
    </div>
   
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
            method:'GET',
            dataType:'json',
            success:function(res) {
                $('.badge-total-item').html(res.total_item);
                // location.reload();
                $('#liveToast').toast('show');

                console.log("Data sent success.");
                console.log(res);
            },
            error: function() {
                console.log('Error');
            }
        });
    });

    $('.btn-cart-delete').click(function(){
        let id = $(this).parents('.cart-item').find('.cart-id').val();

        // console.log(id);
        $.ajax({
            url : "<?= base_url('/cartController/remove')?>",
            data:{id : id},
            method:'POST',
            success:function(data) {
                // let currVal = parseInt($('.badge-total-item').text());
                // badge.html(currVal-1);
                // $('.badge-total-item').html(res.total_item);
                // location.reload();
                // $('#liveToast').toast('show');
                $('.cart-content').html(data);
                $('#dropdown-cart').dropdown();

                // console.log($('.cart-content').html());
                console.log("Item = <?= $this->cart->total_items(); ?>");
                console.log("Cart has been deleted.");
            },
            error: function() {
                console.log('Error');
            }
        });
    });
});
</script>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts
    <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script> -->

</body>

</html>