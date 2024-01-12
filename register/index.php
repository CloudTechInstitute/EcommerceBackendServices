<?php
include '../connection/index.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $fname = mysqli_escape_string($conn, $_POST["firstname"]);
    $lname = mysqli_escape_string($conn, $_POST["lastname"]);
    $phone = mysqli_escape_string($conn, $_POST["phone"]);
    $email = mysqli_escape_string($conn, $_POST["email"]);
    $password = mysqli_escape_string($conn, $_POST["password"]);
    $date = date("Y-m-d");

    $result = mysqli_query($conn, "INSERT INTO users (`fname`,`lname`,`email`,`phone`,`password`,`date`) VALUES('$fname','$lname','$email','$phone','$password','$date')");
    if ($result) {
        echo json_encode(
            [
                "status" => "200",
                "message" => "data submitted successfully",
            ]);
    } else {
        echo json_encode(
            [
                "status" => "400",
                "message" => "bad request",
            ]);
    }

} else {
    echo json_encode(
        [
            "status" => "405",
            "message" => $_SERVER["REQUEST_METHOD"] . " Method not allowed",
        ]);
}
