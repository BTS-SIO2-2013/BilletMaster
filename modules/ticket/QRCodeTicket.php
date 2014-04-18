<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/modules/phpqrcode/qrlib.php';
    QRcode::png('PHP QR Code :)');
?>