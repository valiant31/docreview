<?php
session_start();
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

// Number of Users
$totalUsersResult = $conn->query("SELECT * FROM accounts");
$totalUsers = $totalUsersResult->num_rows;

$onlineUsersResult = $conn->query("SELECT * FROM accounts WHERE status='Online'");
$onlineUsers = $onlineUsersResult->num_rows;

$offlineUsersResult = $conn->query("SELECT * FROM accounts WHERE status='Offline'");
$offlineUsers = $offlineUsersResult->num_rows;

// Add User
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $status = "Offline";

    $checkEmailQuery = "SELECT * FROM accounts WHERE email='$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        echo "Error: User with this email already exists.";
    } else {
        $sql = "INSERT INTO accounts (email, password, firstName, lastName, role, status) 
                    VALUES ('$email', '$password', '$firstName', '$lastName', '$role', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "New user added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Update User
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_user'])) {
    $originalEmail = mysqli_real_escape_string($conn, $_POST['original_email']);
    $updatedEmail = mysqli_real_escape_string($conn, $_POST['updated_email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    $checkUpdatedEmailQuery = "SELECT * FROM accounts WHERE email='$updatedEmail' AND email<>'$originalEmail'";
    $resultUpdatedEmail = $conn->query($checkUpdatedEmailQuery);

    if ($resultUpdatedEmail->num_rows > 0) {
        echo "Error: User with the updated email already exists.";
    } else {
        $updateQuery = "UPDATE accounts SET email='$updatedEmail', password='$password', 
            firstName='$firstName', lastName='$lastName', role='$role' WHERE email='$originalEmail'";

        if ($conn->query($updateQuery) === TRUE) {
            echo "User updated successfully!";
        } else {
            echo "Error updating user: " . $conn->error;
        }
    }
}

// Delete User
if (isset($_POST['delete_user'])) {
    $email = mysqli_real_escape_string($conn, $_POST['delete_user']);

    $checkEmailQuery = "SELECT * FROM accounts WHERE email='$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        $sql = "DELETE FROM accounts WHERE email='$email'";

        if ($conn->query($sql) === TRUE) {
            echo "User deleted successfully!";
        } else {
            echo "Error deleting user: " . $conn->error;
        }
    } else {
        echo "Error: User with this email does not exist.";
    }
}
$conn->close();
?>