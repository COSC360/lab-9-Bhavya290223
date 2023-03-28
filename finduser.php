<?php
require "header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uname = $_POST['username'];

    if (isset($uname)) {
        $sql = "select * from users where username = '$uname'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) != 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<fieldset> 
                    <legend>User: ".$row["username"]."</legend>
                    <table>
                    <tr>
                        <td>First Name:</td>
                        <td>".$row["firstName"]."</td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td>".$row["lastName"]."</td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td>".$row["email"]."</td>
                    </tr>
                    </table>
                </fieldset>";
            }

        } else {
            echo 'Invalid username';
        }
    } else {
        echo 'Please enter username';
    }
}
mysqli_close($connection);
?>
</html>
