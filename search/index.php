
<?php require_once("../parts/head.php"); ?>

<?php require_once("../parts/header.php"); ?>  

<?php require_once("../common/function.php"); ?>

<?php if(($_POST['blood'] == "up")):
    require_once('../parts/th.php'); 
        $db = getDB();
        $stt = $db->prepare('SELECT * FROM user WHERE maxblood >= :maxblood');
        $stt->bindParam(':maxblood', $_POST['maxblood']);
        $stt->execute();
            while($row = $stt->fetch(PDO::FETCH_ASSOC)) {

                $id=e($row['id']);
                $name=e($row['name']); 
                $visit=e($row['visit']); 
                $exits=e($row['exits']); 
                $maxblood=e($row['maxblood']);
                $miniblood=e($row['miniblood']);
                $pulse=e($row['pulse']);
                $bath=e($row['bath']); 
                $meal=e($row['meal']); 
                $notices=e($row['notices']);
?>  

<tr>
    
    <td onclick="window.location='input/name.php/<?php echo $id ?>/'"  
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $name; ?></a>
     </td>
          
    <td onclick="window.location='input/visit.php/<?php echo $id ?>/'"  
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $visit; ?></a>
     </td>
        
    <td onclick="window.location='input/exit.php/<?php echo $id ?>/'"  
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $exits; ?></a>
     </td>
        
     <td onclick="window.location='input/blood.php/<?php echo $id ?>/'"  
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;">
     <?php if(isset($maxblood) || ($miniblood) ||( $pulse)){
     
                    echo $maxblood."/".$miniblood."/".$pulse;
     
                }
      ?></a>
     </td>
        
     <td  
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $bath; ?></a>
     </td>
    
     <td   
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $meal; ?></a>
     </td>
        
    
     <td onclick="window.location='input/notices.php/<?php echo $id ?>/'"  
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $notices ?></a>
     </td>
        
</tr>

<?php } ?>

</table>

<?php require('../parts/numpeople.php'); ?>

<?php endif; ?>

<?php if(($_POST['blood'] == "down")):

        require_once('../parts/th.php'); 
        $db = getDB();
        $stt = $db->prepare('SELECT * FROM user WHERE maxblood <= :maxblood');
        $stt->bindParam(':maxblood', e($_POST['maxblood']));
        $stt->execute();
            while($row = $stt->fetch(PDO::FETCH_ASSOC)) {

                $id=e($row['id']);
                $name=e($row['name']); 
                $visit=e($row['visit']); 
                $exits=e($row['exits']); 
                $maxblood=e($row['maxblood']);
                $miniblood=e($row['miniblood']);
                $pulse=e($row['pulse']);
                $bath=e($row['bath']); 
                $meal=e($row['meal']); 
                $notices=e($row['notices']);

?>  

<tr>
    
    <td onclick="window.location='input/name.php/<?php echo $id ?>/'"  
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $name; ?></a>
     </td>
          
    <td onclick="window.location='input/visit.php/<?php echo $id ?>/'"  
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $visit; ?></a>
     </td>
       
    <td onclick="window.location='input/exit.php/<?php echo $id ?>/'"  
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $exits; ?></a>
     </td>
        
    <td onclick="window.location='input/blood.php/<?php echo $id ?>/'"  
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;">
     <?php if(isset($maxblood) || ($miniblood) ||( $pulse)){
     
                    echo $maxblood."/".$miniblood."/".$pulse;
     }
      ?></a>
     </td>
        
     <td  
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $bath; ?></a>
     </td>
       
    <td   
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $meal; ?></a>
     </td>
        
    <td onclick="window.location='input/notices.php/<?php echo $id ?>/'"  
     style="height:35px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $notices ?></a>
     </td>
        
</tr>

<?php } ?>

</table>

<?php require('../parts/numpeople.php'); ?>

<?php endif; ?>
