<?php

// 1.GETでidを取得
$id=$_GET["id"];

// 2. DB接続します（エラー処理追加）
try{
  $pdo=new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
}catch(PDOException $e){
  exit('DbConnectError:'.$e->getMessage());
}

// 3.データ更新SQL作成
$sql="DELETE FROM gs_bm_table WHERE id=:id";
$delete=$pdo->prepare($sql);

$delete->bindValue(':id',$id,PDO::PARAM_INT);

// 4.SQL実行
$status = $delete->execute();

// 5.データ表示
if($status == false){
  // SQL実行時にエラーがある場合（エラーオブジェクトを取得して表示）
  $error=$delete->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  // 6. bm_list_view.phpへリダイレクト
  header("Location: bm_list_view.php");
  exit;
}

 ?>
