<?php 
include 'connection.php';

$query = mysqli_query($conn,"SELECT * FROM dept ORDER BY idDept ASC");
$result = mysqli_fetch_all($query,MYSQLI_ASSOC);

$query1 = mysqli_query($conn,"SELECT * FROM sales ORDER BY namaSales ASC");
$result1 = mysqli_fetch_all($query1,MYSQLI_ASSOC);
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

    <div class="addContainer">
      <div class="addContent">
        <h2>DATA BARU</h2>
        <form action="insert.php" method="POST" class="addForm">
          <label for="noDo">No. DO</label>
          <input
            type="text"
            id="noDo"
            name="noDo"
            placeholder="No. DO"
            required
          />

          <label for="noReceipt">No. Receipt</label>
          <input
            type="text"
            id="noReceipt"
            name="noReceipt"
            placeholder="No. Receipt"
            required
          />

          <label for="noLkpb">No. LKPB</label>
          <input
            type="text"
            id="noLkpb"
            name="noLkpb"
            placeholder="No. LKPB"
            required
          />

          <label for="nama">Nama Customer</label>
          <input
            type="text"
            id="nama"
            name="nama"
            placeholder="Nama Customer"
            required
          />

          <label for="dept">Department</label>
          <select name="dept" id="dept" required>
            <?php foreach($result as $key => $value):?>
              <option value="<?= $value['idDept'].'-'.$value['namaDept']?>"><?= $value['idDept'].'-'.$value['namaDept']?></option>
            <?php endforeach;?>
          </select>

          <label for="sales">Sales</label>
          <select name="sales" id="sales">
          <option value=""></option>
          <?php foreach($result1 as $key => $value):?>
              <option value="<?= $value['nip'].'-'.$value['namaSales']?>"><?= $value['nip'].'-'.$value['namaSales']?></option>
            <?php endforeach;?>
          </select>

          <label for="kerusakan">Detail Kerusakan</label>
          <input
            type="text"
            id="kerusakan"
            name="kerusakan"
            placeholder="Detail Kerusakan"
            required
          />

          <button type="submit" >Simpan</button>
        </form>
      </div>
    </div>

  </body>
</html>
