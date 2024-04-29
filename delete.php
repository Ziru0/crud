<?php
include 'conn.php';

if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    
    $sql = "DELETE FROM dbziru WHERE user_id=$delete_id";

    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
        echo "<script>window.location='crud.php'</script>";
    } else {
        echo "Error deleting record: " . $connection->error;
        echo "<script>window.location='crud.php'</script>";
    }
}

$connection->close();
?>
