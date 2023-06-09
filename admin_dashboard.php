<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="icon" href="images/logo.png" type="image/x-icon">
  <style>
    /* CSS Styles */
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
    <h1>Admin Dashboard</h1>

    <h2>Posts For Doctor</h2>
    <?php
    
    $conn = new mysqli('localhost', 'root', '', 'user_db');

    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    
    $adminId = 1; 

    
    $stmt = $conn->prepare("SELECT id, title, content FROM posts WHERE user_id = ? ORDER BY id DESC");
    $stmt->bind_param("i", $adminId);
    $stmt->execute();

    
    $result = $stmt->get_result();

    
    if ($result->num_rows > 0) {
      
      while ($row = $result->fetch_assoc()) {
        echo '<div class="post">';
        echo '<h3>' . $row['title'] . '</h3>';
        echo '<p>' . $row['content'] . '</p>';
        echo '</div>';
      }
    } else {
      echo 'No posts found.';
    }

    
    $result->close();
    $stmt->close();
    $conn->close();
    ?>

  </div>
</body>
</html>