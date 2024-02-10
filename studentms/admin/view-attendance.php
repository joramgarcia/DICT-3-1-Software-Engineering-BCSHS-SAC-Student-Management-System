<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <link rel="icon" href="../images/BCSHSLogo.ico" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td {
            padding: 10px 15px;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>View Attendance</h1>
    <table>
        <tr>
            <th>Student Name</th>
            <th>Student Class</th>
            <th>Status</th>
            <th>Date</th>
            <th>Time In</th>
            <th>Time Out</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "studentmsdb";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM tblattendance";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["StudentName"] . "</td>";
                echo "<td>" . $row["StudentClass"] . "</td>";
                echo "<td>" . $row["Status"] . "</td>";
                echo "<td>" . $row["Date"] . "</td>";
                echo "<td>" . date("h:i A", strtotime($row["TimeIN"])) . "</td>"; // Format Time In in 12-hour format
                echo "<td>" . ($row["TimeOUT"] ? date("h:i A", strtotime($row["TimeOUT"])) : "") . "</td>"; // Format Time Out in 12-hour format if not null
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No attendance records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <a href="manage-class.php" class="btn-back">Back to Manage Class</a>
</body>
</html>
