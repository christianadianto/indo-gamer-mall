<?php
    include_once 'header.php';
    require_once '../controller/UserController.php';
    require '../middleware/admin.php';

    $total = 0;

    $user_controller = new UserController();
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['disable'])){
        $user_controller->disable($_POST['id']);
    }

    $users = $user_controller->all();

?>
    <div class="cart-section section">
        <div class="cart-container container">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($users as $user){
                    ?>
                    <tr>
                        <td><?=$user['id']?></td>
                        <td><?=$user['username']?></td>
                        <td>
                            <?php
                                if($user['deleted_at'] == null){
                            ?>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?=$user['id']?>">
                                <input class="btn btn-primary" type="submit" value="disable" name="disable">
                            </form>
                            <?php
                                }
                                else{
                            ?>
                                disabled at <?=$user['deleted_at']?>
                            <?php    
                                }
                            ?>
                        </td>
                    </tr>
                    <?php
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