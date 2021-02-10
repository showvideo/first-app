<?php require_once("th.php"); ?>  
<?php
        $db = getDB();
        $stt = $db->prepare('SELECT * FROM user WHERE 1');
        $stt->execute();
            while($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                
                $id=$row['id'];
                $name=$row['name']; 
                $visit=$row['visit']; 
                $exits=$row['exits']; 
                $maxblood=$row['maxblood'];
                $miniblood=$row['miniblood'];
                $pulse=$row['pulse'];
                $bath=$row['bath']; 
                $meal=$row['meal']; 
                $notices=$row['notices'];
            
 ?>
<tbody>
<tr>
    <!--お名前-->
    <td onclick="window.location='input/name.php/<?php echo $id ?>/'"  
     style="height:50px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $name; ?>
     </td>
           
     <!--来所-->
    <td onclick="window.location='input/visit.php/<?php echo $id ?>/'"  
     style="border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $visit; ?>
     </td>
        
     <!--退所-->
    <td onclick="window.location='input/exit.php/<?php echo $id ?>/'"  
     style="border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $exits; ?>
     </td>
        
     <!--最高・最低血圧/脈拍-->
     <td onclick="window.location='input/blood.php/<?php echo $id ?>/'"  
     style="border:1px solid #ccc;background:#fff;padding:4px;">
     <?php if(isset($maxblood) || ($miniblood) ||( $pulse)){
         echo $maxblood."/".$miniblood."/".$pulse;
     }
      ?>
     </td>
        
      <!--入浴-->
     <td  
     style="border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $bath; ?>
     </td>
        
        
      <!--食事-->
    <td   
     style="border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $meal; ?>
     </td>
        
      <!--特記事項-->
    <td onclick="window.location='input/notices.php/<?php echo $id ?>/'"  
     style="border:1px solid #ccc;background:#fff;padding:4px;"><?php echo mb_strimwidth($notices, 0, 7, '…', 'UTF-8'); ?>
     </td>
        
    </tr>
<tbody>
<?php 
                
      }
        
?>
</table>
