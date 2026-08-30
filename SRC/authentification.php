<?php
session_start();
include 'function.php';
$conn = connection();
heading();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['nom_utilisateur'];
    $password = $_POST['mot_passe'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=contact", "root", "");
        $sql = "SELECT * FROM utilisateur WHERE nom_utilisateur = :nu AND mot_passe = :mp";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':nu'=>$username, ':mp'=>$password]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if($user){
            $_SESSION['role'] = $user->role;
            header("Location: Affichage.php");
            exit;
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch(PDOException $e){
        die("Erreur : ".$e->getMessage());
    }
}
?>
<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    
                <section class= "section-fit">
                            <h3 name = "Welcome"> Connecter vous </h3>
                        </section> <br>
                <section  class="section-fit " >
                <div class="card-wraper" >
                    

                            <form method = "POST">
                                <div class="form-grid"> 
                                            <label> Nom d'Utilisateur : </label>
                                            <input type = "Text"  name = "nom_utilisateur"   REQUIRED>

                                            <label> Mot de passe : </label>        
                                            <input type = "password" name = "mot_passe"   REQUIRED>
                                        <br>    <br>       
                    <button type = "Submit" class = "btn btn-Primary" > Connexion </button>

                                <br>
                                
                            </form>
                    </div>
                    </section>
                    
        </table>         

<?php if(isset($error)) echo $error; pads();?>
