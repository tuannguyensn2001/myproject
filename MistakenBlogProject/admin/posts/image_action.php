<?php
require_once('../../php/connection.php');

$query="SELECT * FROM posts";
$result=$conn->query($query);
$posts=array();
while($row=$result->fetch_assoc()){
    $posts[]=$row;
}
// foreach($posts as $index){
//     $index['thumbnail']=str_replace("http://localhost/PHP_Learn/Project/img_server/posts/","img_server/posts/",$index['thumbnail']);
//     $index['thumbnail']=str_replace("http://localhost/PHP_Learn/PROJECT/img_server/posts/","img_server/posts/",$index['thumbnail']);

// }

for($i=0;$i<count($posts);$i++){
    $posts[$i]['thumbnail']=str_replace("http://localhost/PHP_Learn/Project/img_server/posts/","img_server/posts/",$posts[$i]['thumbnail']);
    $posts[$i]['thumbnail']=str_replace("http://localhost/PHP_Learn/PROJECT/img_server/posts/","img_server/posts/",$posts[$i]['thumbnail']);
    $posts[$i]['thumbnail']=trim($posts[$i]['thumbnail']);

}
foreach ($posts as $index){
    $index['thumbnail']=trim($index['thumbnail']);
    $id=$index['id'];
   $query1="UPDATE posts SET thumbnail=' ".$index['thumbnail']." ' WHERE id=$id";
   $result1=$conn->query($query1);
   if ($result1) echo "nice";
   else echo "no";

}





?>