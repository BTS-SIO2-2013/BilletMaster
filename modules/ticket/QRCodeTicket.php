<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/modules/phpqrcode/qrlib.php';
    $num = $_GET['numTicket'];
    QRcode::png($num);
?>