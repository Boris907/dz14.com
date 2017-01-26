<?php

require_once "Classes/Publication.php";
require_once "Classes/Article.php";
require_once "Classes/News.php";
require_once "Classes/PublicationsWriter.php";

try {

    $pdo = new PDO("mysql:dbname=news_blog;host=localhost", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');

} catch (PDOException $e) {
    $pdo = null;
}

$writerArticle = new PublicationsWriter("articles", $pdo);
$writerNews = new PublicationsWriter("news", $pdo);

/*echo "<pre>";
echo($writerArticle);
echo "</pre>";*/

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
    <div class="page-header">
        <h1>News blog</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h1>Articles</h1>
            <br>
           <?php echo $writerArticle; ?>
        </div>
        <div class="col-lg-6">
            <h1>News</h1>
            <br>
            <?php echo $writerNews; ?>
        </div>
    </div>
</div>
</body>
</html>




