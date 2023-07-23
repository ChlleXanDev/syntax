<?php

require_once "../koneksi/koneksi.php";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verification_code = $_POST['verification_code'];

    // Simpan kode verifikasi ke basis data
    $sql = "INSERT INTO admin (verification_code) VALUES ('$verification_code')";
    if ($conn->query($sql) === TRUE) {
        // Mengubah pesan menjadi alert JavaScript
        echo "<script>alert('Kode verifikasi berhasil disimpan!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<script>
        window.onload = function() {
            window.location.href = "../adminreg/index.php";
        }
    </script>