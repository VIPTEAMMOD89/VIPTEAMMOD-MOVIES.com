<?php

// MskDev

header("Access-Control-Allow-Origin: *");
//Your server name, it will be same for all 000webhost accounts
$servername = "localhost";

//Your DB username
$username = "id21398324_89vipteammodmovies";

//Your DB password
$password = "Aarun8977000@";

//Your DB name, required if you have two DB and want to connect to a specific one
$dbname = "id21398324_vipteammodmovies89";

//Connect to MySQL
$mysql = mysqli_connect($servername, $username, $password, $dbname);

if ($mysql->connect_error) {

  echo "Connection failed: " . $mysql->connect_error;
  
} else {

echo "Connected successfully \n";

}


//This folder will contain your all uploaded files
$target_path = "";

//Now this contain a path with your filename
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

//This will create a data where all your filename are stored
$table = "CREATE TABLE IF NOT EXISTS files(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    filename VARCHAR(30) NOT NULL,
    filepath TEXT NOT NULL
)";

$mysql->query($table);

$filepath = $target_path;



if(file_exists($target_path)){

    echo "File Already Exists (Same File Name)";
    
} else {


if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    $filename = basename( $_FILES['uploadedfile']['name']);
    
    echo " File '".  $filename. 
    "' Successfully Uploaded";
    
    //This will add the filename into the DB
        $sql = "INSERT INTO files (filename) VALUES ('$filename')";
    
    if ($mysql->query($sql) === TRUE) {
    
    echo "New record created successfully<br>";
    
       echo $filepath ;
    
} else {

    echo "Error: " . $sql . "<br>" . $mysql->error;
    
}

} else{

    echo "There was an error uploading the file, please try again!";
    
}
}
?>
