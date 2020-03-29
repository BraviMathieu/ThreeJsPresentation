<?php
use App\Model\Table\PresentationTable;
?>
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Mes présentations</h3>

        <div class="row mt">
            <div class="col-md-12">
                <section class="task-panel tasks-widget">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h5><i class="fa fa-tasks"></i> Mes présentations :</h5>
                        </div>
                        <br>
                    </div>
                    <div class="panel-body">
                        <div class="task-content">
                            <ul class="task-list">
                                <?php foreach($tabPresentationsEnCours as $presentationEnCours){ ?>
                                  <li>
                                    <div class="task-title">
                                      <h4><?= $presentationEnCours->title ?></h4>
                                      <div class="pull-right hidden-phone">
                                        <a class="btn btn-success btn-xs" title="Modifier"><i
                                            class="fa fa-pencil"></i></a>
                                        <a class="btn btn-primary btn-xs" title="Visualiser"><i
                                            class="fa fa-eye"></i></a>
                                        <a class="btn btn-danger btn-xs" title="Supprimer"
                                           href="traitement-form-element.php?action=delete"><i
                                            class="fa fa-trash-o "></i></a>
                                      </div>
                                    </div>
                                  </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class=" add-task-row">
                            <a class="btn btn-success btn-sm pull-left" href="form-edit.php">Créer une nouvelle présentation</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>