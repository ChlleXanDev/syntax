<?php
require_once "./koneksi/koneksi.php";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $nis = $_POST["nis"];
    $phone = $_POST["phone"];
    $hobby = $_POST["hobby"];
    $alasan = $_POST["alasan"];
    date_default_timezone_set("Asia/Jakarta");
    $tanggal_pendaftaran = date("Y-m-d H:i:s");


    $phone = $_POST["phone"];
    if (substr($phone, 0, 1) === "0") {

        $phone = "62" . substr($phone, 1);
    }


    $FormClass = preg_replace('/\s.*$/', '', $kelas);


    $check_query = "SELECT COUNT(*) as count FROM pendaftaran WHERE nis = '$nis'";
    $check_result = $conn->query($check_query);
    $row = $check_result->fetch_assoc();
    $count = $row['count'];

    if ($count > 0) {


    } else {

        $sql = "INSERT INTO pendaftaran (nama, kelas, FormClass, nis, phone, hobby, alasan, tanggal_pendaftaran)
                VALUES ('$nama', '$kelas', '$FormClass', '$nis', '$phone', '$hobby', '$alasan', '$tanggal_pendaftaran')";

        if ($conn->query($sql) === TRUE) {
            header("Location: hasil_pendaftaran.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Syntax - Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/png" href="./img/syntax.png">
    <meta name="description" content="pendaftaran di Syntax Community. Daftar sekarang untuk bergabung dengan kami!" />
</head>

<style>
    .logo {
        max-width: 150px; 
        height: auto; 
        display: block;
        margin: 0 auto;
        margin-bottom: 20px; 
    }
</style>

<body>
    <div class="container">

        <img src="./img/syntx.png" alt="Logo" class="logo">
        <h1 class="form-title">Registration</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if ($count > 0) {
               
                echo '<div class="alert">Error: Nis Tersebut sudah Terdaftar.<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span></div>';
            }
        }
        ?>
        <form method="POST" action="#">
            <div class="main-user-info">
                <div class="user-input-box">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" required>
                <option value="" disabled selected>--- Silahkan Pilih ---</option>
                <!-- The class options will be dynamically populated here -->
            </select>
                </div>
                <div class="user-input-box">
    <label for="nis">Nis</label>
    <select id="nis" name="nis" required>
        <option value="" disabled selected>--- Pilih Kelas terlebih dahulu ---</option>
    </select>
</div>
                <div class="user-input-box">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="--- Pilih Nis terlebih dahulu ---" required readonly />
                </div>
                <div class="user-input-box">
                    <label for="phone">Phone</label>
                    <input type="number" id="phone" name="phone" placeholder="Enter Phone Number" required/>
                </div>
                <div class="user-input-box">
                    <label for="hobby">Hobby</label>
                    <input type="hobby" id="hobby" name="hobby" placeholder="Enter your Hobby" required/>
                </div>
                <div class="user-input-box">
                    <label for="alasan">Reason</label>
                    <input type="alasan" id="alasan" name="alasan" placeholder="Enter your Reason" required/>
                </div>
            </div>

            <div class="form-submit-btn">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</body>
<!-- Add this script after the form -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const namaInput = document.getElementById("nama");
        const kelasSelect = document.getElementById("kelas");
        const nisSelect = document.getElementById("nis");

        function populateKelasOptions() {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "check_kelas.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Update the "kelas" select dropdown with the retrieved options
                        kelasSelect.innerHTML = xhr.responseText;
                    } else {
                        // Handle the error here if needed
                    }
                }
            };

            xhr.send();
        }

        // Populate the "kelas" options on page load
        populateKelasOptions();

        // Function to get the corresponding Nama based on the selected Nis
        function getNamaByNis(selectedNis) {
            if (selectedNis !== "") {
                // Send the selectedNis to the server to get the corresponding Nama
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "check_nama.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Update the Nama field based on the response
                            namaInput.value = xhr.responseText;
                        } else {
                            // Handle the error here if needed
                        }
                    }
                };

                // Send the selectedNis as a parameter to check_nama.php
                xhr.send("nis=" + encodeURIComponent(selectedNis));
            } else {
                // If no Nis is selected, reset the Nama field
                namaInput.value = "";
            }
        }

        kelasSelect.addEventListener("change", function () {
            const selectedKelas = kelasSelect.value;

            if (selectedKelas !== "") {
                // Send the selectedKelas to the server to get available Nis options
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "check_nis.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Update the Nis select dropdown options based on the response
                            nisSelect.innerHTML = xhr.responseText;
                        } else {
                            // Handle the error here if needed
                        }
                    }
                };

                // Send the selectedKelas as a parameter to check_nis.php
                xhr.send("kelas=" + encodeURIComponent(selectedKelas));
            } else {
                // If no Kelas is selected, reset the Nis select dropdown and Nama field
                nisSelect.innerHTML = '<option value="" disabled selected>Pilih Kelas terlebih dahulu</option>';
                namaInput.value = "";
            }
        });

        nisSelect.addEventListener("change", function () {
            const selectedNis = nisSelect.value;

            // Get the corresponding Nama based on the selected Nis
            getNamaByNis(selectedNis);
        });
    });
</script>



</html>