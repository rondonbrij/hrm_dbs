<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student Record</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #00a7d0;
            font-family: Arial, sans-serif;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            width: 40%;
        }

        h1 {
            color: #ff0000;
        }

        .message {
            color: #00a7d0;
        }

        .back-btn {
            padding: 5px 20px;
            border-radius: 50px;
            background-color: #00a7d0;
            color: white;
            text-decoration: none;
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include "db_conn.php";

        if (isset($_GET['del'])) {
            $id = $_GET['del'];
            $sql = "SELECT idstudents, first_name, last_name, program, block FROM students WHERE idstudents = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                $deleteSql = "DELETE FROM students WHERE idstudents = $id";
                if ($conn->query($deleteSql) === TRUE) {
                    echo "<h1>Record deleted successfully!</h1>";
                } else {
                    echo "<h1>Error deleting record: " . $conn->error . "</h1>";
                }
                ?>
                <p class="message">ID:
                    <?php echo $row["idstudents"]; ?><br>
                    Name:
                    <?php echo $row["first_name"] . ' ' . $row["last_name"]; ?><br>
                    Program:
                    <?php echo $row["program"]; ?><br>
                    Block:
                    <?php echo $row["block"]; ?>
                </p>
                <a href="index.php" class="back-btn">Back to Records</a>
                <?php
            } else {
                echo "<h1>Record not found.</h1>";
            }
        } else {
            echo "<h1>Invalid request.</h1>";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>