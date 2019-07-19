<?php
    include_once 'header.php';
    session_start();
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
                            for($i=0;$i<count($_SESSION['cart']);$i++){
                            ?>
                            <tr>
                                <td></td>
                            </tr>
                            <?php
                            }
                        }
                    ?>
                </tbody>    
            </table>
        </div>
    </div>

<?php
    include_once 'footer.php';
?>