<?php
require_once "./koneksi/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $kelas = $_POST["kelas"];

    // Escape the kelas to prevent SQL injection
    $escapedKelas = $conn->real_escape_string($kelas);

    // Query the database to get available Nis options based on the selected Kelas
    $query = "SELECT nis FROM calon_siswa WHERE kelas = '$escapedKelas'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        // If there are available Nis options, create the select dropdown options
        $options = '<option value="" disabled selected>--- Silahkan Pilih ---</option>';
        while ($row = $result->fetch_assoc()) {
            $options .= '<option value="' . $row["nis"] . '">' . $row["nis"] . '</option>';
        }
        echo $options;
    } else {
        // If no Nis options found, return an empty response
        echo '<option value="" disabled selected>-- Nis tidak tersedia ---</option>';
    }
}
?>
