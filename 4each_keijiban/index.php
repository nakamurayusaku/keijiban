<!DOCTYPE html>
<html lang=“ja”>
    
 <head>
  <meta charset="UTF-8">
  <title>4eachblog 掲示板</title>
 　<link rel="stylesheet" type="text/css" href="style.css">
 </head>
    
 <body>
     <?php
     
     mb_internal_encoding("utf8");
     $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
     $stmt = $pdo->query("select * from 4each_keijiban");
     
     ?>
     
     
     <div class=logo><img src="4eachblog_logo.jpg" class="logo"></div>
        <header>
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>4eachについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </header>
        <main>
     <!--左部分-->
            <div class="left">
                <h1>プログラミングに役立つ掲示板</h1>
                
                <form method="post" action="insert.php">
                    <div class="box">
                        <div class="t1">入力フォーム</div>
                        
                        <div>ハンドルネーム</div>
                        <input type="text" name="handlename">
                        <br>
                        <br>
                        
                        <div>タイトル</div>
                        <input type="text" name="title">
                        <br>
                        <br>
                        
                        <div>コメント</div>
                        <textarea name="comments"></textarea>
                        <br>
                        <br>
                        
                        <input type="submit" class="submit" value="投稿する">
                        
                    </div>
                
                </form>
                
                <?php
                 while($row = $stmt->fetch()){
                     echo "<div class='kiji'>";
                         echo "<h3>".$row['title']."</h3>";
                         echo "<div class='contents'>";
                             echo $row['comments'];
                             echo "<div class='handlename'>posted by".$row['handlename']."</div>";
                         echo "</div>";
                     echo "</div>";
                }
                ?>
            </div>
        
     <!--右部分-->
            
            <div class="right">
                <h2 class="side1">
                    人気の記事
                </h2>
                <ul class="sideA">
                    <li>PHPオススメ本</li>
                    <li>PHP MyAdminの使い方</li>
                    <li>今人気のエディタ</li>
                    <li>HTMLの基礎</li>
                </ul>
                <h2 class="side2">
                    オススメリンク
                </h2>
                <ul class="sideB">
                    <li>インターノウス株式会社</li>
                    <li>XAMPPのダウンロード</li>
                    <li>Eclipseのダウンロード</li>
                    <li>Bracketsのダウンロード</li>
                </ul>
                <h2 class="side3">
                    カテゴリ
                </h2>
                <ul class="sideC">
                    <li>HTML</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>JavaScript</li>
                </ul>
            </div>
        </main>
        <footer>
             copyright ©︎ internous | 4each blog the which provides A to Z about programing.
        </footer>
 </body>
</html>