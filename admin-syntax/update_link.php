<?php
require_once "../koneksi/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $kelas = $_POST["update_kelas"];
  $newLink = $_POST["new_whatsapp_link"];

  // Perform some validation if needed, e.g., check if the provided link is valid.

  // Update the WhatsApp link in the database
  $sql = "UPDATE links SET link = '$newLink' WHERE kelas = '$kelas'";

  if (mysqli_query($conn, $sql)) {
    echo "WhatsApp link for class $kelas has been updated successfully!";
  } else {
    echo "Error updating WhatsApp link: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
