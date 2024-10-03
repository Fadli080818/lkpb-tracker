<?php 
include 'connection.php';

$id = $_GET['id'];

$query = mysqli_query($conn,"select * from lkpbdata where noReceipt = '$id'");
$result = mysqli_fetch_assoc($query);

$noDo = $result['noDo'];
$noReceipt = $result['noReceipt'];
$noLkpb = $result['noLkpb'];
$nama = $result['nama'];
$dept = $result['dept'];
$sales = $result['sales'];
$kerusakan = $result['kerusakan'];
$progress = $result['progress'];
$catatan = $result['catatan'];
$status = $result['status'];

$query1 = mysqli_query($conn,"select * from progresscheck where noReceipt = '$id'");
$result1 = mysqli_fetch_assoc($query1);

$tuguby = $result1['tugu_by'];
$odno = $result1['od_no'];
$somno = $result1['som_no'];
$est = $result1['est_arrival_date'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LKPB TRACKER</title>
    <link rel="stylesheet" href="css/app.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar">
      <div class="nav">
        <div class="nav-content">
          <a href="index.html" id="navbarTitle">LKPB TRACKER</a>
          <div class="content">
            <a href="index.php" id="loginTxt">Back</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="editContainer" >
      <div class="editContent" >
        <h2>UPDATE</h2>
        <form action="update.php" method="POST" class="editForm">
        <input type="hidden" name="id" value="<?= $noReceipt?>">  
        
        <label for="noDo">No. DO</label>
          <input
            type="text"
            id="noDo"
            name="noDo"
            value="<?= $noDo?>"
            disabled
          />

          <label for="noReceipt">No. Receipt</label>
          <input
            type="text"
            id="noReceipt"
            name="noReceipt"
            value="<?= $noReceipt?>"
            disabled
          />

          <label for="noLkpb">No. LKPB</label>
          <input
            type="text"
            id="noLkpb"
            name="noLkpb"
            value="<?= $noLkpb?>"
            disabled
          />

          <label for="nama">Nama Customer</label>
          <input
            type="text"
            id="nama"
            name="nama"
            value="<?= $nama?>"
            disabled
          />

          <label for="dept">Department</label>
          <input
            type="text"
            id="dept"
            name="dept"
            value="<?= $dept?>"
            disabled
          />

          <label for="sales">Sales</label>
          <input
            type="text"
            id="sales"
            name="sales"
            value="<?= $sales?>"
            disabled
          />

          <label for="kerusakan">Detail Kerusakan</label>
          <textarea name="kerusakan" id="kerusakan" rows="5"><?= $kerusakan?></textarea>

          <p style="margin:20px;text-align:center;">- - Progress Tracking - - </p>
        
          <label for="progress">Progress</label >
          <select name="progress" id="progress" >
            <option value="ON PROCESS" <?php if ($progress == "ON PROCESS") echo 'selected'?>>ON PROCESS</option>
            <option value="WHAITING PART" <?php if ($progress == "WHAITING PART") echo 'selected'?>>WHAITING PART</option>
            <option value="PART READY" <?php if ($progress == "PART READY") echo 'selected'?>>PART READY</option>
          </select>

          <label for="catatan">Note Progress</label>
          <textarea name="catatan" id="catatan" rows="5"><?= $catatan?></textarea>

          <label for="tuguby">Tugu By</label>
          <select name="tuguby" id="tuguby">
            <option value=""></option>
            <option value="Store" <?php if ($tuguby == "STORE") echo 'selected'?>>STORE</option>
            <option value="DC 73" <?php if ($tuguby == "DC 73") echo 'selected'?>>DC 73</option>
            <option value="NDC 72" <?php if ($tuguby == "NDC 72") echo 'selected'?>>NDC 72</option>
            <option value="NDC 23" <?php if ($tuguby == "NDC 23") echo 'selected'?>>NDC CIKUPA</option>
            <option value="NDC SIDUARJO" <?php if ($tuguby == "NDC SIDUARJO") echo 'selected'?>>NDC SIDUARJO</option>
          </select>

          <label for="odno">No OD</label>
          <input
            type="text"
            id="odno"
            name="odno"
            value="<?= $odno ?>"
          />

          <label for="somno">Nomor SOM</label>
          <input
            type="text"
            id="somno"
            name="somno"
            value="<?= $somno ?>"
          />
          <label for="estdate" >Estimasi Tiba</label>
          <input
            type="date"
            id="estdate"
            name="estdate"
            value="<?= $est ?>"
            style="background-color:var(--bg);color:white;"
          />
          <button type="submit">Simpan</button>
        </form>
      </div>
    </div>

    
  </body>
</html>
