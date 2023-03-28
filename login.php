<?php
require "header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uname = $_POST['username'];
    $pw = md5($_POST['password']);

    if (isset($uname) && isset($pw)) {
        $sql = "select * from users where username = '$uname' and password = '$pw'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) != 0) {
            echo "User is valid";
        } else {
            echo 'Invalid username or password';
        }
    } else {
        echo 'Please enter username and password';
    }
}
mysqli_close($connection);
?>
</html>
