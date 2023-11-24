<?php
    require("db.php");
    session_start();

    if (isset($_POST["login"])) {
        // Receive login details
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);

        // Verify login details
        $loginDetailsStmt = $conn -> prepare("SELECT * FROM accounts WHERE email=? AND password=?");
        $loginDetailsStmt -> bind_param("ss", $email, $password);
        $loginDetailsStmt -> execute();
        $loginDetailsResult = $loginDetailsStmt -> get_result();
        $loginDetailsRow = $loginDetailsResult -> fetch_assoc();

        // Check status
        if ($loginDetailsRow["status"] == "online") {
            echo '<script>
            alert("User is already logged in.");
            window.location.href="../index.php";
            </script>'; 
            exit();
        }
    }

    // If a result exists, otherwise prompt invalid
    if ($loginDetailsResult -> num_rows > 0) {
        // Initialize session to user's email
        $_SESSION["user"] = $email;

        // Make user online
        $updateStatusStmt = "UPDATE accounts SET status='online' WHERE email='$email'";
        mysqli_query($conn, $updateStatusStmt);

        // Identify user role then redirect to corresponding page
        if ($loginDetailsRow["role"] == "admin") {
            header("Location: admin.php");
        }
        if ($loginDetailsRow["role"] == "requester") {
            header("Location: req.php");
        }
        if ($loginDetailsRow["role"] == "reviewer") {
            header("Location: rev.php");
        }
    } else {
        echo '<script>
            alert("Incorrect email or password.");
            window.location.href="../index.php";
            </script>'; 
            exit();
    }
?>