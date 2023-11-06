<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRM_DATABASE</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            color: #00a7d0;
        }

        h3 {
            color: #00a7d0;
        }

        table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        table,
        th,
        td {
            border: 1px solid #00a7d0;
        }

        th,
        td {
            padding: 10px;
        }

        th {
            background-color: #00a7d0;
            color: #1a1a1a;
        }

        tr:nth-child(even) {
            background-color: #333;
        }

        tr:nth-child(odd) {
            background-color: #222;
        }

        a {
            text-decoration: none;
            color: #00a7d0;
        }

        .add_btn {
            padding: 10px;
            border-radius: 50px;
            border: 1px solid #00a7d0;
            width: 100%;

        }

        .add_btn:hover {
            color: white;
            background-color: #00a7d0;

        }
    </style>
</head>

<body>
    <h1>HRM Project</h1>
    <h3>Submitted by: Ronillynuel James Agum</h3>

    <?php
    include "db_conn.php";

    $sql = "SELECT idstudents, first_name, last_name, program, block FROM hrm_project.students";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Program</th>
                        <th>Block</th>
                        <th>Actions</th>
                    </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["idstudents"] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row["program"] . "</td>";
            echo "<td>" . $row["block"] . "</td>";
            echo "<td><a href='edit_update_record.php?edit={$row['idstudents']}'>EDIT</a> | <a href='delete_record.php?del={$row['idstudents']}'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results";
    }
    $conn->close();
    ?>

    <br>
    <a href="add_record.php" class="add_btn">Add New Record</a>
</body>

</html>