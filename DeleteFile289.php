<?php
if(isset($_POST["submit"])) {
    $fileNameToDelete = $_POST["fileName"];
    
    $filePath = "" . $fileNameToDelete;  // Directory where files are stored
    
    if(file_exists($filePath)) {
        if(unlink($filePath)) {
            echo "File '$fileNameToDelete' has been deleted.";
        } else {
            echo "Error deleting file.";
        }
    } else {
        echo "File '$fileNameToDelete' does not exist.";
    }
}
?>
