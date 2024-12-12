<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>User Table</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 20px;
            padding: 20px;
        }

        /* Styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Table headers */
        table th {
            background-color: #c51077;
            color: white;
            text-align: left;
            padding: 10px;
        }

        /* Table cells */
        table td {
            padding: 10px;
            border: 1px solid #dddddd;
        }

        /* Alternating row colors */
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Hover effect on rows */
        table tr:hover {
            background-color: #ddd;
        }

        /* Logout link styling */
        .logout-link {
            text-decoration: none;
            color: #c51077;
            font-weight: bold;
        }

        .logout-link:hover {
            color: #a3006a;
        }

    </style>
</head>
<body>

    <?php
    include 'database.php';

    $sql = "SELECT * FROM users";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Matric</th>
                    <th>Name</th>
                    <th>Role</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["matric"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["role"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $con->close();
    ?>
    <a href="users_table.php" class="logout-link">More Details to Update And Delete</a>
    <br><br>
    <a href="logout.php" style="text-decoration: none; color: red; font-weight: bold;">Logout</a>

</body>
</html>