<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $postTitle = $_POST['post_title'];
  $postContent = $_POST['post_content'];


  $conn = new mysqli('localhost', 'root', '', 'user_db');
 
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  $stmt = $conn->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");


  $adminId = 1;


  $stmt->bind_param("iss", $adminId, $postTitle, $postContent);


  $stmt->execute();


  $stmt->close();
  $conn->close();


  header("Location: posts.php");
  exit();
}
?>