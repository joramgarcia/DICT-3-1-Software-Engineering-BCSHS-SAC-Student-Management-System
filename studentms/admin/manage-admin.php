<?php
// Database connection parameters
$db_host = 'localhost'; 
$db_name = 'studentmsdb'; 
$db_user = 'root'; 
$db_pass = ''; 

try {
    // Establish PDO database connection
    $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    // Set PDO to throw exceptions
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle database connection error
    echo "Connection failed: " . $e->getMessage();
    die(); // Terminate script execution
}

// Code for updating administrators
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $adminname = $_POST['adminname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];

    $sql = "UPDATE tbladmin SET AdminName = :adminname, UserName = :username, Email = :email, Birthday = :birthday WHERE ID = :id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':adminname', $adminname, PDO::PARAM_STR);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':birthday', $birthday, PDO::PARAM_STR);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($query->execute()) {
        echo "<script>alert('Administrator updated successfully');</script>";
    } else {
        echo "<script>alert('Failed to update administrator');</script>";
    }
}

// Code for deleting administrators
if(isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM tbladmin WHERE ID = :id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($query->execute()) {
        echo "<script>alert('Administrator deleted successfully');</script>";
    } else {
        echo "<script>alert('Failed to delete administrator');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Administrators</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Manage Administrators</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Administrator Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Birthday</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all administrators from the database
            $sql = "SELECT * FROM tbladmin";
            $query = $dbh->prepare($sql);
            $query->execute();
            $admins = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($admins as $admin) {
                echo "<tr>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='id' value='{$admin['ID']}'>";
                echo "<td>{$admin['ID']}</td>";
                echo "<td><input type='text' name='adminname' value='{$admin['AdminName']}'></td>";
                echo "<td><input type='text' name='username' value='{$admin['UserName']}'></td>";
                echo "<td><input type='email' name='email' value='{$admin['Email']}'></td>";
                echo "<td><input type='date' name='birthday' value='{$admin['Birthday']}'></td>";
                echo "<td>";
                echo "<button type='submit' name='update' class='btn btn-primary'>Update</button>";
                echo "&nbsp;";
                echo "<button type='submit' name='delete' class='btn btn-danger'>Delete</button>";
                echo "</td>";
                echo "</form>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
