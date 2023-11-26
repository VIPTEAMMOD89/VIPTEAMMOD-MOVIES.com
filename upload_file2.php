<?php
if(isset($_POST["submit"])) {
    $uploadDirectory = "";  // Directory to save uploaded files
    
    if(!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);  // Create the directory if it doesn't exist
    }
    
    $uploadedFiles = $_FILES["fileToUpload"]["name"];
    $numFiles = count($uploadedFiles);
    
    for($i = 0; $i < $numFiles; $i++) {
        $targetFile = $uploadDirectory . basename($_FILES["fileToUpload"]["name"][$i]);
        
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $targetFile)) {
            echo "File '". htmlspecialchars($uploadedFiles[$i]). "' has been uploaded.<br>";
        } else {
            echo "Error uploading file '". htmlspecialchars($uploadedFiles[$i]). "'.<br>";
        }
    }
}
?>
