<?php

$conn=mysqli_connect('127.0.0.1','root','','php12pm');
if(!$conn){
    die(mysqli_error($conn));
}