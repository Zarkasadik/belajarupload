<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0); {
        $target_dir = "folder/"; //change this to the desired  directory for uploaded files
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        //check if the file is allowed (you can modify this to allow specific file types)
        $allowed_types = array("jpg", "pdf", "jpeg", "png", "gif");
        if (!in_array($file_type, $allowed_types)) {
            echo "sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
        } else {
            // move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // File upload success, now store information in the database
                $filename = $_FILES["file"]["name"];
                $filesize = $_FILES["file"]["size"];
                $filetype = $_FILES["file"]["type"];

                //database connection
                $db_host = "localhost";
                $db_user = "root";
                $db_pass = "";
                $db_name = "fileuploaddownload";

                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

                if ($conn->connect_error) {
                    die("connection failed: " . $conn->connect_error);
                }

                // insert the file information into the database
                $sql = "INSERT INTO files (filename, filesize, filetype) VALUES ('$filename', $filesize, '$filetype')";

                if ($conn->query($sql) === TRUE) {
                    echo "the file " . basename($_FILES["file"]["name"]) . "has been uploaded and the information has been stored in the database.";
                } else {
                    echo "sorry, there was error uploading your file and storing information in database: ".$conn->error;
                }

                $conn->close();
            } else {
                echo "Sorry, there was error uploading your file.";
            }
        }
    } else {
        echo "no file was uploaded.";
    }
}
?>
