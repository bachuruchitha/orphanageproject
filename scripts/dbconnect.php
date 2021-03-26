
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "orphanage";
$conn = new mysqli($servername,$username,$password,$database);
if($conn){
echo "";
}
else{
die("error".mysqli_connect_error());
}
?>

