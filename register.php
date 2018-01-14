<?php
$mysqli = new mysqli('localhost', 'root', 'deathliger666', 'user-info');

if (mysqli_connect_errno()) {
    printf("Could not connect to server. Error: %s\n", mysqli_connect_error());
    exit;
}
echo 'Connection succeed';
$mysqli->query('CREATE TABLE IF NOT EXISTS `user` (
  `user_id` INT (11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `age` INT (2) NOT NULL,
  `gender` VARCHAR (25) NOT NULL,
  `hobbies` VARCHAR (25),
  `username` VARCHAR (50) NOT NULL UNIQUE,
  `password` VARCHAR (255) NOT NULL,
  `bankCard` INT (11) NOT NULL UNIQUE,
  `about` VARCHAR (255),
  `category` VARCHAR (25),
  PRIMARY KEY (`user_id`)
) ');
?>
<style>
    input, select {
        display: block;
        margin: 15px;
    }

    input[type="radio"] {
        display: inline-block;
    }
</style>
<form action="" method="post">
    <input type="text" name="name">
    <input type="text" name="last">
    <input type="text" name="age">
    <input type="radio" name="gender" value="male" id="male"><label for="male">Male</label>
    <input type="radio" name="gender" value="female" id="female"><label for="female">Female</label>
    <select name="hobbies[]" id="hobby" multiple="multiple">
        <option value="football">
            Football
        </option>
        <option value="basketball">
            Basketball
        </option>
        <option value="tennis">
            Tennis
        </option>
    </select>
    <input type="text" name="username">
    <input type="password" name="pass">
    <input type="text" name="card">
    <textarea name="about" id="about" cols="30" rows="10"></textarea>
    <select name="category" id="category">
        <option value=""></option>
        <option value="draw">Draw</option>
        <option value="ride">Ride</option>
        <option value="play">Play</option>
    </select>
    <input type="submit">
</form>

<?php
$records = $_POST;
$name = $records['name'];
$lastname = $records['last'];
$age = $records['age'];
$gender = $records['gender'];
$hobbies = ($records['hobbies[]']);
$username = $records['username'];
$password = md5($records['pass']);
$bankCard = $records['card'];
$about = $records['about'];
$category = $records['category'];
var_dump($records);
var_dump($password);
  $a =   $mysqli->query("INSERT INTO `user` 
(`first_name`,`lastname`,`age`, `gender`, `hobbies`,`username`, `password`,`bankCard`, `about`, `category`) 
VALUES ('$name','$lastname','$age','$gender','$hobbies','$username','$password','$bankCard','$about','$category')");
 var_dump($a);

mysqli_close($mysqli);

?>