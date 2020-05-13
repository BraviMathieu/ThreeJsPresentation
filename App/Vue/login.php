<?php
use Core\Form;
$form = new Form();
?>
  <div class="container">
    <main role="main">
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
                Inscription
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
              <div class="float-input">
              <label for="c_user">Nom d'utilisateur <abbr title="(obligatoire)">*</abbr></label>
              <?=
              $form->input('c_user',[
                'id' => 'c_user',
                'type' => 'text',
                'required' => 'true',
              ]);
              ?>
              </div>
              <label for="c_mdp">Mot de passe <abbr title="(obligatoire)">*</abbr></label>
              <?=
              $form->input('c_mdp',[
                'id' => 'c_mdp',
                'type' => 'password',
                'required' => 'true',
              ]);
              ?>
              <?=
              $form->input('connexion',[
                'type' => 'submit',
                'class'=> 'btn',
                'value'=> 'Connexion',
                'aria-label' => 'Bouton de connexion',
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
              <label for="r_user">Nom d'utilisateur <abbr title="(obligatoire)">*</abbr></label>
              <?=
              $form->input('r_user',[
                'id' => 'r_user',
                'type' => 'text',
                'required' => 'true',
              ]);
              ?>
              <label for="r_mdp">Mot de passe <abbr title="(obligatoire)">*</abbr></label>
              <?=
              $form->input('r_mdp',[
                'id' => 'r_mdp',
                'type' => 'password',
                'required' => 'true',
              ]);
              ?>
              <label for="r_mdp_bis">Confirmation du mot de passe <abbr title="(obligatoire)">*</abbr></label>
              <?=
              $form->input('r_mdp_bis',[
                'id' => 'r_mdp_bis',
                'type' => 'password',
                'required' => 'true',
              ]);
              ?>
              <?=
              $form->input('inscription',[
                'type' => 'submit',
                'class'=> 'btn',
                'value'=> 'Inscription',
                'aria-label' => 'Bouton d\'inscription',
              ]);
              ?>
            </div>
          </div>
          <?=$form->end();?>
      </div>
    </div>
    </main>
  </div>
