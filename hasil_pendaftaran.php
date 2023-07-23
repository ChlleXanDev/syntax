<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="./img/syntax.png">
<head>
    <title>Syntax - Record</title>
    <style>
        body {
            background: url("./img/back.jpg") center/cover no-repeat; /* Updated background property */
            backdrop-filter: blur(8px);
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            flex-direction: column;
        }

        h2 {
            color: #fff;
            margin-bottom: 20px;
        }

        p {
            color: #fff;
            margin-bottom: 10px;
        }

        a {
            color: gray;
            text-decoration: none; /* Menghilangkan garis bawah pada tautan */

            margin-left: 20px;
        }

        /* Gaya tautan saat diarahkan dengan mouse */
        a:hover {
            color: white;
            text-decoration: underline; /* Efek garis bawah saat dihover */
        }

        .redirect {
            display: flex;
            gap: 1em;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border-radius: 8px;
            padding: 20px;
            width: auto;
            height: auto;
            max-width: 300px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card p {
            margin-bottom: 5px;
        }

        .whatsapp {
            color: red;
            left: 10px;
        }

        .whatsapp:hover {
            color: orange;
        }

        @media(max-width: 700px){
            p {
                font-size: 14px; /* Ubah ukuran font paragraf menjadi 14px */
                margin-bottom: 5px; /* Ubah margin bawah paragraf menjadi 5px */
            }
            .card {
                width: 250px; /* Ubah lebar card menjadi 250px */
                
            }
            .form-title {
                font-size: 20px; /* Ubah ukuran font form-title menjadi 20px */
            }
            .logo {
                max-width: 100px; /* Ubah lebar maksimum logo menjadi 100px */
            }
        }



    </style>
</head>

<body>
    <h2>Hasil Pendaftaran</h2>

    <?php
    // Koneksi ke database
    require_once "./koneksi/koneksi.php";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data pendaftaran terbaru
    $sql = "SELECT * FROM pendaftaran ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $status = "Diterima";
        $kelas = $row['kelas'];
        $FormClass = $row['FormClass'];
    
        echo "<div class='card'>";
        echo "<p>Selamat, $nama! Pendaftaran Anda telah Diterima.</p>";
        echo "<p>Terima kasih telah Bergabung.</p>";
        echo "<br>";
        echo "<p>Silahkan bergabung di grup WhatsApp</p>";

        // Tautan WhatsApp sesuai dengan kelas yang dipilih
    $linkWhatsApp = ""; // Variable untuk menyimpan tautan WhatsApp

    $query = "SELECT link FROM links WHERE lnkkelas = '$FormClass'";
    $resultLink = $conn->query($query);

    if ($resultLink->num_rows > 0) {
        $rowLink = $resultLink->fetch_assoc();
        $linkWhatsApp = $rowLink['link'];
    } else {
        echo "<p>Kelas tidak valid</p>";
    }
// end
echo "<p> Syntax Kelas<strong> $FormClass</strong><a class='whatsapp' href='$linkWhatsApp'>Bergabung</a></p>";

        echo "<br>";
        echo "<br>";
        // start redirect
        echo "<div class='redirect'>";
        // website
        echo "<div class=''>";
        echo "<p><a href='#'>Website</a></p>";
        echo "</div>";
        // end website

        // discord
        echo "<div class=''>";
        echo "<p><a href='#'>Discord</a></p>";
        echo "</div>";
        // end discord

        // instagram
        echo "<div class=''>";
        echo "<p><a href='#'>Instagram</a></p>";
        echo "</div>";
        // end instagram
        echo "</div>";
        // end redirect

        echo "";
        echo "";
        // echo "<p>Selamat Bergabung.</p>";
        echo "<footer style='color: #cfe0e3; margin-top: 50px; font-size: 12px;'>";
        echo "&copy; " . date("Y") . " Syntax. All rights reserved.";
        echo "</footer>";
        echo "</div>";
    } else {
        echo "<p>Pendaftaran tidak ditemukan.</p>";
    }

    $conn->close();
    ?>


</body>

</html>