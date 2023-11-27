<?php
session_start();
require("db.php");
global $conn;
$statusMsg = '';

if (isset($_POST["upload"])) {
    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = "upload/" . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('pdf', 'doc', 'docx');
        if (in_array($fileType, $allowTypes)) {
            $tmpName = $_FILES["file"]["tmp_name"];
            $fp = fopen($tmpName, "r");
            $content = fread($fp, 16777215);
            $content = addslashes($content);
            fclose($fp);
            $insert = $conn->query("INSERT INTO document (fileName, file_type, file_path, document) 
                                        VALUES ('$fileName', '$fileType', '$targetFilePath', '$content')");                         
            if ($insert) {
                $statusMsg = $fileName . " has been uploaded successfully.";   
                insertTransaction();
            } else {
                $statusMsg = "File upload failed, try again.";
            }
        } else {
            $statusMsg = 'Only PDF, DOC, & DOCX files are allowed.';
        }
    } else {
        $statusMsg = 'No file selected.';
    }
}

function insertTransaction() {
    global $conn;
    $date = date("Y/m/d");
                $email = $_SESSION["user"];
                $last_id = $conn->insert_id;
                $process = $conn->query("INSERT INTO transaction (
                    document_id, 
                    email, 
                    comment_id, 
                    status, 
                    uploaded_date, 
                    approved_date) 
                VALUES (
                    '$last_id', 
                    '$email',
                    '0',
                    'pending',
                    '$date',
                    'n/a'
                    )");
}

echo "<script>
        alert('$statusMsg');
        window.location.href='../requester-add.php';
        </script>";
