<?php

include "db.php";

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, phone, password, role)
        VALUES (?, ?, ?, ?, 'farmer')";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL Prepare Error: " . $conn->error);
}

$stmt->bind_param(
    "ssss",
    $name,
    $email,
    $phone,
    $password
);

if ($stmt->execute()) {

    echo "<script>
            alert('Registration Successful!');
            window.location.href='login.html';
          </script>";

} else {

    die("Registration Failed: " . $stmt->error);
}

$stmt->close();
$conn->close();

?>