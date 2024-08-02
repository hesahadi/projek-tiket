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
    <title>Admin Dashboard</title>
</head>

<body>
    <div>
        <h1>Edit User</h1>
        <form action="updateuser.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div>
                <label for="username">Nama Konser:</label>
                <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>" required>
            </div>
            <input type="submit" value="simpan">
        </form>
    </div>
</body>

</html>