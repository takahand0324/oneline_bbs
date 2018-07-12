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

    $id = $_GET['id'];


    //.SQL文を実行する
    // 削除する処理
    $sql = 'DELETE FROM `posts` WHERE `id` = ?';
    $data[] = $id;
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);


    // データベースを切断する
    $dbh = null;


    // 戻る時の処理を書く
    // リダイレクト(他のページに飛ばす)
    header("Location: bbs.php");
    exit();