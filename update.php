<?php 
include 'connection.php';

$id = $_POST['id'];
$progress = strtoupper($_POST['progress']);
$catatan = strtoupper($_POST['catatan']);
$kerusakan = strtoupper($_POST['kerusakan']);
$tuguby = $_POST['tuguby'];
$odno = strtoupper($_POST['odno']);
$somno = strtoupper($_POST['somno']);
$est = $_POST['estdate'];

try {
  mysqli_query($conn, "UPDATE lkpbdata 
      SET progress = '$progress',
      kerusakan = '$kerusakan',
      catatan = '$catatan'
      WHERE noReceipt = '$id' ");

mysqli_query($conn, "UPDATE progresscheck SET tugu_by = '$tuguby', od_no = '$odno', som_no = '$somno', est_arrival_date = '$est' WHERE noReceipt = '$id' ");

header("location:index.php");
} catch (Exception $e) {
  echo "Error : " . $e->getMessage();
}
?>
