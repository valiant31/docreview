<?php
if (isset($_SESSION["user"])) {
    require("db.php");
    $sql = "SELECT * FROM accounts";
    $result = $conn->query($sql);
} else {
    echo '<script>
            alert("Log in first.");
            window.location.href="index.php";
            </script>';
    exit();
}
