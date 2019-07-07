<?php

include_once 'header.php';
require '../controller/VoucherController.php';

$voucherController = new VoucherController();
$vouchers = $voucherController->index();
?>
<div class="section">
    <?php
        $total_row_voucher = ceil(count($vouchers) / 3);
        for($i=0;$i<$total_row_voucher;$i++){
            ?>
            <div class="container card-container">
                <div class="card-deck">
                    <?php
                        for($j=$i*3;$j<$i+3;$j++){
                            $voucher = $vouchers[$j];
                            ?>
                            <div class="card text-center">
                                <div class="card-body">
                                    <a href="voucherDetail.php?id=<?=$voucher['id']?>"><img src="../asset/image/<?=$voucher['image']?>" alt="<?=$voucher['name']?>"></a>
                                </div>
                                <div class="card-footer-custom">
                                    <span><?=$voucher['name']?></span>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>    
            <?php
        }
    ?>
</div>

<?php
include_once 'footer.php';
?>