<?php
//////////connect with DataBase////////
$conn = mysqli_connect('localhost','root','','win');
if(!$conn){
    echo 'Error: ' . mysqli_connect_error();
}

// $dsn ='mysql:host=localhost;dbname=win';
// $user ='rot';
// $pass ='';
// $option =array(
//     PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',);
// try {
//     $con = new PDO($dsn,$user,$pass,$option);
//     $con -> SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     // echo "You are Connected";
// } catch (ODOException $e) {
//     echo "Failed to Connect";
// }