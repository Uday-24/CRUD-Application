<?php
include 'partials/_connection.php';
$roll = $_GET['roll'];
$delete_qry = "DELETE FROM stud_details WHERE stud_id='$roll'";
$res = mysqli_query($conn, $delete_qry);
if ($res) {
    echo "<script>alert('Record deleted')</script>";
    ?>
    <meta http-equiv="refresh" content="0; url=display.php" />;
    <?php
} else {
    echo "Error";
}
?>