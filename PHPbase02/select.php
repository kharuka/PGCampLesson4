<?php

// 1. DB接続します（エラー処理追加）
try{
  $pdo=new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
}catch(PDOException $e){
  exit('DbConnectError:'.$e->getMessage());
}

// 2.データ表示SQL作成
$sql="SELECT * FROM gs_an_table";
$stmt=$pdo->prepare($sql);
$status = $stmt->execute();

// 3.データ表示
$view="<p>id,name,indate</p>";
if($status==false){
  $error=$stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  // Selectデータの数だけ自動でループしてくれる
  while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= $result["id"].",".$result["name"].",".$result["indate"];
    $view .= '</p>';
  }
}

 ?>

 <!DOCTYPE html>
 <html lang="ja">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <link rel="stylesheet" href="css/style-insert.css">
   <!-- BootstrapのCSS読み込み -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- jQuery読み込み -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <!-- BootstrapのJS読み込み -->
   <script src="js/bootstrap.min.js"></script>
 </head>

 <body>

 <!-- header -->
 <header id="header">
   <nav class="navi-box">
     <div class="navi-title">データ一覧</div>
   </nav>
 </header>

   <div class="header-block"></div>

 <!-- title -->
 <h1>ブックマークアプリ</h1>

 <!-- main -->
 <div class="main-box">

   <!-- select -->
   <h2>データ表示</h2>
   <div class="view-box">
     <div class="view-subbox">
       <?=$view?>
     </div>
   </div>

 </div>

 <!-- footer -->
 <footer id="footer">
   <div class="copyrights">
     <p>copyrights 2018 PHP Academy Tokyo All RIghts Reserved.</p>
   </div>
 </footer>

 </body>

 </html>
