<?php


  // ここにDBに登録する処理を記述する
$dsn = 'mysql:dbname=oneline_bbs;host=localhost';
$user = 'root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh ->query('SET NAMES utf8');

//2.SQL文を実行する
// アンケート自動保存


if(!empty($_POST)){
    //2.SQL文を実行する
    // WHEREはどういう条件か
$nickname = htmlspecialchars($_POST['nickname']);
$comment =  htmlspecialchars($_POST['comment']);

date_default_timezone_set('Asia/Tokyo');
echo date("Y/m/d - M (D) H:i:s");
if (!($nickname == "" || $comment == "") ){

$sql = 'INSERT INTO `posts`(`nickname`,`comment`)VALUES (?,?)';

// インジェクション
    $data[] = $nickname;
    $data[] = $comment;


$stml = $dbh->prepare($sql);
$stml->execute($data);
}

}

//3. データベースを切断する
$dbh = null;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版</title>
</head>
<body>
    <form method="post" action="">
      <p><input type="text" name="nickname" placeholder="nickname"></p>
      <p><textarea type="text" name="comment" placeholder="comment"></textarea></p>
      <p><button type="submit" >つぶやく</button></p>
    </form>
    <!-- ここにニックネーム、つぶやいた内容、日付を表示する -->

</body>
</html>