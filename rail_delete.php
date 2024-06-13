<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="railway_management";

$conn=mysqli_connect($server_name, $username, $password, $database_name);

if(!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

echo "Script is executing.";

$sql="DELETE FROM `rail_info` WHERE train_name='$id'";

echo $sql;

$result = mysqli_query($conn, $sql);
if($result)
{
    header("Location: rail_info.php?msg=Train Information Deleted Successfully");

}
else{
    echo "Failed: " .mysqli_error($conn);
}
?>