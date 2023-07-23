<!DOCTYPE html>
<html>
<head>
    <title>Syntax - Verify</title>
    <link rel="icon" type="image/png" href="../img/syntax.png">
</head>

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


<body>
<div class="card">
    <h2>Pengaturan Kode Verifikasi</h2>
    <form action="./save_verification_code.php" method="post">
        <label for="verification_code">Kode Verifikasi:</label>
        <input type="text" id="verification_code" name="verification_code" required><br>
        <input type="submit" value="Simpan Kode">
    </form>
    </div>



    

</body>
</html>

