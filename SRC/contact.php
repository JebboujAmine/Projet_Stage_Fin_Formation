<?php
include 'function.php';

heading();
  Echo ' <table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    
                <section class= "section-fit">
                            <h3 name = "Welcome"> Contacter-Nous </h3>
                        </section> <br>
                <section  class="section-fit " >
                <div class="card-wraper" >
                    

                            <form method = "POST" action="contact.php">
                                <div class="form-grid"> 

                        
                                        <label> Nom Complet : </label>
                                            <input type = "Text" id="Nom" id name = "Nom"   REQUIRED>

                                        <label> Email : </label>        
                                            <input type = "email" id="Email" name = "Email"   REQUIRED>

                                        <label> Message : </label>     
                                            <textarea id="Message" name="Message" rows="5" required></textarea>
                        
                                        <br>    <br>       <br>
                                        
                    <button type = "Submit" class = "btn btn-Primary" > Envoyer </button>

                                <br>
                                
                            </form>
                    </div>
                    </section>
                    
        </table>           ';
   
ajouter();

        if (isset($_GET['success'])) {
            echo '<div class="alert-success">Message enregistré avec succès !</div>'; }
        if (isset($_GET['error'])) {
            echo '<div class="alert-error">Erreur lors de l\'enregistrement !</div>'; }
Pads();
?>