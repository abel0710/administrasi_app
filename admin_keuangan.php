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
        $saldo = $_POST['saldo'];
        $uang_keluar = $_POST['uang_keluar'];
        $uang_masuk = $_POST['uang_masuk'];
        $keterangan = $_POST['keterangan'];

        $sql = "INSERT INTO keuangan (tanggal, saldo, uang_keluar, uang_masuk, keterangan)
                VALUES ('$tanggal', '$saldo', '$uang_keluar', '$uang_masuk', '$keterangan')";
        $conn->query($sql);
    }

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $tanggal = $_POST['tanggal'];
        $saldo = $_POST['saldo'];
        $uang_keluar = $_POST['uang_keluar'];
        $uang_masuk = $_POST['uang_masuk'];
        $keterangan = $_POST['keterangan'];

        $sql = "UPDATE keuangan SET tanggal='$tanggal', saldo='$saldo', uang_keluar='$uang_keluar', uang_masuk='$uang_masuk', keterangan='$keterangan' WHERE id=$id";
        $conn->query($sql);
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM keuangan WHERE id=$id";
        $conn->query($sql);
    }
}

$sql = "SELECT * FROM keuangan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Keuangan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('nav.php') ;?>
<div class="container mt-5">
    <h2 class="mb-4">Manajemen Keuangan</h2>
    <form method="post" class="mb-4">
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Saldo </label>
            <input type="number" step="0.01" name="saldo" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Uang Keluar </label>
            <input type="number" step="0.01" name="uang_keluar" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Uang Masuk </label>
            <input type="number" step="0.01" name="uang_masuk" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>
        <button type="submit" name="add" class="btn btn-primary">Tambah Data</button>
    </form>
    <div class="card container">
                <h5 class="card-header">Data Keuangan</h5>
                <div class="table-responsive text-nowrap">
    <table >
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Saldo </th>
            <th>Uang Keluar </th>
            <th>Uang Masuk </th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php $no = 1 ; while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo number_format($row['saldo'], 2, ',', '.'); ?></td>
                    <td><?php echo number_format($row['uang_keluar'], 2, ',', '.'); ?></td>
                    <td><?php echo number_format($row['uang_masuk'], 2, ',', '.'); ?></td>
                    <td><?php echo $row['keterangan']; ?></td>
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
                                <h5 class="modal-title" id="editModalLabel">Edit Data Keuangan</h5>
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
                                        <label>Saldo </label>
                                        <input type="number" step="0.01" name="saldo" class="form-control" value="<?php echo $row['saldo']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Uang Keluar </label>
                                        <input type="number" step="0.01" name="uang_keluar" class="form-control" value="<?php echo $row['uang_keluar']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Uang Masuk </label>
                                        <input type="number" step="0.01" name="uang_masuk" class="form-control" value="<?php echo $row['uang_masuk']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" value="<?php echo $row['keterangan']; ?>">
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
                <td colspan="7" class="text-center">Tidak ada data</td>
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
