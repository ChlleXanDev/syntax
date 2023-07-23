<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	</style>

</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Nis</th>
            <th>Telp</th>
            <th>Hoby</th>
            <th>Alasan</th>
        </tr>
        <?php
            require_once "../koneksi/koneksi.php";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
                $sql = "SELECT * FROM pendaftaran";
            $result = mysqli_query($conn, $sql);
            $no = 0;
            // Loop through each row of data and display it in a table
            while ($row = mysqli_fetch_assoc($result)) {
                $no++;
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['kelas'] . "</td>";
                echo "<td>" . $row['nis'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['hobby'] . "</td>";
                echo "<td>" . $row['alasan'] . "</td>";
                echo "</tr>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
    </table>
</body>
</html>
