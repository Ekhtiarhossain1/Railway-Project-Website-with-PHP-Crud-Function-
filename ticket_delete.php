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

$sql="DELETE FROM `ticket` WHERE t_id=$id";
$result = mysqli_query($conn, $sql);
if($result)
{
    header("Location: ticket_table.php?msg=Information Deleted Successfully");

}
else{
    echo "Failed: " .mysqli_error($conn);
}
?>