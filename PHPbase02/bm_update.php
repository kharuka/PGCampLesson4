<?php

// 1.POSTでid,name,email,bmname,urlを取得
$id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$bmname=$_POST["bmname"];
$url=$_POST["url"];

// 2. DB接続します（エラー処理追加）
try{
  $pdo=new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
}catch(PDOException $e){
  exit('DbConnectError:'.$e->getMessage());
}

// 3.データ更新SQL作成
$sql="UPDATE gs_bm_table SET name=:name,email=:email,bmname=:bmname,url=:url WHERE id=:id";
$update=$pdo->prepare($sql);

$update->bindValue(':name',$name,PDO::PARAM_STR);
$update->bindValue(':email',$email,PDO::PARAM_STR);
$update->bindValue(':bmname',$bmname,PDO::PARAM_STR);
$update->bindValue(':url',$url,PDO::PARAM_STR);
$update->bindValue(':id',$id,PDO::PARAM_INT);

// 4.SQL実行
$status = $update->execute();

// 5.データ表示
if($status == false){
  // SQL実行時にエラーがある場合（エラーオブジェクトを取得して表示）
  $error=$update->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  // 6. bm_list_view.phpへリダイレクト
  header("Location: bm_list_view.php");
  exit;
}

 ?>
