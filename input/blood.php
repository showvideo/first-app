<?php require_once("../parts/head.php"); ?>
<?php require_once("../parts/header.php"); ?>  
<?php require_once("../common/function.php"); ?>
<?php $id = getInfomation(); ?>

<?php
try {

  $db = getDB();
  $stt = $db->prepare("select exits from user where id=:id");
  $stt->bindParam(':id', $id);
  $stt->execute();
  while($row = $stt->fetch(PDO::FETCH_ASSOC)) {
    $exit = $row['exits'];
  }
} catch (PDOException $e) {
  echo "ｴﾗｰﾒｯｾｰｼﾞ:{$e->getMessage()}";
}

?> 

<div style="width:500px;height:350px;margin-left:30px;margin-top:30px;border:solid 1px gray;padding:40px;display:inline-block;">

<form action="" method="post">
    <h4>血圧/脈拍</h4>
    <?php if(isset($exit)){ echo "現在入力されている血圧/脈拍は".$exits; } ?>
    
  <div class="form-group" style="margin-top:40px;">
    最高血圧</br>
  <input type="text" name="maxblood"></br>
      最低血圧</br>
  <input type="text" name="miniblood"></br>
    脈拍</br>
  <input type="text" name="pulse"></br>

    <small id="emailHelp" class="form-text text-muted">血圧/脈拍を入力してください</small>
  
  <button type="submit" class="btn btn-primary" style="margin-left:340px;">編集</button>

</form>

</div>

<?php
if(isset($_POST['maxblood'])){
 
try {
    $sql = "UPDATE user SET maxblood = :maxblood where id = :id";
    $stt = getDB()->prepare($sql);
    $stt->bindParam(':maxblood', $_POST['maxblood']);
    $stt->bindParam(':id', $id);
    $stt->execute();
    header('Location: https://first-new-app1.herokuapp.com/');
} catch (PDOException $e) {
    echo "ｴﾗｰﾒｯｾｰｼﾞ:{$e->getMessage()}";
}
  
}

?>


<?php
if(isset($_POST['miniblood'])){
 
try {
    $sql = "UPDATE user SET miniblood = :miniblood where id = :id";
    $stt = getDB()->prepare($sql);
    $stt->bindParam(':miniblood', $_POST['miniblood']);
    $stt->bindParam(':id', $id);
    $stt->execute();
    header('Location: https://first-new-app1.herokuapp.com/');
} catch (PDOException $e) {
    echo "ｴﾗｰﾒｯｾｰｼﾞ:{$e->getMessage()}";
}
  
}

?>


<?php
if(isset($_POST['pulse'])){
 
try {
    $sql = "UPDATE user SET pulse = :pulse where id = :id";
    $stt = getDB()->prepare($sql);
    $stt->bindParam(':pulse', $_POST['pulse']);
    $stt->bindParam(':id', $id);
    $stt->execute();
    header('Location: https://first-new-app1.herokuapp.com/');
} catch (PDOException $e) {
    echo "ｴﾗｰﾒｯｾｰｼﾞ:{$e->getMessage()}";
}
  
}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
