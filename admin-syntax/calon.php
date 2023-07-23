<?php
require_once "../koneksi/koneksi.php";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?><!DOCTYPE html>
<html>
<head>
    <title>Data Calon Siswa</title>
    <style>
        form {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        label {
            margin-right: 10px;
            font-weight: bold;
        }

        select {
            padding: 8px;
            font-size: 14px;
        }

        input[type="submit"], a {
            padding: 8px 12px;
            text-decoration: none;
            font-size: 14px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .filter_container {
            display: flex;
            justify-content: space-between;
        }

        .total-calon{
            font-size: 50px;
        }

    </style>
</head>
<body>
    <h1>Data Calon Siswa</h1>
    <?php
    // Mengambil data calon siswa dari tabel calon_siswa
    $sql = "SELECT * FROM calon_siswa";
    $result = $conn->query($sql);

    // Menghitung total calon siswa
    $total_calon_siswa = $result->num_rows;
    ?>

    <div class="total-calon"><p>Total Calon Siswa: <?php echo $total_calon_siswa; ?></p></div>
    <div class="filter_container">
        <form>
            <label for="filter_kelas">Filter Kelas:</label>
            <select id="filter_kelas">
                <option value="">Semua</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
            <input type="submit" value="Filter">
        </form>
        <a href="#" onclick="showPopup()">Add</a>
    </div>
    <table border="1">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
        </tr>
        <?php
        // Mengambil data calon siswa dari tabel calon_siswa
        $sql = "SELECT * FROM calon_siswa";
        $result = $conn->query($sql);

        // Memeriksa apakah ada data yang ditemukan
        if ($result->num_rows > 0) {
            // Menampilkan data dalam bentuk tabel
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nis"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["kelas"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data calon siswa.</td></tr>";
        }
        ?>
    </table>

    <!-- Kode popup dan JavaScript -->
    <div id="popupForm" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #f0f0f0; padding: 20px; border: 1px solid #ccc;">
        <h2>Tambah Data Calon Siswa</h2>
        <form action="tambah_calon.php" method="post">
            <label for="nis">NIS:</label>
            <input type="text" name="nis" id="nis" required>
            <br>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>
            <br>
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" id="kelas" required>
            <br>
            <input type="submit" value="Done" onclick="hidePopup()">
        </form>
        <button onclick="hidePopup()">Cancel</button>
    </div>

    <script>
        function showPopup() {
            var popup = document.getElementById("popupForm");
            popup.style.display = "block";
        }

        function hidePopup() {
            var popup = document.getElementById("popupForm");
            popup.style.display = "none";
        }
    </script>
</body>
</html>
