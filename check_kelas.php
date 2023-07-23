<?php
// check_kelas.php
require_once "./koneksi/koneksi.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all unique classes from the database
$kelas_query = "SELECT DISTINCT kelas FROM calon_siswa";
$kelas_result = $conn->query($kelas_query);

// Prepare the option elements for the select dropdown
$options = '<option value="" disabled selected>--- Silahkan Pilih ---</option>';
while ($row = $kelas_result->fetch_assoc()) {
    $options .= '<option value="' . $row['kelas'] . '">' . $row['kelas'] . '</option>';
}

$conn->close();

// Return the options to the client-side
echo $options;
?>
