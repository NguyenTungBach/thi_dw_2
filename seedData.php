<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thi_dw";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sqlDropTables = "DROP TABLE IF EXISTS test2";
$conn->query($sqlDropTables);


$sql = "CREATE TABLE `thi_dw`.`test2` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(250) NOT NULL , `email` VARCHAR(250) NOT NULL , `telephone` VARCHAR(250) NOT NULL , `content` TEXT NOT NULL , `date` DATE NOT NULL , `status` VARCHAR(250) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

if ($conn->query($sql) === TRUE) {
    echo "created successfully";
} else {
    echo " creating table fails " . $conn->error;
}

$conn->close();
?>
