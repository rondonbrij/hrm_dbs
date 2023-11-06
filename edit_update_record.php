<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit/Update Student Record</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #00a7d0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 40%;
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            text-align: left;
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
            width: 100%;
            padding: 10px;
            border-radius: 50px;
            border: 1px solid #00a7d0;
            background-color: #333;
            color: #00a7d0;
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
        <h1>Edit/Update Record</h1>

        <?php
        include "db_conn.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $program = $_POST["program"];
            $block = $_POST["block"];

            $sql = "UPDATE students 
                    SET first_name='$first_name', last_name='$last_name', program='$program', block='$block' 
                    WHERE idstudents=$id";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully!";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $sql = "SELECT idstudents, first_name, last_name, program, block FROM students WHERE idstudents = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                    <form action="edit_update_record.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['idstudents']; ?>">

                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"><br>

                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"><br>

                        <label for="program">Program:</label>
                        <input type="text" name="program" value="<?php echo $row['program']; ?>"><br>

                        <label for="block">Block:</label>
                        <input type="text" name="block" value="<?php echo $row['block']; ?>"><br>

                        <input type="submit" value="Update Record">
                    </form>
                <?php
            } else {
                echo "Record not found.";
            }
        } else {
            echo "Invalid request.";
        }

        $conn->close();
        ?>

        <br>
        <a href="index.php" class="back_btn">Back to Records</a>
    </div>
</body>

</html>