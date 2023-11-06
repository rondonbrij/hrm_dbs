<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Record</title>
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
            text-align: left;
            width: 40%;
        }

        h1 {
            color: #00a7d0;
        }

        form {
            width: 100%;
            box-sizing: border-box;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #00a7d0;
            border-radius: 50px;
        }

        input[type="submit"] {
            padding: 10px;
            border-radius: 50px;
            border: 1px solid #00a7d0;
            width: 100%;
            /* padding: 10px; */
            margin: 5px 0;
            background-color: #333;
            color: #00a7d0;
            /* border: none; */
            /* border-radius: 5px; */
            cursor: pointer;
        }

        input[type="submit"]:hover {
            color: white;
            background-color: #00a7d0;
        }

        .back_btn {
            color: #00a7d0;
            padding: 5px;
            border-radius: 50px;
            border: 1px solid #00a7d0;
            text-decoration: none;
        }

        .back_btn:hover {
            color: white;
            background-color: #00a7d0;

        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add New Record</h1>

        <?php
        include "db_conn.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $program = $_POST["program"];
            $block = $_POST["block"];

            $sql = "INSERT INTO students (first_name, last_name, program, block) VALUES ('$first_name', '$last_name', '$program', '$block')";

            if ($conn->query($sql) === TRUE) {
                echo "New record added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        ?>

        <form method="post">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" required><br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" required><br>

            <label for="program">Program:</label>
            <input type="text" name="program" required><br>

            <label for="block">Block:</label>
            <input type="text" name="block" required><br>

            <input type="submit" value="Add Record">
        </form>
        <br>
        <a href="index.php" class="back_btn">Back to Records</a>
    </div>
</body>

</html>