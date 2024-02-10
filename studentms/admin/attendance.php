<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance</title>
    <link rel="icon" href="../images/BCSHSLogo.ico" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        select {
            height: 38px;
        }
        button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .success {
            color: green;
            font-weight: bold;
            text-align: center;
        }
        .error {
            color: red;
            font-weight: bold;
            text-align: center;
        }
    </style>
    <script>
        function getStuID() {
            var studentName = document.getElementById('student_name').value;
            if (studentName.trim() !== '') {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('stu_id').value = this.responseText;
                    }
                };
                xhr.open('GET', 'get_stu_id.php?student_name=' + studentName, true);
                xhr.send();
            }
        }

        function showAlertAndRedirect() {
            alert("Attendance Recorded Successfully");
            window.location.href = "manage-class.php";
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Student Attendance</h1>
        
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "studentmsdb";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Form submission handling
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $student_name = $_POST["student_name"];
            $student_class = $_POST["student_class"];
            $stu_id = $_POST["stu_id"];
            $status = $_POST["status"];
            $date = $_POST["date"];
            $time_in = $_POST["time_in"];
            $time_out = $_POST["time_out"];
            
            // SQL query to insert attendance record
            $sql = "INSERT INTO tblattendance (StudentName, StudentClass, StuID, Status, Date, TimeIN, TimeOUT)
                    VALUES ('$student_name', '$student_class', '$stu_id', '$status', '$date', '$time_in', '$time_out')";

            // Execute SQL query
            if ($conn->query($sql) === TRUE) {
                // JavaScript alert for successful submission
                echo '<script>showAlertAndRedirect();</script>';
            } else {
                // Error message if insertion fails
                echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        }

        $conn->close();
        ?>

        <!-- Form to input attendance data -->
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <label for="student_name">Student Name:</label>
            <input type="text" id="student_name" name="student_name" onchange="getStuID()" placeholder="Enter student name" required>
            
            <label for="student_class">Student Class:</label>
            <select id="student_class" name="student_class" required>
                <option value="">Select Class</option>
                <?php
                // Populate with class data from database
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT ClassName FROM tblclass";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["ClassName"] . "'>" . $row["ClassName"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No classes found</option>";
                }
                $conn->close();
                ?>
            </select>
            
            <label for="stu_id">Student ID:</label>
            <input type="text" id="stu_id" name="stu_id" required readonly>
            
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="">Select Status</option>
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
            </select>
            
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            
            <label for="time_in">Time In:</label>
            <input type="time" id="time_in" name="time_in">
            
            <label for="time_out">Time Out:</label>
            <input type="time" id="time_out" name="time_out">
            
            <button type="submit">Submit Attendance</button>
        </form>
    </div>
</body>
</html>
