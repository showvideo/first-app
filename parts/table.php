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

    <td onclick="window.location='input/name.php/<?php echo $id ?>/'"  
     style="height:50px;border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $name; ?>
     </td>
           
    <td onclick="window.location='input/visit.php/<?php echo $id ?>/'"  
     style="border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $visit; ?>
     </td>
        
    <td onclick="window.location='input/exit.php/<?php echo $id ?>/'"  
     style="border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $exits; ?>
     </td>
        
     <td onclick="window.location='input/blood.php/<?php echo $id ?>/'"  
     style="border:1px solid #ccc;background:#fff;padding:4px;">
     <?php if(isset($maxblood) || ($miniblood) ||( $pulse)){
         echo $maxblood."/".$miniblood."/".$pulse;
     }
      ?>
     </td>
    
     <td style="border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $bath; ?></td>
     
     <td style="border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $meal; ?></td>
        
     <td onclick="window.location='input/notices.php/<?php echo $id ?>/'"  style="border:1px solid #ccc;background:#fff;padding:4px;"><?php echo $notices; ?>
     </td>
     </tr>
</tbody>
<?php 
                
      }
        
?>

</table>
