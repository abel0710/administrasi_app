<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_administrasi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $tanggal = $_POST['tanggal'];
        $nama_customer = $_POST['nama_customer'];
        $jenis_merchandise = $_POST['jenis_merchandise'];
        $ukuran = $_POST['ukuran'];
        $jumlah = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
        $tanggal_lunas = $_POST['tanggal_lunas'];
        $tanggal_pengambilan = $_POST['tanggal_pengambilan'];

        $sql = "INSERT INTO merchandise (tanggal, nama_customer, jenis_merchandise, ukuran, jumlah, keterangan, tanggal_lunas, tanggal_pengambilan)
                VALUES ('$tanggal', '$nama_customer', '$jenis_merchandise', '$ukuran', $jumlah, '$keterangan', '$tanggal_lunas', '$tanggal_pengambilan')";
        $conn->query($sql);
    }

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $tanggal = $_POST['tanggal'];
        $nama_customer = $_POST['nama_customer'];
        $jenis_merchandise = $_POST['jenis_merchandise'];
        $ukuran = $_POST['ukuran'];
        $jumlah = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
        $tanggal_lunas = $_POST['tanggal_lunas'];
        $tanggal_pengambilan = $_POST['tanggal_pengambilan'];

        $sql = "UPDATE merchandise SET tanggal='$tanggal', nama_customer='$nama_customer', jenis_merchandise='$jenis_merchandise', ukuran='$ukuran', jumlah=$jumlah, keterangan='$keterangan', tanggal_lunas='$tanggal_lunas', tanggal_pengambilan='$tanggal_pengambilan' WHERE id=$id";
        $conn->query($sql);
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM merchandise WHERE id=$id";
        $conn->query($sql);
    }
}

$sql = "SELECT * FROM merchandise";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Merchandise</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('nav.php') ;?>
<div class="container mt-5">
    <h2 class="mb-4">Manajemen Merchandise</h2>
    <form method="post" class="mb-4">
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama Customer</label>
            <input type="text" name="nama_customer" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jenis Merchandise</label>
            <input type="text" name="jenis_merchandise" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Ukuran</label>
            <input type="text" name="ukuran" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Lunas</label>
            <input type="date" name="tanggal_lunas" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Pengambilan</label>
            <input type="date" name="tanggal_pengambilan" class="form-control">
        </div>
        <button type="submit" name="add" class="btn btn-primary">Tambah Merchandise</button>
    </form>
    <div class="card container">
                <h5 class="card-header">Data Merchandise</h5>
                <div class="table-responsive text-nowrap">
    <table>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Customer</th>
            <th>Jenis Merchandise</th>
            <th>Ukuran</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Tanggal Lunas</th>
            <th>Tanggal Pengambilan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php $no = 1 ; while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $no ; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['nama_customer']; ?></td>
                    <td><?php echo $row['jenis_merchandise']; ?></td>
                    <td><?php echo $row['ukuran']; ?></td>
                    <td><?php echo $row['jumlah']; ?></td>
                    <td><?php echo $row['keterangan']; ?></td>
                    <td><?php echo $row['tanggal_lunas']; ?></td>
                    <td><?php echo $row['tanggal_pengambilan']; ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">Edit</button>
                        <form method="post" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Merchandise</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Customer</label>
                                        <input type="text" name="nama_customer" class="form-control" value="<?php echo $row['nama_customer']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Merchandise</label>
                                        <input type="text" name="jenis_merchandise" class="form-control" value="<?php echo $row['jenis_merchandise']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Ukuran</label>
                                        <input type="text" name="ukuran" class="form-control" value="<?php echo $row['ukuran']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="number" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" value="<?php echo $row['keterangan']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lunas</label>
                                        <input type="date" name="tanggal_lunas" class="form-control" value="<?php echo $row['tanggal_lunas']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pengambilan</label>
                                        <input type="date" name="tanggal_pengambilan" class="form-control" value="<?php echo $row['tanggal_pengambilan']; ?>">
                                    </div>
                                    <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="10" class="text-center">Tidak ada data</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include('foot.php'); ?>
<?php $conn->close(); ?>
