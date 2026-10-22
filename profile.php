``php
<?php

session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT name, email, phone, role, location FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found.");
}

?>