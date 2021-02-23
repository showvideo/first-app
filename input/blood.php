<?php require_once("../parts/head.php"); ?>
<?php require_once("../parts/header.php"); ?>  
<?php require_once("../common/function.php"); ?>
<?php $id = getInfomation(); ?>
<div style="width:500px;margin-left:250px;margin-top:50px;border:solid 1px gray;padding:40px;display:inline-block;">
<form>
    <h4>血圧</h4>
    <div style="margin-top:40px;">
      
        <p>最高血圧</p>
        <input type="text" style="width:140px;" class="maxblood">
        <small>※数字を入力してください</small></br>

        <p style="margin-top:20px;">最低血圧</p>
        <input type="text" style="width:140px;" class="miniblood">
        <small>※数字を入力してください</small></br>

        <p style="margin-top:20px;">脈拍</p>
        <input type="text" style="width:140px;margin-top:20px;" class="pulse">
        <small>※数字を入力してください</small></br>

    </div>

    <button type="submit" class="btn btn-primary" style="margin-left:340px;">送信</button>

</form>

</div>

<?php

if(isset($_POST['maxblood'])){

    try {

        $stt = getDB()->prepare('UPDATE user SET maxblood = :maxblood where id = :id');
        $stt->bindParam(':maxblood', $_POST['maxblood']);
        $stt->bindParam(':id', $id);
        $stt->execute();
        header('Location: https://animech2.herokuapp.com/);

    } catch (PDOException $e) {
    
        echo "ｴﾗｰﾒｯｾｰｼﾞ:{$e->getMessage()}";
        
    }

}   

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
