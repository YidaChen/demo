<?php
require_once(dirname(__FILE__)."\connect.php");
$key = $_GET['key'];
$sql = "select * from article where title like '%$key%' order by id desc";
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>部落格首頁</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog-home.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="article.list.php">php與mysql部落格</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="article.list.php">文章</a></li>
                    <li><a href="#">關於我們</a></li>
                    <li><a href="#">聯繫我們</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
            <?php
                if(empty($data)){
                    echo "<h2>目前沒有文章</h2>";
                }else{
                    foreach($data as $value){
            ?>
                <h2><a href="article.show.php?id=<?php echo $value['id']?>"><?php echo $value['title']?></a></h2>
                <p id="right">by <a href="#"><?php echo $value['author']?></a> <span class="glyphicon glyphicon-time"></span> 最後修改於：<?php echo date("Y-m-d",$value['dateline'])?></p>
                <p><?php echo nl2br($value['description'])?></p>
                <a class="btn btn-primary" href="article.show.php?id=<?php echo $value['id']?>">閱讀更多<span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
            <?php
                    }
                }
            ?>   
                <ul class="pager">
                    <li class="previous"><a href="#">&larr; Newer</a></li>
                    <li class="next"><a href="#">Older &rarr;</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <form method="get" action="article.search.php">
                <div class="well">
                    <h4>Title Search</h4>
                    <div class="input-group">
                        <input type="text" name="key" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Yida Chen 2014</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>