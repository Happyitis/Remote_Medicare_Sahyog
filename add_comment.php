<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $postId = $_POST["post_id"];
    $commentContent = $_POST["comment_content"];
    
    $userId = 1; 
    $conn = new mysqli('localhost', 'root', '', 'user_db');

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO comments (user_id, post_id, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $userId, $postId, $commentContent);

    if ($stmt->execute()) {
        echo "Comment added successfully";
    } else {
        echo "Error adding comment: " . $stmt->error;
    }

    
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>