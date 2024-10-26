<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>LIST MAHASISWA</h1>
        <a href="Form-daftar.php" class="btn btn-primary mb-3">Tambah Data</a>

        <?php
        
        include("koneksi.php");

        
        $sql = "SELECT id, nama, alamat, jenis_kelamin, agama, sekolah_asal FROM calon_siswa";
        $query = mysqli_query($db, $sql);

        
        if (mysqli_num_rows($query) > 0) {
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Sekolah Asal</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>";
            echo "<tbody>";
            
            
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>".htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8')."</td>";
                echo "<td>".htmlspecialchars($row['alamat'], ENT_QUOTES, 'UTF-8')."</td>";
                echo "<td>".htmlspecialchars($row['jenis_kelamin'], ENT_QUOTES, 'UTF-8')."</td>";
                echo "<td>".htmlspecialchars($row['agama'], ENT_QUOTES, 'UTF-8')."</td>";
                echo "<td>".htmlspecialchars($row['sekolah_asal'], ENT_QUOTES, 'UTF-8')."</td>";
                echo "<td>";
                echo "<a href='form-edit.php?id=".$row['id']."' class='btn btn-warning btn-sm'>Edit</a> ";
                echo "<a href='delete.php?id=".$row['id']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Belum ada data mahasiswa.</p>";
        }

        
        mysqli_close($db);
        ?>
    </div>
</body>
</html>
