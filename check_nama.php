<?php
require_once "./koneksi/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nis = $_POST["nis"];

    // Escape the Nis to prevent SQL injection
    $escapedNis = $conn->real_escape_string($nis);

    // Query the database to get the corresponding Nama based on the selected Nis
    $query = "SELECT nama FROM calon_siswa WHERE nis = '$escapedNis'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        // If the corresponding Nama is found, return it as a response
        $row = $result->fetch_assoc();
        echo $row["nama"];
    } else {
        // If no Nama is found, return an empty response
        echo "";
    }
}
?>
