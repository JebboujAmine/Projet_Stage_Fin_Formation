<?php
include 'function.php';
    
       function upload() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' 
             && isset($_POST['title']) 
             && isset($_POST['description'])
             && isset($_FILES['image']))
            {
                $cnx = new PDO('mysql:host=localhost;dbname=contact', 'root', '');
                $title = $_POST['title'];
                $description = $_POST['description'];
                $target = "Assets/images/";
                $file = $target.basename($_FILES["image"]["name"]);

                    if (move_uploaded_file($_FILES["image"]["tmp_name"],$file))
                        {
                        $sql = 'INSERT INTO `gallery` ( title, description, image_path) values (:T,:D,:I)';
                        $req = $cnx->prepare($sql);
                        $req->execute([':T' => $title,':D' => $description,':I' => $file]);
                        
                        header("Location: gallerie.php?success=1");
                        exit;
                    }
                    else
                        header("Location: gallerie.php?error=1");
                        exit;
            }
        }
upload();

?>