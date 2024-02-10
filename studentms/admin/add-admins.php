<?php
session_start();
include_once('includes/dbconnection.php');

// Code for adding administrators
if(isset($_POST['submit'])) {
    $adminname = $_POST['adminname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $password = md5($_POST['password']);
    $mobileNumber = $_POST['mobileNumber']; // Added line to get mobile number

    $sql = "INSERT INTO tbladmin (AdminName, UserName, Email, Birthday, Password, MobileNumber) VALUES (:adminname, :username, :email, :birthday, :password, :mobileNumber)"; // Updated SQL query
    $query = $dbh->prepare($sql);
    $query->bindParam(':adminname', $adminname, PDO::PARAM_STR);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':birthday', $birthday, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':mobileNumber', $mobileNumber, PDO::PARAM_INT); // Added line to bind mobile number parameter
    
    if ($query->execute()) {
        echo "<script>alert('Administrator added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add administrator');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Administrator</title>
    <link rel="icon" href="../images/BCSHSLogo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Add Administrator</h2>
    <form method="post" action="" class="needs-validation" novalidate>
        <!-- Mobile Number Field -->
        <div class="form-group">
            <label for="mobileNumber">Mobile Number</label>
            <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="Enter Mobile Number" required>
            <div class="invalid-feedback">Please enter the mobile number.</div>
        </div>
        <!-- End of Mobile Number Field -->
        <!-- Remaining Fields -->
        <div class="form-group">
            <label for="adminname">Administrator Name</label>
            <input type="text" class="form-control" id="adminname" name="adminname" placeholder="Enter Name" required>
            <div class="invalid-feedback">Please enter the administrator name.</div>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
            <div class="invalid-feedback">Please enter the username.</div>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
            <div class="invalid-feedback">Please enter a valid email address.</div>
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday" required>
            <div class="invalid-feedback">Please enter the birthday.</div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
            <div class="invalid-feedback">Please enter the password.</div>
        </div>
        <!-- Remaining Fields -->
        <button type="submit" class="btn btn-primary" name="submit">Add Administrator</button>
    </form>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
// Form validation using Bootstrap's built-in form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>
</body>
</html>
