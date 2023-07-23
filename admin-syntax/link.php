<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Link</title>
</head>
<body>
    <h2>Tambah Data Link</h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="redirect_name">Nama Redirect:</label>
        <input type="text" name="redirect_name" required>
        <br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        <br>

        <label for="link">Link:</label>
        <input type="text" name="link" required>
        <br>

        <input type="submit" value="Tambah">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Koneksi ke database
        require_once "../koneksi/koneksi.php";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Ambil data dari form
        $redirect_name = $_POST["redirect_name"];
        $nama = $_POST["nama"];
        $link = $_POST["link"];

        // Query untuk menambahkan data ke tabel link
        $sql = "INSERT INTO link (redirect_name, nama, link) VALUES ('$redirect_name', '$nama', '$link')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Data berhasil ditambahkan.</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>

</body>
</html>
