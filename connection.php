<?php 


try {
  $conn = mysqli_connect('localhost','root','','lkpb');
} catch(Exception $e) {
  echo 'Unable to Connect : '.$e->getMessage();
}

?>