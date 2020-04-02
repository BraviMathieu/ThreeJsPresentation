
<h1 class="mt-4"><i class="fa fa-angle-right"></i> <?= $title; ?></h1>
<div class="row">

<div class="col-xl-12">
    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-list mr-1"></i>Mes présentations</div>
        <?php foreach($tabPresentations as $presentation){?>
          <div class="card-body">
            <h3><?= $presentation->title ?></h3>
            <div class="pull-right">
              <a class="btn btn-success" title="Modifier"
                 href="<?="presentation_modification?presentation_id=$presentation->id"?>"
                title="Modifier">
                <i class="fas fa-pen"></i></a>
              <a class="btn btn-primary"
                 href="<?="presentation_visualisation?presentation_id=$presentation->id"?>"
                 title="Visualiser"><i class="fas fa-eye"></i></a>
              <a class="btn btn-danger"
                 href="<?="presentation_suppression?presentation_id=$presentation->id"?>"
                 title="Supprimer"><i class="fas fa-trash"></i></a>
            </div>
          </div>
          <hr>
        <?php }?>
      <div style="margin: 15px;" class="text-center">
        <a class="btn btn-success" href="presentation_creation">Créer une nouvelle présentation</a>
      </div>
    </div>
  </div>