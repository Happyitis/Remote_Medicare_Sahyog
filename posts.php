<!DOCTYPE html>
<html>
<head>
  <title>Posts</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel = "icon" href = "images/logo.png"
        type = "image/x-icon">
  <style>
    /* CSS Styles */
    .container {
      max-width: 500px; /* Adjust the width as per your requirements */
      margin: 0 auto;
      padding: 50px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
      text-align: center;
    }

    form {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      resize: vertical;
    }

    input[type="submit"] {
      display: block;
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border: none;
      border-radius: 3px;
      background-color: #4CAF50;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
    }

    /* Additional Styles */
    .post {
      margin-bottom: 20px;
      padding: 0;
      border: 1px solid #ccc;
      border-radius: 0;
      background-color: #fff;
    }

    .post-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .post-content {
      font-size: 14px;
      line-height: 1.5;
      margin-bottom: 10px;
    }

    .comment {
      margin-top: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }

    .comment-content {
      font-size: 14px;
      line-height: 1.5;
      margin-bottom: 5px;
    }

    .comment-count {
      font-size: 12px;
      color: #999;
    }
  </style>
</head>
<body>
<header>
<header>
    <nav>
    <a href="user_dashboard.php" class="logo">
        <img src="images/logo.png" alt="Sahyog Logo">
      </a>
    <ul class= nav-links>
        <li><a href="user_dashboard.php">Home</a></li>
        <li><a href="posts.php">Posts</a></li>
        <li><a href="forum(user).php">Forum</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>
    </header>

  <div class="container">
    <h1>Posts</h1>
    
    <!-- Post Form -->
    <form action="create_post.php" method="POST">
      <label for="post_title">Title:</label><br>
      <input type="text" id="post_title" name="post_title" required><br><br>
      
      <label for="post_content">Content:</label><br>
      <textarea id="post_content" name="post_content" rows="5" required></textarea><br>
      
      <input type="submit" value="Post">
    </form>
    
    <!-- Display the posts posted by users -->
    <!-- Include the comment feature for each post -->
    <!-- Display the number of comments for each post -->
    <!-- Other posts page content goes here -->
  </div>
</body>
</html>
