<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

$name = $_SESSION["name"];
$role = $_SESSION["role"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Organic Farming</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f8f2;
        }

        /* Header */

        .header {
            background: #2e7d32;
            color: white;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .logo span {
            color: #a5d6a7;
        }

        .logout {
            background: white;
            color: #2e7d32;
            padding: 9px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        /* Main */

        .container {
            padding: 35px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            color: #1b5e20;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #666;
        }

        /* Cards */

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        .card .icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .card h3 {
            color: #2e7d32;
            margin-bottom: 10px;
        }

        .card p {
            color: #777;
            font-size: 14px;
        }

        .card a {
            display: inline-block;
            margin-top: 15px;
            background: #2e7d32;
            color: white;
            padding: 9px 15px;
            border-radius: 6px;
            text-decoration: none;
        }

        /* Role */

        .role {
            display: inline-block;
            margin-top: 10px;
            padding: 6px 12px;
            background: #c8e6c9;
            color: #1b5e20;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            text-transform: capitalize;
        }

    </style>

</head>

<body>

    <!-- Header -->

    <div class="header">

        <div class="logo">
            🌱 Organic<span>Farm</span>
        </div>

        <a href="logout.php" class="logout">
            Logout
        </a>

    </div>


    <!-- Dashboard -->

    <div class="container">

        <div class="welcome">

            <h1>
                Welcome, <?php echo htmlspecialchars($name); ?>! 👋
            </h1>

            <p>
                Welcome to your Organic Farming Management Dashboard.
            </p>

            <span class="role">
                <?php echo htmlspecialchars($role); ?>
            </span>

        </div>


        <!-- Dashboard Cards -->

        <div class="cards">

            <div class="card">

                <div class="icon">🌾</div>

                <h3>Farming</h3>

                <p>
                    Manage your organic farming activities.
                </p>

                <a href="activities.html">
                    Manage
                </a>

            </div>


            <div class="card">

                <div class="icon">🥕</div>

                <h3>Products</h3>

                <p>
                    View and manage organic products.
                </p>

                <a href="products.html">
                    View Products
                </a>

            </div>


            <div class="card">

                <div class="icon">📦</div>

                <h3>Orders</h3>

                <p>
                    Check your orders and transactions.
                </p>

                <a href="orders.html">
                    View Orders
                </a>

            </div>


            <div class="card">

                <div class="icon">👤</div>

                <h3>Profile</h3>

                <p>
                    View and manage your account details.
                </p>

                    My Profile
                </a>

            </div>

        </div>

    </div>

</body>

</html>