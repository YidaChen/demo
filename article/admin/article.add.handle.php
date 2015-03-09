<?php
require_once(dirname(dirname(__FILE__))."\connect.php");
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$content = $_POST['content'];
$dateline = time();
$insertsql = "insert into article(title,author,description,content,dateline) values('$title','$author','$description','$content',$dateline)";

if(mysql_query($insertsql)){
    echo "<script>alert('發佈文章成功!');window.location.href='article.manage.php'</script>";
}else{
    echo "<script>alert('發佈文章失敗!');window.location.href='article.add.php'</script>";
}
?>