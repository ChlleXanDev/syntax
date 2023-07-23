<?php

require_once "../koneksi/koneksi.php";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verification_code = $_POST['verification_code'];

    // Periksa apakah kode verifikasi yang dimasukkan oleh pengguna cocok dengan kode yang ada di tabel admin
    $sql = "SELECT * FROM admin WHERE verification_code = '$verification_code'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Kode verifikasi cocok, lakukan registrasi

        // Simpan data pengguna ke tabel pengguna (tanpa mengenkripsi password)
        $sql = "INSERT INTO users (email, password, verification_code) VALUES ('$email', '$password', '$verification_code')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registrasi Berhasil!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Kode verifikasi salah. Registrasi gagal!";
    }
}
$conn->close();
?>

<script>
        window.onload = function() {
            window.location.href = "../admin-syntax/index.php";
        }
    </script>