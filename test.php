<?php
require 'header2.php';
?>

<?php
  if(!empty($_POST)){
   $errors = array();
   require_once 'db.php';
 
   if (empty($_POST['name']))
   {
     $errors['name'] = "Votre nom ne peut être vide";
     
   }
   
   if (empty($_POST['subject']))
   {
     $errors['subject'] = "Verifier l'object de votre message";
   }
   
   if (empty($_POST['email'] ))
   {
     $errors['email'] = "Vous devez entrez un email Valide";
   } 
   if (empty($_POST['message']))
   {
     $errors['message'] = "Votre message n'est pas correct";
   } 
 
   if (empty($errors)) { 
     $req = $pdo->prepare("INSERT INTO contact SET Nom = ?,  email = ?,  objet= ?, message= ? ");
     $req ->execute([$_POST['name'], $_POST['email'],$_POST['subject'],$_POST['message']]);
   }
  
 }

 ?>

<?php if (!empty($errors)): ?> 
              <div class="alert alert-danger"> 
                 <h2>Vous n'avez pas rempli le formulaire correctement</h2>
                 <p>Verifier l'une des erreurs suivantes</p>
                   <ul>
                      <?php foreach($errors as $error):?>
                       <li><?= $error; ?> </li>
                       <?php endforeach; ?>
                    </ul>
                  
                    <?php else : ?> 
                    <div class="alert alert-success">
                    <h2>Merci de nous avoir contacté </h2>
                        <p>Nous vous repondrons dans les plus brefs delais</p>

                    <?php endif ; ?>
              </div>

              

<?php  require '../footer2.php'; ?>