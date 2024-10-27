<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include('connection.php');
$con = connection();

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id='$id'";

$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
};

?>