<?php
include 'partials/_connection.php';
if ($conn) {
    // echo " success";
    $select_qry = "SELECT * FROm stud_details";
    $res = mysqli_query($conn, $select_qry);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <style>
        main {
            background: rgb(213, 85, 213);
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            padding: 50px 0;
        }

        table {
            width: 90%;
            background: white;
        }

        td:has(a) {
            display: flex;
            justify-content: space-evenly;
        }

        td:has(a) a {
            text-decoration: none;
            color: white;
            background: green;
            padding: 5px 15px;
            border-radius: 20px;
        }

        td:has(a) a:nth-child(2) {
            background: red;
        }
    </style>
</head>

<body>
    <main>
        <table border="5">
            <tr>
                <th>Roll No.</th>
                <th>Photo</th>
                <th>Firs Name</th>
                <th>Last Name</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th width="15%">Operations</th>
            </tr>
            <?php
            if ($res) {
                // echo "Record Found";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo '<tr>
                    <td>' . $row['stud_id'] . '</td>
                    <td> <img src="' . $row['image'] . '" alt="Student Image" height="50px"></td>
                <td>' . $row['fname'] . '</td>
                <td>' . $row['lname'] . '</td>
                <td>' . $row['pass'] . '</td>
                <td>' . $row['gender'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['mobile'] . '</td>
                <td>' . $row['address'] . '</td>
                <td><a href="update.php?roll=' . $row['stud_id'] . '" target="_blank">Update</a><a href="delete.php?roll=' . $row['stud_id'] . '" onclick = "return check_delete()">Delete</a></td>
                </tr>';
                }
            } else {
                echo "Records do not found";
            }
            ?>

        </table>
    </main>
    <script>
        function check_delete(){
            return confirm("Are you sure ? you want to delete record.");
        }
    </script>
</body>

</html>