<?php
include 'function.php';
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
                    $cnx = connection();
                    $id = (int)$_POST['id'];
            {
                 $req = $cnx->prepare("SELECT image_path FROM gallery WHERE id = :id");
                 $req->execute([':id' => $id]);

                    if ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                        if (file_exists($row['image_path'])) { 
                        unlink($row['image_path']);        
                    }
                $delete = $cnx->prepare("DELETE FROM gallery WHERE id = :id");
                $delete->execute([':id' => $id]);

                header("Location: gallerie.php?deleted=1");
                exit;    
            } else {
                header("Location: gallerie.php?error=1");
                exit; 
            }
            }
            } else{
                echo "Accès direct interdit ou ID manquant." ;
            } 
            

           
?>