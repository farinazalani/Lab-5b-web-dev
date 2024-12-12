<?php
include 'database.php';
if(isset($_POST['submit'])){
    $matric=$_POST['matric'];
    $name=$_POST['name'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    $sql="insert into `users` (matric,name,password,role)
    values('$matric','$name','$password','$role')";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo "Data Inserted Successfully";
        header('location:users_table.php');
    }else{
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #c51077;
            font-weight: bold;
            font-size: 24px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: left;
            font-size: 16px;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f2f2f2;
        }

        input[type="submit"] {
            background-color: #c51077;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #a3006a;
        }

        .login-link {
            margin-top: 20px;
            font-size: 16px;
            color: #c51077;
            text-decoration: none;
        }

        .login-link:hover {
            color: #a3006a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="" method="POST">
            <label>Matric:</label>
            <input type="text" name="matric" required>

            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <label>Role:</label>
            <select name="role" required>
                <option value="">Please select</option>
                <option value="student">Student</option>
                <option value="lecturer">Lecturer</option>
            </select>

            <input type="submit" name="submit" value="Submit">
        </form>
        <br>
        <a href="login.php" class="login-link">Already have an account? Login here</a>
    </div>
</body>
</html>