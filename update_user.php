<?php
include 'database.php';
$matric = $_GET['matric'];

// Fetch user data from database
$sql = "SELECT * FROM `users` WHERE matric = '$matric'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

// Check if user exists
if (!$row) {
    echo "User  not found";
    exit;
}

// Update user data
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Update query
    $sql = "UPDATE `users` SET name = '$name', password = '$password', role = '$role' WHERE matric = '$matric'";
    $result = mysqli_query($con, $sql);

    // Check if update was successful
    if ($result) {
        header('location: users_table.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Update User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            box-sizing: border-box;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f7f7f7;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #c51077;
            text-align: left;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            text-align: left;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #c51077;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #a3006a;
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #c51077;
            font-weight: bold;
        }

        a:hover {
            color: #a3006a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="color: #c51077;">Update User</h2>
        <form method="POST" action="">
            <label for="matric">Matric:</label>
            <input type="text" id="matric" name="matric" value="<?php echo $row['matric']; ?>" readonly>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>" required>

            <label for="role">Role:</label>
            <select name="role" required>
                <option value="<?php echo $row['role']; ?>">Please select</option>
                <option value="student">Student</option>
                <option value="lecturer">Lecturer</option>
            </select>

            <button type="submit" name="submit">Update</button>
        </form>
        <a href="users_table.php">Back to User List</a>
    </div>
</body>
</html>