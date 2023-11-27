<?php
require('db.php');

$fileStmnt = $conn->query("SELECT * FROM document WHERE document_id = 6");
$fileRow = $fileStmnt->fetch_assoc();
file_put_contents($fileRow["fileName"], $fileRow["document"]);
echo "<script>
        alert('Downloaded ' . ".$fileRow["fileName"].");
        window.location.href='../reviewer-home.php';
        </script>";