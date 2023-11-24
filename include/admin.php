<?php
    include("../admin.html");
    session_start();
    echo $_SESSION["user"]  . "Role: Admin";

    require("db.php");
    $sql = "SELECT * FROM accounts";
    $result = $conn -> query($sql);
    //TODO Create/Add Accounts
?>