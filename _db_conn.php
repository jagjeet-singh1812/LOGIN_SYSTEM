<?php
$servername="localhost";
$username="root";
$password="";
$database="loginform";

try{
$conn=mysqli_connect($servername,$username,$password,$database);
}catch(Exception){
    die("sorry could not connect due to --->".mysqli_connect_error());
}

// if($conn){
//     echo"successfull connection";
// }
// else{
//     echo "sorry couldnt add as database is not created or incorrect details ";
// }

?>
