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
                        <option id="xdkv1" value="X DKV 1">X DKV 1</option>
                        <option id="xdkv2" value="X DKV 2">X DKV 2</option>
                        <option id="xdkv3" value="X DKV 3">X DKV 3</option>
                        <option id="xrpl1" value="X RPL 1">X RPL 1</option>
                        <option id="xrpl2" value="X RPL 2">X RPL 2</option>
                        <option id="xrpl3" value="X RPL 3">X RPL 3</option>
                        <option id="xtkj1" value="X TKJ 1">X TKJ 1</option>
                        <option id="xtkj2" value="X TKJ 2">X TKJ 2</option>
                        <option id="xtkj3" value="X TKJ 3">X TKJ 3</option>
                        <option id="xtelco" value="X TELCO">X TELCO</option>
                        <option id="xidkv1" value="XI DKV 1">XI DKV 1</option>
                        <option id="xidkv2" value="XI DKV 2">XI DKV 2</option>
                        <option id="xidkv3" value="XI DKV 3">XI DKV 3</option>
                        <option id="xirpl1" value="XI RPL 1">XI RPL 1</option>
                        <option id="xirpl2" value="XI RPL 2">XI RPL 2</option>
                        <option id="xirpl3" value="XI RPL 3">XI RPL 3</option>
                        <option id="xitkj1" value="XI TKJ 1">XI TKJ 1</option>
                        <option id="xitkj2" value="XI TKJ 2">XI TKJ 2</option>
                        <option id="xitkj3" value="XI TKJ 3">XI TKJ 3</option>
                        <option id="xitelco" value="XI TELCO">XI TELCO</option>
                        <option id="xiimm1" value="XII MM 1">XII MM 1</option>
                        <option id="xiimm2" value="XII MM 2">XII MM 2</option>
                        <option id="xiimm3" value="XII MM 3">XII MM 3</option>
                        <option id="xiirpl1" value="XII RPL 1">XII RPL 1</option>
                        <option id="xiirpl2" value="XII RPL 2">XII RPL 2</option>
                        <option id="xiirpl3" value="XII RPL 3">XII RPL 3</option>
                        <option id="xiitkj1" value="XII TKJ 1">XII TKJ 1</option>
                        <option id="xiitkj2" value="XII TKJ 2">XII TKJ 2</option>
                        <option id="xiitkj3" value="XII TKJ 3">XII TKJ 3</option>
                        <option id="xiitelco" value="XII TELCO">XII TELCO</option>

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