<?php
$mysqli = new mysqli('localhost', 'root', 'deathliger666', 'user-info');

if (mysqli_connect_errno()) {
    printf("Could not connect to server. Error: %s\n", mysqli_connect_error());
    exit;
}
echo 'Connection succeed';

$result = $mysqli->query('SELECT `username`, `password` FROM `user`');
var_dump($result);
while( $row = $result->fetch_assoc() ){
    printf("%s (%s)\n", $row['username'], $row['password']);
    $username = $row['username'];
    $password = $row['password'];
}

?>

<form action="" method="post">
    <input type="text" name="username">
    <input type="password" name="pass">
    <input type="submit">
</form>


