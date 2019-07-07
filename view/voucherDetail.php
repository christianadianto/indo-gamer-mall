<?php
    include_once 'header.php';
    require '../utility/UuidGenerator.php';
    $voucher_id = $_GET['id'];
    $uuid = UuidGenerator::generateUuid();
?>
<p>voucher id = <?=$voucher_id?></p>
<p>uuid = <?=$uuid?></p>


<?php
    include_once 'footer.php';
?>