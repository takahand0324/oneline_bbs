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
    // $sql = 'UPDATE `posts` SET `nickname` = "' . $nickname . '", `comment` = "' . $comment . '" WHERE `id` = ' . $id;
    $sql = 'UPDATE `posts` SET `nickname` = ?, `comment` = ? WHERE `id` = ?';
    $data[] = $nickname;
    $data[] = $comment;
    $data[] = $id;
    // $data = [$nickname, $comment, $id];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);


    // データベースを切断する
    $dbh = null;

        // 戻る時の処理を書く
    // リダイレクト(他のページに飛ばす)
    header("Location: bbs.php");
    exit();


    // 変数の場合、シングルクォーテーションが文字列として変換される
    // $var = 'hoge';
    // var_dump ("$var", '$var');die();


    // $hoge = [1,2,3,4,5];
    // // 配列に値を追加
    // $hoge[] = 6;

// 配列の値を上書き
    // $hoge['0'] = 10;

    // $fuga = ['banana' => 'バナナ'];
    // $fuga[] = 'huga';

