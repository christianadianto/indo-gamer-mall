<?php
    include_once 'header.php';
    require_once '../controller/VoucherController.php';
    require_once '../controller/VoucherDetailController.php';
    require_once '../controller/CartController.php';

    if(!isset($_GET['id'])){
        header("Location:index.php");
    }

    $voucher_id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addtocart'])){
        if(!isset($_SESSION['user'])){
            header("Location:login.php");
        }
        $cartController = new CartController();
        $quantity = $_POST['quantity'];
        $voucher_type_id = "";
        if(isset($_POST['voucher_type'])){
            $voucher_type_id = $_POST['voucher_type'];
        }
        $data = [
            'quantity'=>$quantity,
            'voucher_type_id'=>$voucher_type_id,
            'voucher_id'=>$voucher_id,   
        ];
        $cartController->insert($data);
    }
    else if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['buynow'])){
        echo ('abc');
    }
    
  
    $voucher_controller = new VoucherController();
    $voucher_detail_controller = new VoucherDetailController();

    $voucher = $voucher_controller->get($voucher_id);
    $voucher_details = $voucher_detail_controller->index($voucher_id);
    $err = "";
    if(isset($_SESSION['err'])){
        $err=$_SESSION['err'];
        unset($_SESSION['err']);
// ?>
<div class="alert alert-danger" role="alert" style="text-align:center">
    <?=$err?>
</div>
<?php
    }
?>
<div class="voucher-detail-section section">
    <div class="voucher-detail-container container">
        <form action="voucherDetail.php?id=<?=$voucher_id?>" method="POST">
            <div class="voucher-row row">
                <div class="product-col col-8">
                    <div class="row">
                        <div class="col-2">
                            <img src="../asset/image/<?=$voucher['image_detail']?>" alt="<?=$voucher['name']?>">
                        </div>
                        <div class="col-10 align-self-center">
                            <span><?=$voucher['name']?></span>
                        </div>
                    </div>
                    <hr/>
                    <div class="voucher-type row">
                        <div class="col">
                            <?php
                                for($i=0;$i<count($voucher_details);$i++){
                                    $voucher_detail = $voucher_details[$i];
                            ?>
                                <div class="form-check">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio<?=$i+1?>" name="voucher_type" value=<?=$voucher_detail['id']?> class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio<?=$i+1?>">
                                            <?=$voucher_detail['type']?>
                                        </label>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <div class="payment-col col-4">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter qty">
                    </div>
                    <!-- <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Buy Now" name="buynow">
                    </div> -->
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add to cart" name="addtocart">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    include_once 'footer.php';
?>