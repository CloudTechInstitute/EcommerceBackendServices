<?php
include '../connection/index.php';

if ($_SERVER["REQUEST_METHOD"] === 'GET') {

    $result = mysqli_query($conn, "SELECT * FROM users");
    if ($result) {
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        if (!empty($users)) {
            echo json_encode(["status" => "200", "message" => "Data fetched successfully", "users" => $users]);
        } else {
            echo json_encode(["status" => "404", "message" => "No tasks found"]);
        }
    }
    //$result ? json_encode(["status" => "200", "message" => "data fetched"]) : json_encode(["status" => "400", "message" => "bad request"]);

} else {
    echo json_encode(["status" => "405", "message" => $_SERVER["REQUEST_METHOD"] . " Method not allowed"]);
}
