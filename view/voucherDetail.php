<?php
    include_once 'header.php';
    require_once '../controller/VoucherController.php';
    require_once '../controller/VoucherDetailController.php';
    $voucher_id = $_GET['id'];
    $voucher_controller = new VoucherController();
    $voucher_detail_controller = new VoucherDetailController();

    $voucher = $voucher_controller->get($voucher_id);
    $voucher_details = $voucher_detail_controller->get($voucher_id);
// ?>

<div class="voucher-detail-section section">
    <div class="voucher-detail-container container">
        <form action="">
            <div class="voucher-row row">
                <div class="product-col col-8">
                    <div class="row">
                        <div class="col-3">
                            <img src="../asset/image/<?=$voucher[0]['image_detail']?>" alt="<?=$voucher[0]['name']?>">
                        </div>
                        <div class="col=9 align-self-center">
                            <span><?=$voucher[0]['name']?></span>
                        </div>
                    </div>
                </div>
                <div class="payment-col col-4">
                    <span>
                        testing
                    </span>
                </div>
            </div>
            <div class="voucher-type row">
                <div class="col">
                    <?php
                         for($i=0;$i<count($voucher_details);$i++){
                            $voucher_detail = $voucher_details[$i];
                    ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                <?=$voucher_detail['type']?>
                            </label>
                        </div>
                    <?php
                         }
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    include_once 'footer.php';
?>