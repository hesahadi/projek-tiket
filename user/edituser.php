<?php
// Fetch existing data for the form
$id = $_GET['id'];

include '../koneksi.php';

$sql = "SELECT * FROM user WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Admin Dashboard</title>
    <style>
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
    </style>
</head>

<body>
    <header>
        <h1>Edit User</h1>
    </header>
    <nav>
        <a href="user.php">Kembali</a>
    </nav>
    <div class="form-container">
        <form action="updateuser.php" method="POST">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="username">Nama:</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" value="<?php echo $row['password']; ?>" required>
            </div>
            <input type="submit" value="UPDATE" class="btn btn-primary btn-block">
        </form>
    </div>
    <footer>&copy; 2023 Admin Dashboard</footer>
</body>

</html>