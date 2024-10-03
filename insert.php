<?php 
include 'connection.php';

$noDo = strtoupper($_POST['noDo']);
$noReceipt = strtoupper($_POST['noReceipt']);
$noLkpb = strtoupper($_POST['noLkpb']);
$nama = strtoupper($_POST['nama']);
$dept = $_POST['dept'];
$sales = $_POST['sales'];
$kerusakan = strtoupper($_POST['kerusakan']);
$progress = 'ON PROCESS';
$status = 'ACTIVE';




  try {
    mysqli_query($conn, "INSERT INTO lkpbdata (noDo, noReceipt, noLkpb, nama, dept, sales, kerusakan, progress, status) VALUES ('$noDo', '$noReceipt', '$noLkpb', '$nama', '$dept', '$sales', '$kerusakan', '$progress', '$status')");
    mysqli_query($conn, "INSERT INTO progresscheck (noReceipt, tugu_by, od_no, som_no, est_arrival_date) values ('$noReceipt','','','','')");
    header("location:index.php");
  } catch (Exception $e) {
    echo "Error : " . $e->getMessage();
  }


?>