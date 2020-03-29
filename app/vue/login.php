<?php

use App\Alert;
use App\Model\Table\UserTable;
use App\Session;
use Core\Form;

if(isset($_POST['user'], $_POST['password'])){

    $UserTable = new UserTable();
    $user = $UserTable->getUser($_POST['user'], $_POST['password']);

    if ($user){
        Session::write('User', $user);
        Alert::getInstance()->success('Vous êtes connecté');
    }else{
        Alert::getInstance()->error("Identifiant ou mot de passe non valide");
    }
    header('Location: /public/main_dashboard');
    exit();
}

$form = new Form();
?>
  <div id="login-page">
    <div class="container">
        <?=
        $form->open([
            'class' => "form-login"
        ])
        ?>
        <h2 class="form-login-heading">Connexion</h2>
        <div class="login-wrap">
            <?=
            $form->input('user', [
                'class' => 'form-control',
                'placeholder' => 'Identifiant',
                'autofocus' => true
            ] );
            ?>
            <br>
            <?=
            $form->input('password', [
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Mot de passe',
            ]);
            ?>
          <br>
            <?=$form->button('<i class="fa fa-lock"></i> Se connecter');?>
        </div>
          <?=$form->end();?>
    </div>
  </div>