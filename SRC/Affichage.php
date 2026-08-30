<?php
session_start();
include 'function.php';
$conn = connection();
head();    
try {
        $conn = new PDO("mysql:host=localhost;dbname=contact", "root", "");
        
                $sql = 'select * from contact';
                $statement = $conn->prepare($sql);
                $statement->execute() ;
                $clients= $statement->fetchAll(PDO:: FETCH_OBJ);
        
                
                if(!isset($_SESSION['role']) || $_SESSION['role'] != 'Admin'){
                    header("Location: login.php");
                    exit;
                }
    
    } catch(PDOException $e) {
        echo "erreur de connexion" . $e->getMessage();
    }
   
?>  
<section class="section-fit">
    <h3 name="Welcome">Liste de Contact</h3>
</section>
<br>
<section class="section-fit">    
    <div class="card-wraper">
        <table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
            <tr>
            <th>ID Contact :</th>
            <th>Nom :</th>
            <th>Email :</th>
            <th>Message :</th>
            <th>Date de contact :</th>
        </tr>
        <?php foreach($clients as $e) { ?>
            <tr>
                <td><?= $e->id; ?></td>
                <td><?= $e->nom; ?></td>
                <td><?= $e->email; ?></td>
                <td><?= $e->message; ?></td>
                <td><?= $e->date_envoi; ?></td>
            </tr>
            <?php }?>
                    
 </table>
 </div>       
</section>
             <?php Pads();?>
            