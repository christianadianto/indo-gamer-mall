<?php
    include_once 'header.php';
    require_once '../controller/TransactionController.php';
    require_once '../controller/CartController.php';
    require '../middleware/customer.php';

    $total = 0;

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['checkout'])){
        $transaction_controller = new TransactionController();
        $transaction_controller->insert();
    }
    else if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['remove'])){
        $cart_controller = new CartController();
        $cart_controller->remove($_POST['voucher_type_id']);
    }
    else if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['clear'])){
        $cart_controller = new CartController();
        $cart_controller->clear($_POST['voucher_type_id']);
    }
?>
    <div class="cart-section section">
        <div class="cart-container container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!isset($_SESSION['cart'])){
                            ?>
                            <tr>
                                <td colspan="4" style="text-align:center">You have not put any item into cart</td>
                            </tr>
                            <?php
                        }
                        else{
                            foreach($_SESSION['cart'] as $cart){
                                $total += ($cart['price']*$cart['quantity']);
                            ?>
                            <tr>
                                <td><?=$cart['type']?></td>
                                <td><?=$cart['quantity']?></td>
                                <td>Rp<?=$cart['price']?></td>
                                <td>Rp<?=$cart['price']*$cart['quantity']?></td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="voucher_type_id" value="<?=$cart['voucher_type_id']?>">
                                        <input class="btn btn-primary" type="submit" value="remove" name="remove">
                                        <input class="btn btn-primary" type="submit" value="clear" name="clear">
                                    </form>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                    ?>
                </tbody>    
            </table>
        </div>
        <?php
            if(isset($_SESSION['cart'])){
        ?>
        <div class="result-container container">
                <form action="cart.php" method="POST">
                    <table class="table">                    
                        <tr>
                            <th colspan="4">
                                <span>Total Rp<?=$total?></span>
                                <input type="submit" class="btn btn-primary" name="checkout" value="checkout">
                            </th>      
                        </tr>
                    </table>
                </form>
        </div>
        <?php
            }
        ?>
    </div>

<?php
    include_once 'footer.php';
?>