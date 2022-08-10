<?php
$host="localhost";
$userName="root";
$password="";
$db="epms";

$conn=mysqli_connect($host,$userName,$password,$db);
if($conn)
{
/*echo "Connection Successfull";*/
}else
{
echo"Connection unsuccessful";
}
?>