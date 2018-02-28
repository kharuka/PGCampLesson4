<?php

// 入力チェック（受信確認処理追加）
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["email"]) || $_POST["email"]=="" ||
  !isset($_POST["bmname"]) || $_POST["bmname"]=="" ||
  !isset($_POST["url"]) || $_POST["url"]==""
  ){
     exit('ParamError');
   }
// if(
// !empty($_POST["name"])
// !empty($_POST["email"])
// !empty($_POST["naiyou"])
// ){
//   exit('ParamError');
// }

// 1. POSTデータ取得
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

//3. データ登録SQL作成
$sql="INSERT INTO gs_bm_table(id,name,email,bmname,url,bmdate)
VALUES(NULL,:a1,:a2,:a3,:a4,sysdate())";

$stmt=$pdo->prepare($sql);

$stmt->bindValue(':a1',$name,PDO::PARAM_STR);
$stmt->bindValue(':a2',$email,PDO::PARAM_STR);
$stmt->bindValue(':a3',$bmname,PDO::PARAM_STR);
$stmt->bindValue(':a4',$url,PDO::PARAM_STR);

$status = $stmt->execute();

// 4.データ登録処理後
if($status == false){
  // SQL実行時にエラーがある場合（エラーオブジェクトを取得して表示）
  $error=$stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  // 5. index.phpへリダイレクト
  header("Location: bm_insert_view.php");
  exit;
}

 ?>
