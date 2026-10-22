<?php

include "db.php";

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, phone, password, role)
        VALUES (?, ?, ?, ?, 'farmer')";

$stmt = $conn->prepare($sql);

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

    echo "Registration Failed: " . $conn->error;

}

$stmt->close();
$conn->close();

?>