<?php

use yii\helpers\html;

/** @var yii\web\View $this */

$this->title = 'Aplikacja CRUD w YII2 Framework';
?>
<div class="site-index">

<?php if(yii::$app->session->hasFlash('message')):?>

    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-bs-dismiss="alert"></button>
        <?php echo yii::$app->session->getFlash('message');?>
    </div>

<?php endif;?>

    <div class="jumbotron text-center bg-transparent">
        <h1 style="color: #ff4700">Aplikacja CRUD w YII2 Framework</h1>

    </div>

    <div class="row">
        <span style="margin-bottom: 20px;"><?= Html::a('Utworz', ['/site/utworz'], ['class' => 'btn btn-primary']) ?></span>
    </div>

    <div class="body-content">

        <div class="row">
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tytul</th>
                        <th scope="col">Opis</th>
                        <th scope="col">Kategoria</th>
                        <th scope="col">Akcja</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if(count($posty) > 0): ?>
                        <?php foreach($posty as $post): ?>
                    <tr class="table-active">
                        <th scope="row"><?php echo $post->id;?></th>
                        <td><?php echo $post->tytul;?></td>
                        <td><?php echo $post->opis;?></td>
                        <td><?php echo $post->kategoria;?></td>
                        <td>
                            <span><?= Html::a('Zobacz', ['widok', 'id' => $post->id], ['class' => 'btn btn-primary']) ?></span>
                            <span><?= Html::a('Zaktualizuj', ['aktualizacja', 'id' => $post->id], ['class' => 'btn btn-success']) ?></span>
                            <span><?= Html::a('Usun', ['utylizacja', 'id' => $post->id], ['class' => 'btn btn-danger']) ?></span>
                        </td>
                    </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td>Nie znaleziono rekordow!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>

            </table>

        </div>

    </div>
</div>
