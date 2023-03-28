<?php
require "header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "insert into users values ('$fname', '$lname', '$uname', '$email', '$password')";
    $checkQuery = "select * from users where username = '$uname' or email = '$email'";
    $result = mysqli_query($connection, $checkQuery);
    if($result) {
        if (mysqli_num_rows($result) != 0) {
            echo "User already exists with this name and/or email <br>";
            echo "<a href='lab9-1.html'>Return to user entry</a>";

        } else {
            if (mysqli_query($connection, $sql)) {
                echo "An account for the user '$uname' has been created";
            } else {
                echo "Inserting Issues";
            }
        }
    } else {
        echo "Checking Issues";
    }
}
mysqli_close($connection);
?>
</html>
