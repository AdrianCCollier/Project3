<?php

require_once "config.php";
// $dbhost = "local";
// $username = "dbuser";
// $password = "Iwilldowell";
// $database = "cs482502";

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Beginning of Display Logic
$sql = "SELECT * FROM digitaldisplay";

$result = $link->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>serialNo</th><th>schedulerSys</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["serialNo"]."</td><td>".$row["schedulerSystem"]." ".$row["modelNo"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$link->close();
?>

<TYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>

    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
</body>
</html>