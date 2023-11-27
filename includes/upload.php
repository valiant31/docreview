<?php
require("db.php");
$statusMsg = '';

if (isset($_POST["upload"])) {
    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = "../upload/" . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('pdf', 'doc', 'docx');
        if (in_array($fileType, $allowTypes)) {
            $tmpName = $_FILES["file"]["tmp_name"];
            $blob = fopen($tmpName, "r");
            $insert = $conn->query("INSERT INTO document (fileName, file_type, file_path, document) 
                                        VALUES ('$fileName', '$fileType', '$targetFilePath', '$blob')");
            if ($insert) {
                $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select a file to upload.';
    }
}

echo "<script>
        alert('$statusMsg');
        window.location.href='../requester-add.php';
        </script>";
