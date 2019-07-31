<?php
    include_once 'header.php';
    require_once '../controller/TransactionController.php';
    if(!isset($_SESSION['user'])){
        return header('Location:../view/index.php');
    }
    $role = $_SESSION['user']['roles'];

    $transactionController = new TransactionController();
    $transactions = $transactionController->index();

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['approve'])){
       $id=$_POST['id'];
       $transactionController->update($id);
    }
?>
    <div class="transaction-section section">
        <div class="transaction-container container">
        <?php
            foreach($transactions as $transaction){
        ?>
            <div class="row">
                <div class="col">
                    <span>#<?=$transaction['id']?>:</span>
                    <span><?=$transaction['date']?></span>
                    <?php
                        if($role == "admin"){
                    ?>
                    <span style="margin-left:20px">Username: <?=$transaction['username']?></span>
                    <?php
                        }
                    ?>
                    <span style="margin-left:20px">Status: <?=$transaction['status']?></span>
                    <?php
                        if($role == "admin" && $transaction['status'] == 'not approved'){
                    ?>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?=$transaction['id']?>">
                        <input type="submit" name="approve" value="approve" class="btn btn-primary" style="float:right">
                    </form>
                    <?php
                        }
                    ?>
                </div>
                <?php
                    foreach($transaction['detail'] as $detail){
                ?>
                <div class="w-100"></div>
                <div class="col">
                    <span><?=$detail['voucher']?></span>
                </div>
                <div class="col">
                    <span><?=$detail['qty']?></span>                
                </div>
                <div class="col">
                    <span><?=$detail['price']?></span>
                </div>
                <?php
                    }
                ?>
            </div>
        <?php
            }
            if(count($transactions)==0){
        ?>
            <div style="text-align:center;margin-top:20px"><p>No Transaction</p></div>
        <?php
            }
        ?>
        </div>
    </div>

<?php
    include_once 'footer.php';
?>