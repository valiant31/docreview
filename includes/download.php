<?php
    require('db.php');

    $fileStmnt = $conn->query("SELECT * FROM document WHERE id = '1'");
    $file = $fileStmnt->fetch_assoc();
    echo $file;
?>