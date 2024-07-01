<?php include 'partials/_connection.php' ?>
<?php
if ($conn) {

    $roll = $_GET['roll'];
    $select_qry = "SELECT * FROM stud_details WHERE stud_id='$roll'";
    $res = mysqli_query($conn, $select_qry);
    $row = mysqli_fetch_row($res);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // echo "Post";
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        if ($pass == $cpass) {
            $update_qry = "UPDATE `stud_details` SET `fname`='$fname', `lname`='$lname', `pass`='$pass', `gender`='$gender', `email`='$email', `mobile`='$phone', `address`='$address' WHERE `stud_id`=$roll";

            $res = mysqli_query($conn, $update_qry);

            if ($res) {
                echo "<script>alert('Data Updated')</script>";
                ?>
                <meta http-equiv="refresh" content="0; url=display.php" />;
                <?php 
            } else {
                echo "Error";
            }
        } else {
            echo "<script>alert('Password does not matched')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partials/register.css">
    <title>RegisterForm</title>
</head>

<body>
    <main>
        <div class="container">
            <form action="#" method="POST">
                <div class="title">
                    <h1>Registration Form</h1>
                </div>
                <div class="details">
                    <div class="fname">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" value="<?php echo $row[1] ?>" required>
                    </div>
                    <div class="lname">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" value="<?php echo $row[2] ?>" required>
                    </div>
                    <div class="pass">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" name="pass" value="<?php echo $row[3] ?>" required>
                    </div>
                    <div class="cpass">
                        <label for="cpass">Confirm Password</label>
                        <input type="password" id="cpass" name="cpass" value="<?php echo $row[3] ?>" required>
                    </div>
                    <div class="gender">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender">
                            <option value="noselect">Select</option>
                            <option value="male"
                            <?php
                                    if($row[4] == "male"){
                                        echo "selected";
                                    }
                                ?>
                            >Male</option>
                            <option value="female"
                            <?php
                                    if($row[4] == "female"){
                                        echo "selected";
                                    }
                                ?>
                            >Female</option>
                        </select>
                    </div>
                    <div class="email">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $row[5] ?>" required>
                    </div>
                    <div class="phone">
                        <label for="phone">Mobile</label>
                        <input type="number" id="phone" name="phone" value="<?php echo $row[6] ?>" required>
                    </div>
                    <div class="address">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" required><?php echo $row[7] ?></textarea>
                    </div>
                    <div class="terms">
                        <input type="checkbox">
                        <span>Agree to tems and conditions</span>
                    </div>
                    <div class="submit">
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

</body>

</html>