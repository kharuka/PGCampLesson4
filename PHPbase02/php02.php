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
  <form action="insert.php" method="post">
    <div class="jumbatron">
      <fieldset>
        <legend>フリーアンケート</legend>
        <label>名前：<input type="text" name="name" required></input></label><br>
        <label>Email：<input type="email" name="email" required></input></label><br>
        <label><textarea name="naiyou" row="4" cols="40"></textarea></label><br>

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
