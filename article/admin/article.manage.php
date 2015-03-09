<?php
require_once(dirname(dirname(__FILE__))."\connect.php");
$sql = "select * from article order by id desc";
$query = mysql_query($sql);
if($query&&mysql_num_rows($query)){
    while($row = mysql_fetch_assoc($query)){
        $data[] = $row;
    }
}else{
    $data = array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>後臺文章管理系統</title>
    <link rel="stylesheet" href="manage.css">
</head>
<body>
    <h1>後臺管理系統</h1>
    <div id="left">
        <h3><a href="article.add.php">發布文章</a></h3>
        <h3><a href="article.manage.php">管理文章</a></h3>
    </div>
    <div id="right">
        <table>
            <caption>文章管理列表</caption>
            <tr>
                <th>編號</th>
                <th>標題</th>
                <th>修改日期</th>
                <th>操作</th>
            </tr>
            <?php
            if(!empty($data)){
                foreach($data as $value){
            ?>        
            <tr>
                <td><?php echo $value['id']?></td>
                <td><?php echo $value['title']?></td>
                <td><?php echo date("Y-m-d",$value['dateline'])?></td>
                <td><a href="article.modify.php?id=<?php echo $value['id']?>">修改</a> │ <a href="#" onclick="delArticle(<?php echo $value['id']?>)">刪除</a></td>    
            </tr>    
            <?php        
                }
            }
            ?>
        </table>
    </div>
    <script>
    function delArticle(id){
        if(window.confirm("您確定要刪除嗎? 刪除後無法復原")){
            location.href = "article.del.handle.php?id="+id;
        }
    }
    </script>
</body>
</html>