<?php

session_start();

include "db.php";

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 1) {

    $user = $result->fetch_assoc();

    if (password_verify($password, $user["password"])) {

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["name"] = $user["name"];
        $_SESSION["role"] = $user["role"];

        header("Location: dashboard.php");
        exit();

    } else {

        echo "<script>
                alert('Incorrect Password!');
                window.location.href='login.html';
              </script>";

    }

} else {

    echo "<script>
            alert('Email not registered!');
            window.location.href='login.html';
          </script>";

}

$stmt->close();
$conn->close();

?>