
<?php require_once("../parts/head.php"); ?>

<?php require_once("../parts/header.php"); ?>  

<?php require_once("../common/function.php"); ?>

<?php $id = getInfomation(); ?>

<?php
  try {

    $db = getDB();
    $stt = $db->prepare("select visit from user where id=:id");
    $stt->bindParam(':id', $id);
    $stt->execute();
      while($row = $stt->fetch(PDO::FETCH_ASSOC)) {
        $visit = $row['visit'];
    
    }
    
  } catch (PDOException $e) {
   
    echo "ｴﾗｰﾒｯｾｰｼﾞ:{$e->getMessage()}";
  
  }

?>

<div style="width:500px;height:350px;margin-left:30px;margin-top:30px;border:solid 1px gray;padding:40px;display:inline-block;">

  <form action="" method="post">
      <h4>入所時間</h4>
      <?php if(isset($visit)){ echo "現在入力されている時刻は".$visit; } ?>
    
    <div class="form-group" style="margin-top:40px;">

      <select name="visit">
        
        <option value="09:30">09:30</option>
        <option value="10:00">10:00</option>
        <option value="10:30">10:30</option>
        <option value="11:00">11:00</option>
        <option value="11:30">11:30</option>
      
      </select></p>
      
      <small id="emailHelp" class="form-text text-muted">時間を指定してください</small>

      <button type="submit" class="btn btn-primary" style="margin-left:340px;">編集</button>

  </form>

</div>

<?php
  if(isset($_POST['visit'])){
 
    try {
      $db = getDB();
      $stt = $db->prepare('UPDATE user SET visit = :visit where id = :id');
      $stt->bindParam(':visit', $_POST['visit']);
      $stt->bindParam(':id', $id);
      $stt->execute();
      header('Location: https://first-new-app1.herokuapp.com/');
    } catch (PDOException $e) {
    
      echo "ｴﾗｰﾒｯｾｰｼﾞ:{$e->getMessage()}";
  }
  
}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
