<?php
use Core\Form;
$form = new Form();
?>
  <div class="container-custom">
    <main role="main">
    <div class="box"></div>
    <div class="container-forms">
      <div class="container-info d-flex">
        <div class="info-item">
          <div class="me-4">
            <p>
              Vous avez un compte
            </p>
            <div class="btn">
              Connexion
            </div>
          </div>
        </div>
        <div class="info-item">
          <div class="ms-4">
            <p>
              Vous n'avez pas de compte
            </p>
            <div class="btn">
              Inscription
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
          <div class="container-form-individuel">
            <div class="mb-1">
              <label for="c_user">Nom d'utilisateur <abbr title="(obligatoire)">*</abbr></label>
                <?=
                $form->input('c_user',[
                    'id' => 'c_user',
                    'type' => 'text',
                    'required' => 'true',
                    'class' => 'form-control',
                ]); ?>
            </div>
            <div class="mb-1">
              <label for="c_mdp">Mot de passe <abbr title="(obligatoire)">*</abbr></label>
                <?=
                $form->input('c_mdp',[
                    'id' => 'c_mdp',
                    'type' => 'password',
                    'required' => 'true',
                    'class' => 'form-control',
                ]); ?>
            </div>
            <?=
            $form->input('connexion',[
              'type' => 'submit',
              'class'=> 'btn',
              'value'=> 'Connexion',
              'aria-label' => 'Bouton de connexion',
            ]); ?>
          </div>
        <?=$form->end();?>

        <?=
        $form->open([
          'class' => "form-item sign-up"
        ])
        ?>
        <div class="container-form-individuel">
          <div class="mb-1">
            <label for="r_user">Nom d'utilisateur <abbr title="(obligatoire)">*</abbr></label>
            <?=
            $form->input('r_user',[
              'id' => 'r_user',
              'type' => 'text',
              'required' => 'true',
              'class' => 'form-control',
            ]);
            ?>
          </div>
          <div class="mb-1">
            <label for="r_mdp">Mot de passe <abbr title="(obligatoire)">*</abbr></label>
            <?=
            $form->input('r_mdp',[
              'id' => 'r_mdp',
              'type' => 'password',
              'required' => 'true',
              'class' => 'form-control',
            ]);
            ?>
          </div>
          <div class="mb-1">
            <label for="r_mdp_bis">Confirmation du mot de passe <abbr title="(obligatoire)">*</abbr></label>
            <?=
            $form->input('r_mdp_bis',[
              'id' => 'r_mdp_bis',
              'type' => 'password',
              'required' => 'true',
              'class' => 'form-control',
            ]);
            ?>
          </div>
          <div>
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
