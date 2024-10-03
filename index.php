<?php 
include 'connection.php';

$query = mysqli_query($conn,"SELECT * FROM lkpbdata ORDER BY status ASC");
$result = mysqli_fetch_all($query,MYSQLI_ASSOC);



if (isset($_GET['keyword'])) {
  $kategori = $_GET['kategori'];
  $keyword = $_GET['keyword'];

  if ($kategori == 'all') {
    $query = mysqli_query($conn,"SELECT * FROM lkpbdata ORDER BY status ASC");
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
  } elseif ($kategori == 'noLkpb') {
    $query = mysqli_query($conn,"SELECT * FROM lkpbdata WHERE noLkpb LIKE '%$keyword%' ORDER BY status ASC");
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
  } elseif ($kategori == 'noReceipt') {
    $query = mysqli_query($conn,"SELECT * FROM lkpbdata WHERE noReceipt LIKE '%$keyword%' ORDER BY status ASC");
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
  } elseif ($kategori == 'nama') {
    $query = mysqli_query($conn,"SELECT * FROM lkpbdata WHERE nama LIKE '%$keyword%' ORDER BY status ASC");
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
  } elseif ($kategori == 'dept') {
    $query = mysqli_query($conn,"SELECT * FROM lkpbdata WHERE dept LIKE '%$keyword%' ORDER BY status ASC");
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
  } elseif ($kategori == 'sales') {
    $query = mysqli_query($conn,"SELECT * FROM lkpbdata WHERE sales LIKE '%$keyword%' ORDER BY status ASC");
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
  }
}
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
            <a href="add.php" id="loginTxt">New Data</a>
          </div>
        </div>
      </div>
    </nav>

    <main>
      <section class="hero-container">
        <h1>LPKB DATA</h1>
        <form action="index.php" method="GET">
          <select name="kategori" id="kategori">
            <option value="all">all</option>
            <option value="noLkpb">No. LKPB</option>
            <option value="noReceipt">No. Receipt</option>
            <option value="nama">Nama Customer</option>
            <option value="dept">Department</option>
            <option value="sales">Sales</option>
          </select>
          <input
            type="text"
            placeholder="Masukkan Keyword"
            name="keyword"
            id="keyword"
          />
          <button type="submit">Cari</button>
        </form>

        <div class="hero">
          <div class="hero-content" style="overflow-x: auto">
            <table>
              <thead>
                <tr>
                  <th>NO LKPB</th>
                  <th>NO RECEIPT</th>
                  <th>NAMA CUSTOMER</th>
                  <th>DEPT</th>
                  <th>SALES</th>
                  <th>STATUS</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach($result as $key => $value):?>
                      <tr <?php if ($value['status'] == 'FINISH') echo 'style="background-color:#c5f6d4"' ?>>
                        <td><?= $value['noLkpb']?></td>
                        <td><?= $value['noReceipt']?></td>
                        <td><?= $value['nama']?></td>
                        <td><?= $value['dept']?></td>
                        <td><?= $value['sales']?></td>
                        <td><?= $value['status']?></td>
                        <td>
                          <a href="detail.php?id=<?= $value['noReceipt']?>&menu=Detail">Detail</a>
                          <a href="edit.php?id=<?= $value['noReceipt']?>" >Update</a>
                          <a href="finish.php?id=<?= $value['noReceipt']?>" onclick="return confirm('Apa Kamu yakin ingin Finish No. Receipt <?= $value['noReceipt']?> ?')">Finish</a>
                        </td>
                      </tr>
                  <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <footer>
        <div class="container">
          <div class="content">
            <p>Made By F@</p>
          </div>
        </div>
      </footer>
    </main>

    <script>
      function konfirmasi() {
        return confirm('Anda yakin ingin Finish data ini?');
      }
    </script>
  </body>
</html>
