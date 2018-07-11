<?php


  // ここにDBに登録する処理を記述する
$dsn = 'mysql:dbname=oneline_bbs;host=localhost';
// 変数定義
$user = 'root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh ->query('SET NAMES utf8');

//2.SQL文を実行する
// アンケート自動保存


if(!empty($_POST)){
    //2.SQL文を実行する
    // WHEREはどういう条件か
    // 定義しなくても使える変数　スーパーグローバル変数
$nickname = htmlspecialchars($_POST['nickname']);
$comment =  htmlspecialchars($_POST['comment']);


date_default_timezone_set('Asia/Manila');
echo date("Y/m/d - M (D) H:i:s");
if (!($nickname == "" || $comment == "") ){

$sql = 'INSERT INTO `posts`(`nickname`,`comment`,`created`)VALUES (?,?,?)';

// $data = [$_POST['nickname'],[$_POST['comment'],[$_POST['created']

// 'created' = now'

// インジェクション
    $data[] = $nickname;
    $data[] = $comment;
    $data[] = date("Y/m/d H:i:s");
    $stml = $dbh->prepare($sql);
    $stml->execute($data);
}

}

//3. データベースを切断する


?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版</title>
</head>
<body>
    <!-- methodは送り方 -->
    <!-- actionは送り先 -->
    <form method="post" action="">
      <p><input type="text" name="nickname" placeholder="nickname"></p>
      <p><textarea type="text" name="comment" placeholder="comment"></textarea></p>
      <p><button type="submit" >つぶやく</button></p>
    </form>
    <!-- ここにニックネーム、つぶやいた内容、日付を表示する -->
<?php

//2.SQL文を実行する
// OREDR BYはDESCで降順、ASCで昇順
$sql = 'SELECT* FROM posts ORDER BY created DESC';
$stmt = $dbh->prepare($sql);
$stmt->execute();


while (1) {
    $rec = $stmt ->fetch(PDO::FETCH_ASSOC);
    if ($rec == false){
        break;
    }
    echo $rec['nickname'] . '<br>';
    echo $rec['comment'] . '<br>';
    echo $rec['created'] . '<br>';
    echo '<hr>';

}
// データベースを切断する
$dbh = null;
?>

</body>
</html>