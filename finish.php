<?php 
include 'connection.php';

$id = $_GET['id'];

$query = mysqli_query($conn,"UPDATE lkpbdata SET status='FINISH', progress='FINISH' WHERE noReceipt='$id'");
header("location:index.php")
?>