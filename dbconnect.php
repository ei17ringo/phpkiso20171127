<?php
    // 開発環境
    // ステップ1 データーベースに接続する
    $dsn = 'mysql:dbname=phpkiso3;host=localhost';

    // $user データベース接続用ユーザー名
    // $password データベース接続用ユーザーのパスワード
    $user = 'root';
    $password='';

    // //　本番環境
    //    // ステップ1 データーベースに接続する
    // $dsn = 'mysql:dbname=LAA0918879-phpkiso;host=mysql103.phy.lolipop.lan';

    // // $user データベース接続用ユーザー名
    // // $password データベース接続用ユーザーのパスワード
    // $user = 'LAA0918879';
    // $password='cebunexseed';


    // データベース接続オブジェクト
    $dbh = new PDO($dsn, $user, $password);

    // 今から実行するSQL文を文字コードutf8 で送るという設定（文字化け防止）
    $dbh->query('SET NAMES utf8');

?>