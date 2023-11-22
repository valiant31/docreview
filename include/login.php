<?php
//DB
$servername = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "docreview";

$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM accounts";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    // echo $email . "<br>";
    // echo $password;
}

//LOGIN
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($email == $row["email"]) {
            if ($password == $row["password"]) {
                // echo "<br> Login Successful";
                $role = $row["role"];
                //TODO Make offline
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
    header("Location: ../admin.html");
}
if ($role == "requester") {
    header("Location: ../req.html");
}
if ($role == "reviewer") {
    header("Location: ../rev.html");
}
