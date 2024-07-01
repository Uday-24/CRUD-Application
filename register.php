<?php include 'partials/_connection.php' ?>
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
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="title">
                    <h1>Registration Form</h1>
                </div>
                <div class="details">
                    <div class="image">
                        <label for="image">Your Photo</label>
                        <input type="file" id="image" name="image" style="border: none" required>
                    </div>
                    <div class="fname">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" required>
                    </div>
                    <div class="lname">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" required>
                    </div>
                    <div class="pass">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" name="pass" required>
                    </div>
                    <div class="cpass">
                        <label for="cpass">Confirm Password</label>
                        <input type="password" id="cpass" name="cpass" required>
                    </div>
                    <div class="gender">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender">
                            <option value="noselect">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="email">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="phone">
                        <label for="phone">Mobile</label>
                        <input type="number" id="phone" name="phone" required>
                    </div>
                    <div class="address">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" required></textarea>
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

<?php
if ($conn) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // echo "Post";

        $name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $folder = "Images/".$name;
        // echo $name . " ". $tmp_name;
        move_uploaded_file($tmp_name, $folder);

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        if ($pass == $cpass) {
            // echo "Password matched";
            $exist_qry = "SELECT * FROM stud_details WHERE email = '$email'";
            $res = mysqli_query($conn, $exist_qry);
            $row = mysqli_fetch_row($res);
            if ($row > 0) {
                echo "User exist";
            } else {
                // echo "Register successful";
                $insert_qry = "INSERT INTO `stud_details` (`image`,`fname`, `lname`, `pass`, `gender`, `email`, `mobile`, `address`) VALUES ('$folder','$fname', '$lname', '$pass', '$gender', '$email', '$phone', '$address')";
                $res = mysqli_query($conn, $insert_qry);
                if ($res) {
                    echo "data inserted";
                } else {
                    echo "Error";
                }
            }
        } else {
            echo "<script>alert('Password does not matched')</script>";
        }
    }
}
?>