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
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Connexion</h3></div>
                    <div class="card-body">
                        <?=
                        $form->open([
                            'class' => "form-login"
                        ])
                        ?>
                            <div class="form-group">
                                <label class="small mb-1" for="user">Nom d'utilisateur</label>
                                <?=
                                $form->input('user',[
                                    'class' => 'form-control',
                                    'placeholder' => 'Identifiant',
                                    'type'     => 'text',
                                    'autofocus' => true
                                ]);
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="password">Mot de passe</label>
                                <?=
                                $form->input('password',[
                                    'type' => 'password',
                                    'class' => 'form-control py-4',
                                    'placeholder' => 'Mot de passe',
                                ]);
                                ?>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <?=$form->button('Se connecter');?>
                        <?=$form->end();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>