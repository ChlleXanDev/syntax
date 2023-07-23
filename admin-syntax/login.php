<?php

require_once "../koneksi/koneksi.php";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Periksa koneksi database
if (!$conn) {
  die("Koneksi database gagal: " . mysqli_connect_error());
}

// Fungsi untuk memvalidasi login
function validate_login($email, $password) {
  global $conn;
  $email = mysqli_real_escape_string($conn, $email);
  $password = mysqli_real_escape_string($conn, $password);

  $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    return true; // Login berhasil
  } else {
    return false; // Login gagal
  }
}

// Memeriksa apakah data login telah dikirimkan
$login_failed = false;
if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (validate_login($email, $password)) {
    // Login berhasil, alihkan ke halaman data.php
    header("Location: data.php");
    exit();
  } else {
    $login_failed = true;
  }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head> 
<link rel="icon" type="image/png" href="../img/syntax.png">
  <title>Syntax - Admin</title>
  <style>
    body {
      background: url("../img/back.jpg") center/cover no-repeat; /* Updated background property */
    backdrop-filter: blur(8px);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }
    
    .card {
      background-color: rgba(0, 0, 0, 0.5);
      color: #fff;
      border-radius: 8px;
      padding: 20px;
      width: 300px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .card h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .card input[type="text"],
    .card input[type="password"] {
      width: 94%;
      padding: 10px;
      margin-bottom: 10px;
      border: none;
      background-color: #444;
      color: #fff;
      border-radius: 4px;
    }
    
    .card input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #777;
      color: #fff;
      border-radius: 4px;
      cursor: pointer;
    }
    
    .card input[type="submit"]:hover {
      background-color: #999;
    }
    
    .error-message {
      color: #ff3333;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>Login</h2>
    <form action="login.php" method="POST">
      <input type="text" name="email" placeholder="email" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <input type="submit" value="Login">
      <?php if ($login_failed): ?>
        <div class="error-message">Login gagal. email atau password salah.</div>
      <?php endif; ?>
    </form>
  </div>
</body>
</html>
