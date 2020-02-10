
<?php require_once 'header2.php';
?>
 <?php
//require_once 'functions.php';
if(!empty($_POST)){
  $errors = array();
  require_once 'db.php';

  if (empty($_POST['name']))
  {
    $errors['name'] = "le nom ne peut pas être vide";
    
  }
  
  if (empty($_POST['password'] || $_POST['password'] != $_POST['checking']))
  {
    $errors['password'] = "Vous devez entrez un Mot de passe Valide ";
  }
   
  if (empty($_POST['email']))
  {
    $errors['email'] = "Vous devez entrez un email Valide";
  } else {
    $req = $pdo->prepare('SELECT id_user FROM users WHERE email = ?');
    $req->execute([$_POST['email']]);
    $email = $req->fetch();
    if($email){
      $errors['email']='Cet email est deja utilisé Pour un autre compte';
    }
  }

  if (empty($errors)) { 
    
    $req = $pdo->prepare("INSERT INTO users SET name = ?, email = ?,  password= ?  ");
    
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $req ->execute([$_POST['name'], $_POST['email'],$password]);
    //mail($_POST['email'], 'confirmation de compte', "Cliquer sur ce lien afin de valider de valider votre Compte\n\nhttp://localhost/Buyer/shop/confirm.php?id_user=$id_user&token=$token");
    $_SESSION['name'] = $name; 
    header('Location: account.php');
    //exit();  
    
    
   
  }
 
}
?>

<br><br><br><br><br><br><br>
<?php if (!empty($errors)): ?> 
              <div class="alert alert-danger"> 
                 <h2>Vous n'avez pas rempli le formulaire correctement</h2>
                   <ul>
                      <?php foreach($errors as $error):?>
                       <li><?= $error; ?> </li>
                       <?php endforeach; ?>
                    </ul>

                    <?php else : ?> 
              <div class="alert alert-success"> 
                 <h2>Inscription Reussie</h2>
                   
                    <?php endif ; ?>
                    
              </div>
<?php  require '../footer2.php'; ?>