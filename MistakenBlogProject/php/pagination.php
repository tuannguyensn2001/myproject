<?php 
require_once('connection.php');
$query_recent_posts="SELECT * FROM posts where category_id=$category_id";
$result_recent_posts=$conn->query($query_recent_posts);
$count=0;
while($row=$result_recent_posts->fetch_assoc()) $count++;
?>