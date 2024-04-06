<?php

$user = "root";
$password = "";
$dbname = "web";

$conn = new mysqli('localhost', $user, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$sql = "INSERT INTO `messages` (`name`, `email`, `message`) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
  header("Location: success.html");
} else {
  echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();

?>