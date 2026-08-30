<?php
include 'function.php';
heading();
?>

<section class="section-fit">
    <h3 name="Welcome">Gallerie</h3>
</section>
<br>


<?php
$cnx = connection();
$req = $cnx->query("SELECT * FROM gallery ORDER BY id DESC");

echo '<div class="card-wraper" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; margin-top: 20px;">';

while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
    echo '
        <div class="card" style="width: 250px; border: 1px solid #ccc; padding: 10px; border-radius: 8px;">
            <form method="POST" action="delete.php">
                <h4>'.htmlspecialchars($row['title']).'</h4>
                <img src="'.htmlspecialchars($row['image_path']).'" alt="'.htmlspecialchars($row['title']).'" style="width:100%; height:150px; object-fit:cover; border-radius: 5px;">
                <p>'.htmlspecialchars($row['description']).'</p> 
                <input type="hidden" name="id" value="'.$row['id'].'">
            </form>
        </div>';
}

echo '</div><br>';

if (isset($_GET['success'])) {
    echo '<div class="alert-success">Image ajoutée avec succès !</div>';
}
if (isset($_GET['error'])) {
    echo '<div class="alert-error">Erreur lors de l ajout de l image!!</div>';
}
if (isset($_GET['deleted'])) {
    echo '<div class="alert-success">Image supprimée avec succès !</div>';
}

pads();
?>