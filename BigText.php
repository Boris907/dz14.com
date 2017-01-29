<?php
$id = $_GET['id'];
$type = $_GET['type'];

if ($type != 'articles' && $type != 'news'){
    $type = 'articles';
    $id = 0;
}

try {

    $pdo = new PDO("mysql:dbname=news_blog;host=localhost", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');

} catch (PDOException $e) {
    $pdo = null;
}


$sql = "SELECT  id, title , long_text FROM " . $type . " WHERE id = " . $id;
$result = $pdo->query($sql);


$title = '';
$longText = '';

foreach ($result as $publication) {
    //var_dump($publication);
    $title .= $publication['title'];
    $longText .= $publication['long_text'];
}

try {
    if ($result->rowCount() == 0) {
        throw New Exception("There is no such publication");
    }
}catch(Exception $e){
    $title = $e->getMessage();
    $longText = "Sorry";
}
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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
</head>
<body>
<div class="container-fluid">
    <div class="page-header">
        <h1>News blog</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $title; ?></h3>
                </div>
                <div class="panel-body">
                    <?php echo $longText; ?>
                </div>
            </div>
            <a class="btn btn-primary" href="index.php" role="button">Home</a>
        </div>
    </div>
</body>
</html>
