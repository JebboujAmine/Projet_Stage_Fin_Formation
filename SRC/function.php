<?php
function connection(){
    try{
        $conn = new PDO('mysql:host=localhost;dbname=contact', 'root', '');
        $conn ->setAttribute (PDO :: ATTR_ERRMODE , PDO :: ERRMODE_EXCEPTION);
        return $conn; 
        }
        catch(PDOException $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    function heading(){
       echo '
        <!DOCTYPE html>
          <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="Assets/css/style.css">
                    <title>Proget_Stage_Fin_Formation</title>
            </head>
                <body>
                    <header>
                        <nav>
                            <a href="Acceuil.php">Accueil</a>
                            <a href="activite.php" >Activités</a>
                            <a href="gallerie.php" >Galerie</a>
                            <a href="apropos.php" >À propos</a>
                            <a href="contact.php" >Contact</a>
                            <a href="authentification.php"> Se connecter </a>
                        </nav>
                    </header>
                    ';
    }
     function head(){
       echo '
        <!DOCTYPE html>
          <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="Assets/css/style.css">
                    <title>Proget_Stage_Fin_Formation</title>
            </head>
                <body>
                    <header>
                        <nav>
                            <a href="gestion_gallerie.php"> Gestion de Galerie </a>
                            <a href="Affichage.php" > Liste de Contact </a>
                            <a href="log out.php"> Se déconnecter </a>
                        </nav>
                    </header>
                    ';
    }
    function Pads(){
       Echo'
       
                <footer>
                        <h5> Travaus divers & Négoce avec 2SAM-Afrique.</h5>
                    
                </footer>
                            <script src="Assets/js/Main.js"></script>
            </body>
        </html>   ' ;
    }
     function ajouter(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' 
             && isset($_POST['Nom']) 
             && isset($_POST['Email']) 
             && isset($_POST['Message'])) 
            {
                try{
                $cnx = connection();
                $nom = $_POST['Nom'];
                $email = $_POST['Email'];
                $message = $_POST['Message'];
                
                $sql = 'INSERT INTO `contact` ( nom, email, message) values (:A,:B,:C)';
                    $req = $cnx->prepare($sql);

            if ($req->execute([':A' => $nom, ':B' => $email, ':C' => $message])) {
                header("Location: contact.php?success=1");
                exit;
            } else {
                header("Location: contact.php?error=1");
                exit;
            }
            }  catch(PDOException $e){
            header("Location: contact.php?error=1");
        }
      }
    }
        


?>