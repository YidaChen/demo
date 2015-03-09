<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>發布文章</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <h1>後臺管理系統 ─ 發布文章</h1>
    <div id="left">
        <h3><a href="article.add.php">發布文章</a></h3>
        <h3><a href="article.manage.php">管理文章</a></h3>
    </div>
    <div id="right">
        <form name="write" method="post" action="article.add.handle.php">
            標題 <input type="text" name="title" size="50"><br>
            作者 <input type="text" name="author"><br>
            簡介 <textarea name="description" cols="80" rows="5"></textarea><br>
            內容 <textarea name="content" cols="80" rows="25"></textarea><br>
            <input type="button" value="提交" onclick="check()">
        </form>
    </div>
    <script>
        function check(){
            if(write.title.value == ""){
                alert("未輸入標題");
            }else{
                write.submit();
            }
        }
    </script>
</body>
</html>