<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <title>Can★Find</title>
  <link rel="stylesheet" href="cando_style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <script src="cando_main.js"></script>
  <script type="text/javascript">
      function check(){
        var form_itemName = document.getElementById("form-itemName").value;
        var form_itemArea = document.getElementById("selectArea1").value;
        var form_itemComment = document.getElementById("form-itemComment").value;
          if(form_itemName=="入力してください" || form_itemName==""){
            alert("名前を入力してください");
            return false;
          }else{
            var confirmText="名前："+form_itemName+"\nエリア："+form_itemArea+"\nコメント："+form_itemComment+"\nこの内容で登録してよろしいですか？";
          	if(window.confirm(confirmText)){ // 確認ダイアログを表示
          		return true; // 「OK」時は送信を実行
          	}else{ // 「キャンセル」時の処理
          		return false; // 送信を中止
        	 }
        }
      }
      function deleteConfirm(){
        if(window.confirm("本当に削除してもよろしいですか？")){
          window.alert("削除しました");
          location.href="takuya.nkmr.io/cando.php";
          return true;
        }else{
          return false;
        }
      }
  </script>

</head>

<body>
  <div id="helpmenu">
    <h2 class="head">使い方</h2>
    <h3><a href="#itemSerach">商品検索</a></h3>
    <p>
      登録済みの商品の場所を検索します。フリーワードを入力し、「検索」を押してください。
      検索後、ヒットした商品一覧が出てくるので、該当する商品を選択して、「場所検索」を押してください。
      すぐ下のミニマップに、商品の場所が星マークで示されます。
    </p>
    <h3><a href="#itemAdd">商品登録</a></h3>
    <p>
      まず、登録したい商品の場所をクリックしてください。
      店内マップから各エリアへ飛べます（スクロールでも可）。
      クリック後、名前・エリア・コメントの入力フォームが現れます。
      エリアは、すでに選択済みなので再度選ぶ必要はありません。
      入力し終わったら、「追加」を押すことで商品が登録されます。
    </p>
    <h3><a href="#itemAll">登録商品一覧</a></h3>
    <p>
      登録した全商品を表で見れます。
      商品が廃盤・場所変更等で商品を削除したい時、各表の「削除」を押すことで、商品をデータから削除することができます。
    </p>
  </div>

  <a href="#header"><div id="back"><i class="fa fa-arrow-up "></i></div></a>
  <div id="header"><h1>Can<i class="fa fa-star"></i>Find</h1></div>
  <i id="helplink" class="fa fa-info-circle "></i>
  <div id="main">
  <p id="-star-"><i class="fa fa-star"></i></p>
  <h2 id="itemSerach" class="head">商品検索</h2>
  <div id="form-select">
  <form action="cando.php" method="POST" name="selectForm">
    <div><i class="fa fa-search"></i>
      <input type="text" name="searchItemName" value="フリーワード">
    <input type="submit" value="検索"></div>
  </form></div>

  <form id="selectItem2" method="POST">
    <select size=1 id="searchItem1" name="searchItem1">
     <option value="---">---</option>
    </select>
    <input id="lastItem_button" type="submit" value="場所検索" disabled='true'>
  </form>
  <div id="noItem">該当するアイテムはありません</div>
  <p id="foundItem"><i class="fa fa-star"></i></p>

<div id="mini-map">
  <div id="detail-Amini" class="details-mini">
    <img id="img-amini" width="300px" heignht="400px" src="cando_media/area_a.png" alt="エリアA">
  </div>

  <div id="detail-Bmini" class="details-mini">
    <img id="img-bmini" width="300px" heignht="300px" src="cando_media/area_b.png" alt="エリアB">
  </div>

  <div id="detail-Cmini" class="details-mini">
    <img id="img-cmini" width="450px" heignht="150px" src="cando_media/area_c.png" alt="エリアC">
  </div>

  <div id="detail-Dmini" class="details-mini">
    <img id="img-dmini" width="300px" heignht="325px" src="cando_media/area_d.png" alt="エリアC">
  </div>

  <div id="detail-Emini" class="details-mini">
    <img id="img-emini" width="250px" heignht="325px" src="cando_media/area_e.png" alt="エリアC">
  </div>

  <div id="detail-Fmini" class="details-mini">
    <img id="img-fmini" width="400px" heignht="325px" src="cando_media/area_f.png" alt="エリアC">
  </div>

  <div id="detail-Gmini" class="details-mini">
    <img id="img-gmini" width="250px" heignht="325px" src="cando_media/area_g.png" alt="エリアC">
  </div>
</div>


  <?php
  $mysqli = new mysqli("localhost", "********", "********");
  $mysqli ->set_charset('utf8');
  $mysqli ->select_db("my_db");

    if(isset($_POST['searchItemName'])){
    $freeword = $_POST['searchItemName'];
    $result = $mysqli->query("SELECT ID, Name, Area, Comment, Position_X, Position_Y from items WHERE Name LIKE '%$freeword%' OR Area LIKE '%$freeword%' OR Comment LIKE '%$freeword%';");
    $row_cnt = $result->num_rows;
  }
  if(isset($result)){
    if($row_cnt==0){
      echo "<script>(function () { document.getElementById('noItem').style.visibility='visible'; }());</script>";
    }else{
      echo "<script>(function () { document.getElementById('lastItem_button').disabled=false; }());</script>";
      $optionCount=0;
      while ($line = $result->fetch_array(MYSQLI_BOTH)){
        echo '<script>(function () { document.getElementById("searchItem1").options['.$optionCount.']=new Option("'.$line["Name"].'　'.$line["Area"].'エリア　'.$line["Comment"].'"); }());</script>';
        echo '<script>(function () { document.getElementById("searchItem1").options['.$optionCount.'].value="'.$line["ID"].'"; }());</script>';
        $optionCount++;
      }
    }
  }

  if(isset($_POST['searchItem1'])){
    $isSearchItem1 = $_POST['searchItem1'];
    $result2 = $mysqli->query("SELECT ID, Name, Area, Comment, Position_X, Position_Y from items WHERE ID='$isSearchItem1';");
    while ($line2 = $result2->fetch_array(MYSQLI_BOTH)){
      $fi_n = $line2["Name"];
      $fi_a = $line2["Area"];
      $fi_c = $line2["Comment"];
      $fi_x = $line2["Position_X"];
      $fi_y = $line2["Position_Y"];
      echo '<script>(function () { var lastTarget = document.getElementById("foundItem");
         var foundItemArea = "'.$fi_a.'";
         console.log(foundItemArea);
         if (foundItemArea == "A") {
           var imgPosInfo = document.getElementById("img-amini").getBoundingClientRect();
           imgX = imgPosInfo.left;
           imgY = imgPosInfo.top;
         } else if (foundItemArea == "B") {
           var imgPosInfo = document.getElementById("img-bmini").getBoundingClientRect();
           imgX = imgPosInfo.left;
           imgY = imgPosInfo.top;
         } else if (foundItemArea == "C") {
           var imgPosInfo = document.getElementById("img-cmini").getBoundingClientRect();
           imgX = imgPosInfo.left;
           imgY = imgPosInfo.top;
         } else if (foundItemArea == "D") {
           var imgPosInfo = document.getElementById("img-dmini").getBoundingClientRect();
           imgX = imgPosInfo.left;
           imgY = imgPosInfo.top;
         } else if (foundItemArea == "E") {
           var imgPosInfo = document.getElementById("img-emini").getBoundingClientRect();
           imgX = imgPosInfo.left;
           imgY = imgPosInfo.top;
         } else if (foundItemArea == "F") {
           var imgPosInfo = document.getElementById("img-fmini").getBoundingClientRect();
           imgX = imgPosInfo.left;
           imgY = imgPosInfo.top;
         } else if (foundItemArea == "G") {
           var imgPosInfo = document.getElementById("img-gmini").getBoundingClientRect();
           imgX = imgPosInfo.left;
           imgY = imgPosInfo.top;
         }
         var fx = '.$fi_x.'/2;
         var fy = '.$fi_y.'/2;
         var foundItemPosX = imgX + fx - 7;
         var foundItemPosY = imgY + fy - 30;
         lastTarget.style.left = foundItemPosX + "px";
         lastTarget.style.top = foundItemPosY + "px";
         lastTarget.style.visibility = "visible";
       }());</script>';
    }
  }
  ?>
<br>
<h2 id="itemAdd" class="head">商品登録</h2>
  <h3 id="map-title">店内マップ</h3>
  <div class="map">
    <div id="area-Casher" class="area"><a href="">レジ</a></div>
    <div id="area-A" class="area"><a href="#detail-A">A</a></div>
    <div id="area-G" class="area"><a href="#detail-G">G</a></div>
    <div id="area-F" class="area"><a href="#detail-F">F</a></div>
    <div id="area-B" class="area"><a href="#detail-B">B</a></div>
    <div id="area-E" class="area"><a href="#detail-E">E</a></div>
    <div id="area-D" class="area"><a href="#detail-D">D</a></div>
    <div id="area-C" class="area"><a href="#detail-C">C</a></div>
  </div>

  <div id="detail-A" class="details">
    <h3>Aエリア</h3>
    <img id="img-a" width="600px" height="800px" src="cando_media/area_a.png" alt="エリアA">
  </div>

  <div id="detail-B" class="details">
    <h3>Bエリア</h3>
    <img id="img-b" width="600px" height="600px" src="cando_media/area_b.png" alt="エリアB">
  </div>

  <div id="detail-C" class="details">
    <h3>Cエリア</h3>
    <img id="img-c" width="900px" height="300px" src="cando_media/area_c.png" alt="エリアC">
  </div>

  <div id="detail-D" class="details">
    <h3>Dエリア</h3>
    <img id="img-d" width="600px" height="650px" src="cando_media/area_d.png" alt="エリアD">
  </div>

  <div id="detail-E" class="details">
    <h3>Eエリア</h3>
    <img id="img-e" width="500px" height="650px" src="cando_media/area_e.png" alt="エリアE">
  </div>

  <div id="detail-F" class="details">
    <h3>Fエリア</h3>
    <img id="img-f" width="800px" height="650px" src="cando_media/area_f.png" alt="エリアF">
  </div>

  <div id="detail-G" class="details">
    <h3>Gエリア</h3>
    <img id="img-g" width="500px" height="650px" src="cando_media/area_g.png" alt="エリアG">
  </div>

<div id="form-add">
    <form class="add-items" action="cando.php" method="POST" name="addForm" onSubmit="return check()">
      <div> 商品名　　　　　：<input id="form-itemName" type="text" name="itemName" value="入力してください"></div>
      <div>エリア（大分類）：<select id="selectArea1" name = "selectArea1" onChange="functionName()">
        <option>選択してください</option>
        <option value = "A">A:食品</option>
        <option value = "B">B:調理・レジャー</option>
        <option value = "C">C:文具・シーズン</option>
        <option value = "D">D:バス・トイレ</option>
        <option value = "E">E:衛生・化粧・玩具</option>
        <option value = "F">F:衣類・インテリア</option>
        <option value = "G">G:掃除・電気</option>
      </select></div>
      <!-- div>エリア（小分類）：<select name = "selectArea2">
      <option>まずエリア（大分類）を選択してください</option>
    </select></div -->
      <div>コメント　　　　：<textarea id="form-itemComment" col=20 row=3 name="itemComment"></textarea></div>
      <div class="hide"> x座標 　　　　　：<input id="item-x" type="text" name="item-x" value="入力してください"></div>
      <div class="hide"> y座標 　　　　　：<input id="item-y" type="text" name="item-y" value="入力してください"></div>
      <div id="buttons">
        <input class="button" type="reset" name="reset" value="入力内容をリセット">
        <input id="add_button" class="button" type="submit" name="send" value="追加"></div>
    </form>
    <div id="form_cancel"><input id="form_cancel_button" class="button" type="button" value="フォームを閉じる"></div>
  </div>

<?php
if(isset($_POST['itemName']) && isset($_POST['selectArea1']) && isset($_POST['item-x']) && isset($_POST['item-y'])){
  $name=$_POST['itemName'];
  $area=$_POST['selectArea1'];
  if(isset($_POST['itemComment'])){
    $comment=$_POST['itemComment'];
  }else{
    $comment=" ";
  }
  $posX=$_POST['item-x'];
  $posY=$_POST['item-y'];

  $mysqli->query("INSERT INTO items (Name, Area, Comment, Position_X, Position_Y) values ('$name', '$area', '$comment', '$posX', '$posY');" );
}
 ?>
 <h2 id="itemAll" class="head">登録商品一覧</h2>
 <?php
 $resultAll = $mysqli->query("SELECT ID, Name, Area, Comment from items");
 $delItemID = null;
 echo "<table border=1>";
 echo "<tr><td class='tableHead'>名前</td><td class='tableHead'>エリア</td><td class='tableHead'>コメント</td></tr>";
 while( $lineAll = $resultAll->fetch_array(MYSQLI_BOTH) ){
   echo "<tr><td>";
   echo $lineAll["Name"];
   echo "</td><td>";
   echo $lineAll["Area"];
   echo "</td><td>";
   echo $lineAll["Comment"];
   echo "</td><td>";
   echo "<form method='POST' action='cando.php' onsubmit='return deleteConfirm()'><input name='delItem".$lineAll['ID']."' type='submit' value='削除'></form>";
   if (isset($_POST["delItem".$lineAll['ID'].""])) {
     $delItemID=$lineAll["ID"];
   }
   echo "</td></tr>";
   }
   echo "</table>";
   $mysqli->query("DELETE FROM items WHERE ID='$delItemID';" );
   $mysqli->close();
  ?>
</div>
<div id="footer"><p>Copyright (c) 2018 Can<i class="fa fa-star"></i>Find All rights reserved.</p></div>
</body>

</html>
