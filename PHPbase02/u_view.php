<?php

$id=$_GET["id"];
// echo "GET: ".$id;

// 1. DB接続します（エラー処理追加）
try{
  $pdo=new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
}catch(PDOException $e){
  exit('DbConnectError:'.$e->getMessage());
}

// 2.データ取得SQL作成
$sql="SELECT * FROM gs_an_table WHERE id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

// 3.データ表示
$view="<p>id:name</p>";
if($status==false){
  $error=$stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  // データのみ抽出の場合はwhileループで取り出さない
  $row=$stmt->fetch();
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
   <form action="update.php" method="post">
     <div class="jumbatron">
       <fieldset>
         <legend>フリーアンケート</legend>
         <label>名前：<input type="text" name="name" value="<?=$row["name"]?>" required></input></label><br>
         <label>Email：<input type="email" name="email" value="<?=$row["email"]?>" required></input></label><br>
         <label><textarea name="naiyou" row="4" cols="40"><?=$row["naiyou"]?></textarea></label><br>
         <input type="hidden" name="id" value="<?=$row["id"]?>">

         <!-- button -->
         <div class="button-box">
           <div class="submit-box">
             <p><input type="submit" name="submit" value="送信" class="button"></p>
           </div>
           <div class="reset-box">
             <p><input type="reset" name="reset" value="リセット" class="button"></p>
           </div>
         </div>
       </fieldset>
     </div>
   </form>
 </div>

 <!-- footer -->
 <footer id="footer">
   <div class="copyrights">
     <p>copyrights 2018 PHP Academy Tokyo All RIghts Reserved.</p>
   </div>
 </footer>

 </body>

 </html>
