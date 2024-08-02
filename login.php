<?php

session_start();
include("koneksi.php");

$message = '';
$message_color = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email == "admin" && $password == "admin") {
        $_SESSION['username'] = 'admin';
        header("Location: admin/user.php");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username'];
            header("Location: user/home.php");
            exit();
        } else {
            $message = "Login gagal: Email atau password salah.";
            $message_color = 'red';
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #3498db, #8e44ad);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-container h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            height: 45px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #3498db;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .bottom-text {
            margin-top: 20px;
        }

        .bottom-text a {
            color: #3498db;
            text-decoration: none;
        }

        .bottom-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>LOGIN</h1>
        <?php
        if (!empty($message)) {
            echo '<p style="color:' . $message_color . ';">' . $message . '</p>';
        }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="bottom-text">
            <p>Belum Punya Akun? <a href="register.php">Register Disini </a></p>
        </div>
    </div>
</body>

</html>