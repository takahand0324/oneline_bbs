<?php
    // phpだけ書く時は閉じカッコいらない　なぜなら、次にhtmlの処理が行われると思うから

// var_dump()で動作確認

    // ここにDBに接続する処理を記述する
    $dsn = 'mysql:dbname=oneline_bbs;host=localhost';
    // 変数定義
    $user = 'root';
    $password='';
    $dbh = new PDO($dsn, $user, $password);
    $dbh ->query('SET NAMES utf8');

    $nickname = $_POST['nickname'];
    $comment = $_POST['comment'];
    $id = $_POST['id'];


    //.SQL文を実行する
    // 
    $sql = 'UPDATE `posts` SET `nickname` = ?, `comment` = ? WHERE `id` = ?';
    $data[] = $nickname;
    $data[] = $comment;
    $data[] = $id;
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);


    // データベースを切断する
    $dbh = null;

        // 戻る時の処理を書く
    // リダイレクト(他のページに飛ばす)
    header("Location: bbs.php");
    exit();