<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Forum</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel = "icon" href = "images/logo.png"
        type = "image/x-icon">
  <style>

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    header {
      background-color: #333;
      padding: 0px;
      color: #fff;
      margin: 0;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      border: 0px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
      text-align: center;
    }

    h2 {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .post {
      margin-bottom: 20px;
      padding: 10px;
      border: 6px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
    }

    .post h3 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .post p {
      font-size: 14px;
      line-height: 1.5;
      margin-bottom: 10px;
    }

    .comment {
      margin-bottom: 10px;
      padding: 10px;
      border: 5px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }

    .comment .username {
      font-weight: bold;
      margin-bottom: 5px;
    }

    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      padding: 10px 20px;
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
<header>
  <nav>
    <a href="home.php" class="logo">
      <img src="images/logo.png" alt="Sahyog Logo">
    </a>
    <ul class="nav-links">
      <li><a href="home.php">Home</a></li>
      <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
      <li><a href="forum.php">Forum</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </nav>
</header>

<div class="container">
  <h1>Forum</h1>
  <h2>Posts</h2>
  <?php

  $conn = new mysqli('localhost', 'root', '', 'user_db');

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  $query = "SELECT posts.id, posts.title, posts.content, user_form.name 
              FROM posts 
              INNER JOIN user_form ON posts.user_id = user_form.id
              ORDER BY posts.id DESC";
  $result = $conn->query($query);


  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<div class="post">';
      echo '<h3>' . $row['title'] . '</h3>';
      echo '<p>' . $row['content'] . '</p>';



      echo '<h4>Comments:</h4>';
      $postId = $row['id'];


      $commentsQuery = "SELECT comments.id, comments.content, user_form.name 
                          FROM comments 
                          INNER JOIN user_form ON comments.user_id = user_form.id 
                          WHERE comments.post_id = $postId
                          ORDER BY comments.id DESC";
      $commentsResult = $conn->query($commentsQuery);


      if ($commentsResult->num_rows > 0) {
        while ($commentRow = $commentsResult->fetch_assoc()) {
          echo '<div class="comment">';
          // echo '<p class="username">Comment by: ' . $commentRow['name'] . '</p>';
          echo '<p>' . $commentRow['content'] . '</p>';
          echo '</div>';
        }
      } else {
        echo '<p>No comments found.</p>';
      }


      echo '<form method="post" action="add_comment.php">';
      echo '<input type="hidden" name="post_id" value="' . $postId . '">';
      echo '<textarea name="comment_content" placeholder="Enter your comment" style="width: 745px;"></textarea>';
      echo '<input type="submit" value="Comment">';
      echo '</form>';

      echo '</div>';
    }
  } else {
    echo '<p>No posts found.</p>';
  }

  $result->close();
  $conn->close();
  ?>
</div>
</body>
</html>