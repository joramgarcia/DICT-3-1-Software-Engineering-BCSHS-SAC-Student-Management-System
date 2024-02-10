<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "studentmsdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$studentName = "";
$attendanceData = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_name'])) {
    $studentName = $_POST['student_name'];

    // Validate student name
    $sql = "SELECT * FROM tblattendance WHERE StudentName = '$studentName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Student found, retrieve attendance records
        $student = $result->fetch_assoc();
        $studentID = $student['StuID'];
        
        $sql_attendance = "SELECT * FROM tblattendance WHERE StuID = '$studentID'";
        $result_attendance = $conn->query($sql_attendance);

        if ($result_attendance->num_rows > 0) {
            // Fetch attendance data
            while ($row = $result_attendance->fetch_assoc()) {
                $attendanceData[] = $row;
            }
        } else {
            echo "No attendance records found for $studentName.";
        }
    } else {
        echo "Student $studentName not found.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View My Attendance</title>
    <link rel="icon" href="../images/BCSHSLogo.ico" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: grid;
            place-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            width: 100%;
        }

        h2, h3 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 8px;
        }

        input[type="text"] {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 100%;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="text"]::placeholder {
            font-size: 14px;
            color: #999;
        }

        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Attendance View</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="student_name">Student Name:</label>
            <input type="text" name="student_name" id="student_name" placeholder="Enter your name" required>
            <input type="submit" value="View My Attendance">
        </form>

        <?php if (!empty($studentName)): ?>
            <h3>Viewing attendance for: <?php echo $studentName; ?></h3>
        <?php endif; ?>

        <?php if (!empty($attendanceData)): ?>
        <h3>Attendance Records:</h3>
        <table>
            <tr>
                <th>Date</th>
                <th>Status</th>
                <th>Time IN</th>
                <th>Time OUT</th>
            </tr>
            <?php foreach ($attendanceData as $row): ?>
            <tr>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo $row['Status']; ?></td>
                <td><?php echo date('h:i A', strtotime($row['TimeIN'])); ?></td>
                <td><?php echo date('h:i A', strtotime($row['TimeOUT'])); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</body>
</html>

