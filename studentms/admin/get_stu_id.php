<?php
$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "studentmsdb";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


if (isset($_GET['student_name'])) {
    $student_name = $_GET['student_name'];
    
    // Query the database to get StuID based on student name
    $sql = "SELECT StuID FROM tblstudent WHERE StudentName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_name);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['StuID'];
    } else {
        echo "Student ID not found";
    }
} else {
    echo "Invalid request";
}
?>

