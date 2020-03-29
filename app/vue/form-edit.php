<?php
use App\Alert;
use App\Form as FormAlias;

if(isset($_POST['title'], $_POST['content'])){
    $insert = $db->insert('todos',[
        'user_id' => 1,
        'title' => $_POST['title'],
        'content' =>$_POST['content'],
    ]);

    $alert = new Alert('success', 'Todo ajouté avec succès');
    header('Location: /form-edit');
    exit();

}
?>
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Formulaire d'ajout </h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Ajouter un élément</h4>
                    <?php
                    $form = new FormAlias();
                    echo $form->create();
                    echo $form->input('title');
                    echo $form->input('content');
                    echo $form->end();
                    ?>
                </div>
            </div>
        </div>
    </section>
</section>