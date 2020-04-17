<?php
use Core\Form;
$form = new Form();
?>
  <div class="container">
    <div class="box"></div>
    <div class="container-forms">
      <div class="container-info">
        <div class="info-item">
          <div class="table">
            <div class="table-cell">
              <p>
                Vous avez un compte
              </p>
              <div class="btn">
                Connexion
              </div>
            </div>
          </div>
        </div>
        <div class="info-item">
          <div class="table">
            <div class="table-cell">
              <p>
                Vous n'avez pas de compte
              </p>
              <div class="btn">
                S'inscrire
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-form">
        <?=
        $form->open([
          'class' => "form-item log-in"
        ])
        ?>
          <div class="table">
            <div class="table-cell">
              <?=
              $form->input('c_user',[
                'type' => 'text',
                'placeholder' => 'Nom d\'utilisateur',
                'required' => 'true',
              ]);
              ?>
              <?=
              $form->input('c_mdp',[
                'type' => 'password',
                'placeholder' => 'Mot de passe',
                'required' => 'true',
              ]);
              ?>
              <?=
              $form->input('connexion',[
                'type' => 'submit',
                'class'=> 'btn',
                'value'=> 'Connexion',
              ]);
              ?>
            </div>
          </div>
        <?=$form->end();?>

        <?=
        $form->open([
          'class' => "form-item sign-up"
        ])
        ?>
          <div class="table">
            <div class="table-cell">
              <?=
              $form->input('r_user',[
                'type' => 'text',
                'placeholder' => 'Nom d\'utilisateur',
                'required' => 'true',
              ]);
              ?>
              <?=
              $form->input('r_mdp',[
                'type' => 'password',
                'placeholder' => 'Mot de passe',
                'required' => 'true',
              ]);
              ?>
              <?=
              $form->input('r_mdp_bis',[
                'type' => 'password',
                'placeholder' => 'Confirmation du mot de passe',
                'required' => 'true',
              ]);
              ?>
              <?=
              $form->input('inscrire',[
                'type' => 'submit',
                'class'=> 'btn',
                'value'=> 'S\'inscrire',
              ]);
              ?>
            </div>
          </div>
          <?=$form->end();?>
      </div>
    </div>
  </div>