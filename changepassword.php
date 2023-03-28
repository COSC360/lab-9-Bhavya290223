<?php 
require "header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uname = $_POST['username'];
    $opw = md5($_POST['oldpassword']);
    $npw = md5($_POST['newpassword']);

    if (isset($uname) && isset($opw) && isset($npw)) {
        $sql = "select * from users where username = '$uname' and password = '$opw'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) != 0) {
            $update = "update users set password = '$npw' where username = '$uname'";
            if (mysqli_query($connection, $update)) {
                echo "User's password has been updated";
            } else {
                echo "Update Error!";
            }
            
        } else {
            echo 'username and/or password are invalid';
        }
    } else {
        echo 'Please enter the required fields';
    }
}
mysqli_close($connection);
?>
</html>
