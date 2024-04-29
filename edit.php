<?php
include 'conn.php';

// Check if edit_id parameter is provided
if(isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    // Fetch user data from dbziru table
    $result = mysqli_query($connection, "SELECT * FROM dbziru WHERE user_id='$edit_id'");
    $row = mysqli_fetch_assoc($result);

    // Assign fetched data to variables
    $username = $row['username'];
    $fullname = $row['fullname'];
    $course = $row['course'];
    $email = $row['email'];
    $contact = $row['contact'];
} else {
    // Redirect if edit_id is not provided
    header("Location: edit.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $username; ?>"><br><br>
        <label>Fullname:</label>
        <input type="text" name="fullname" value="<?php echo $fullname; ?>"><br><br>
        <label>Course:</label>
        <input type="text" name="course" value="<?php echo $course; ?>"><br><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>"><br><br>
        <label>Contact:</label>
        <input type="text" name="contact" value="<?php echo $contact; ?>"><br><br>
        <input type="submit" name="submit" value="Update">
    </form>


  

</body>
</html>
