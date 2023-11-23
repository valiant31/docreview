<?php
    include('db.php');
    $sql = "SELECT * FROM accounts";
    $result = $conn->query($sql);

    //LOGIN
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // echo $row["email"];
            if ($email == $row["email"]) {
                if ($password == $row["password"]) {
                    // echo "<br> Login Successful";
                    $role = $row["role"];
                    session_start();
                    $_SESSION["user"] = $email;
                    //TODO Make online
                    break;
                } else {
                    // echo "Password No Match <br>";
                }
            } else {
                // echo "Email No Match ";
            }
        }
    } else {
        echo "0 results";
    }
    $conn->close();

    if ($role == "admin") {
        header("Location: admin.php");
    }
    if ($role == "requester") {
        header("Location: req.php");
    }
    if ($role == "reviewer") {
        header("Location: rev.php");
    }
?>