<?php
$imagePathToDelete = "Ip897700.txt";  // Provide the path to the image you want to delete

if (file_exists($imagePathToDelete)) {
    if (unlink($imagePathToDelete)) {
        echo "Server Users Ip File deleted successfully.";
    } else {
        echo "Failed to Server Users Ip  delete the File.";
    }
} else {
    echo "Server Users Ip File not found.";
}
?>
