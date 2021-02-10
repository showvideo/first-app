<?php require_once("../parts/head.php"); ?>
<?php require_once("../parts/header.php"); ?>  
<?php require_once("../common/function.php"); ?>
<?php $id = getInfomation(); ?>

<div style="width:500px;margin-left:250px;margin-top:50px;border:solid 1px gray;padding:40px;display:inline-block;">

<form>
    <h4>入所時間</h4>
  <div class="form-group" style="margin-top:40px;">
    
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width:140px;">
    <small id="emailHelp" class="form-text text-muted">※「00:00」の形式で入力してください</small>
  </div>

  <div class="form-group form-check">

  </div>
  <button type="submit" class="btn btn-primary" style="margin-left:340px;">送信</button>
</form>
</div>
<?php
if(isset($_POST['form-control'])){
 
try {
    $sql = "UPDATE user SET visit = :visit where id = :id";
    $stt = getDB()->prepare($sql);
    $stt->bindParam(':visit', $_POST['form-control']);
    $stt->bindParam(':id', $id);
    $stt->execute();
    header('Location: http://localhost/note//');
} catch (PDOException $e) {
    echo "ｴﾗｰﾒｯｾｰｼﾞ:{$e->getMessage()}";
}
  
}

?>


<?php require_once("../parts/memo.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
