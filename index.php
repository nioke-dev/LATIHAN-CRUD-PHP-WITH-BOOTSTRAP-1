<?php 
  // Koneksi Database
  $server = "Localhost";
  $user = "root";
  $pass = "";
  $database = "dblatihan";

  $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

  // jika tombol simpan di klik
  if (isset( $_POST['bsimpan'] )) {
    # code...
    $simpan =  mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi)
                                        VALUES ('$_POST[tnim]',
                                                '$_POST[tnama]',
                                                '$_POST[talamat]',
                                                '$_POST[tprodi]');                                           
    
    ");
    if ($simpan) {
      # code...
      echo "
        <script>
          alert('simpan data suksess!!');
          document.location= 'index.php';
        </script>
      ";
    }else{
      echo "
        <script>
          alert('simpan data Gagal!!');
          document.location= 'index.php';
        </script>
      ";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD 2020 PHP DAN MYSQL + BOOTSTRAP 4</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>


  <div class="container">


      <h1 class="text-center">CRUD PHP & MYSQL + BOOTSRAP 4</h1>
      <h2 class="text-center">@Ngodingpintar</h2>

    <!-- Awal Card Form -->
      <div class="card mt-3">
      <div class="card-header bg-primary text-white ">
        Form Input Data Mahasiswa
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group">
            <label>Nim</label>
            <input type="text" name="tnim" class="form-control" placeholder="Input Nim Anda Disini!!" required>
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="tnama" class="form-control" placeholder="Input Nama Anda Disini!!" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="talamat" class="form-control" placeholder="Input Alamat Anda Disini"></textarea>
          </div>
          <div class="form-group">
            <label>Program Studi</label>
            <select name="tprodi" class="form-control">
              <option></option>
              <option value="D3-MI">D3-MI</option>
              <option value="S1-SI">S1-SI</option>
              <option value="S1-TI">S1-TI</option>
            </select>
          </div><br>
          <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
          <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
        </form>
      </div>
    </div>
    <!-- Akhir Card Form -->

    <!-- Awal Card Tabel -->
    <div class="card mt-3">
      <div class="card-header bg-success text-white ">
        Daftar Mahasiswa
      </div>
      <div class="card-body">
        
        <table class="table table-bordered table-striped">
          <tr>
            <th>No.</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Program Studi</th>
            <th>Aksi</th>
          </tr>
          <?php 
          $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs order by id_mhs desc");
            while($data = mysqli_fetch_array($tampil)) : 
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nim']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['prodi']; ?></td>
            <td>
              <a href="" class="btn btn-warning">Edit</a>
              <a href="" class="btn btn-danger">hapus</a>
            </td>
          </tr>
          <?php endwhile; //penutup perulangan while?>
        </table>

      </div>
    </div>
    <!-- Akhir Card Tabel -->


  </div>



  <script type="text/javascript" src="js/bootstrap.min.css"></script>
</body>
</html>