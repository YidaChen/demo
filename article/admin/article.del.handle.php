<?php
require_once(dirname(dirname(__FILE__))."\connect.php");
$id = $_GET['id'];
$deletesql = "delete from article where id=$id";
if(mysql_query($deletesql)){
    echo "<script>alert('刪除文章成功!');window.location.href='article.manage.php'</script>";
}else{
    echo "<script>alert('刪除文章失敗!');window.location.href='article.manage.php'</script>";
}
?>