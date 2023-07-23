<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Syntax - Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/png" href="../img/syntax.png">
    
</head>

<style>
        /* Style for the filter form */
        form {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        label {
            margin-right: 10px;
            font-weight: bold;
        }

        select {
            padding: 8px;
            font-size: 14px;
        }

        input[type="submit"], a {
            padding: 8px 12px;
            text-decoration: none;
            font-size: 14px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .filter_container {
            display: flex;
            justify-content: space-between;
        }

        .update-link-container {
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

        .update-link-container label {
            margin-right: 10px;
            font-weight: bold;
        }

        .update-link-container select {
            padding: 8px;
            font-size: 14px;
        }

        .update-link-container input[type="submit"] {
            padding: 8px 12px;
            text-decoration: none;
            font-size: 14px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .updatelink {
        padding: 8px;
        font-size: 14px;
        background-color: rgba(51, 51, 51, 0.8);
        color: white;
        border: 1px solid #ccc;
        cursor: pointer;
        margin-left: 10px; /* Add a margin for spacing */
        margin-right: 10px;
        border-radius: 3px;
    }

    /* If you want to target the label elements inside the container, you can add this */
    .update-link-container label.updatelink {
        margin-right: 5px; /* Adjust the margin if needed */
    }
        /* Style for the table */
        /* table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        } */
    </style>
    
<body>
    <div class="container">
        <h1>User Data - Registration</h1>
        <div class="filter_container">

            <form method="POST">
                <label for="filter_kelas"></label>
                <select name="filter_kelas" id="filter_kelas">
                    <option value="">All</option>
                <option id="xdkv1" value="X DKV 1">X DKV 1</option>
                        <option id="xdkv2" value="X DKV 2">X DKV 2</option>
                        <option id="xdkv3" value="X DKV 3">X DKV 3</option>
                        <option id="xrpl1" value="X RPL 1">X RPL 1</option>
                        <option id="xrpl2" value="X RPL 2">X RPL 2</option>
                        <option id="xrpl3" value="X RPL 3">X RPL 3</option>
                        <option id="xtkj1" value="X TKJ 1">X TKJ 1</option>
                        <option id="xtkj2" value="X TKJ 2">X TKJ 2</option>
                        <option id="xtkj3" value="X TKJ 3">X TKJ 3</option>
                        <option id="xtrans" value="X TRANS">X TRANS</option>
                        <option id="xidkv1" value="XI DKV 1">XI DKV 1</option>
                        <option id="xidkv2" value="XI DKV 2">XI DKV 2</option>
                        <option id="xidkv3" value="XI DKV 3">XI DKV 3</option>
                        <option id="xirpl1" value="XI RPL 1">XI RPL 1</option>
                        <option id="xirpl2" value="XI RPL 2">XI RPL 2</option>
                        <option id="xirpl3" value="XI RPL 3">XI RPL 3</option>
                        <option id="xitkj1" value="XI TKJ 1">XI TKJ 1</option>
                        <option id="xitkj2" value="XI TKJ 2">XI TKJ 2</option>
                        <option id="xitkj3" value="XI TKJ 3">XI TKJ 3</option>
                        <option id="xitrans" value="XI TRANS">XI TRANS</option>
                        <option id="xiimm1" value="XII MM 1">XII MM 1</option>
                        <option id="xiimm2" value="XII MM 2">XII MM 2</option>
                        <option id="xiimm3" value="XII MM 3">XII MM 3</option>
                        <option id="xiirpl1" value="XII RPL 1">XII RPL 1</option>
                        <option id="xiirpl2" value="XII RPL 2">XII RPL 2</option>
                        <option id="xiirpl3" value="XII RPL 3">XII RPL 3</option>
                        <option id="xiitkj1" value="XII TKJ 1">XII TKJ 1</option>
                        <option id="xiitkj2" value="XII TKJ 2">XII TKJ 2</option>
                        <option id="xiitkj3" value="XII TKJ 3">XII TKJ 3</option>
                        <option id="xiitrans" value="XII TRANS">XII TRANS</option>
                <!-- more options if needed -->
            </select>
            <input type="submit" value="Filter">
        </form>
        <div class="update-link-container">
            <form method="POST">
                <select name="update_kelas" id="update_kelas">
                    <option value="" disabled selected>Kelas</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                    <!-- Add the same class options here -->
                </select>
                <input class="updatelink" type="text" name="new_whatsapp_link" id="new_whatsapp_link" placeholder="Update Link"/>
                <input type="submit" value="Update" />
            </form>
        </div>
            <div>
                <p><a href="export.php">Export data</a></p>
            </div>
        </div>

        <table>
            <div class="container">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Nomor NIS</th>
                <th>Phone Number</th>
                <th>Hobby</th>
                <th>Alasan</th>
            </tr>
            </div>

            <?php
            require_once "../koneksi/koneksi.php";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Filter condition
            $filter_kelas = isset($_POST['filter_kelas']) ? $_POST['filter_kelas'] : "";


            if (!empty($filter_kelas)) {
                $sql = "SELECT * FROM pendaftaran WHERE kelas = '$filter_kelas'";
            } else {
                $sql = "SELECT * FROM pendaftaran";
            }

            $result = mysqli_query($conn, $sql);

            // Loop through each row of data and display it in a table
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['kelas'] . "</td>";
                echo "<td>" . $row['nis'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['hobby'] . "</td>";
                echo "<td>" . $row['alasan'] . "</td>";
                echo "</tr>";
            }

            

            if (isset($_POST["update_kelas"]) && isset($_POST["new_whatsapp_link"])) {
                $lnkkelas = $_POST["update_kelas"];
                $newLink = $_POST["new_whatsapp_link"];

  // Perform some validation if needed, e.g., check if the provided link is valid.

  // Update the WhatsApp link in the database
  $sql = "UPDATE links SET link = '$newLink' WHERE lnkkelas = '$lnkkelas'";

  if (mysqli_query($conn, $sql)) {
    echo "";
  } else {
    echo "" . mysqli_error($conn);
  }
            }
  // Close the database connection
  mysqli_close($conn);
?>

<script>
  // Function to handle the form submission and show the alert message
  document.getElementById('update-link-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Get the form data
    const formData = new FormData(event.target);

    // Perform some validation if needed, e.g., check if the provided link is valid.

    // Use fetch to submit the form data to the server
    fetch(event.target.action, {
      method: 'POST',
      body: formData
    })
    .then(response => {
      // Check if the response was successful
      if (response.ok) {
        // Show the alert message when the link is successfully updated
        alert('Link berhasil di ubah');
      } else {
        // Handle errors if necessary
        alert('Gagal mengubah link');
      }
    })
    .catch(error => {
      // Handle errors if necessary
      console.error('Error:', error);
    });
  });
</script>

        </table>
    </div>
</body>

</html>
