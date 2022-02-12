<?php

use yii\helpers\html;

/** @var yii\web\View $this */

$this->title = 'Aplikacja CRUD w YII2 Framework';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 style="color: #ff4700">Aplikacja CRUD w YII2 Framework</h1>

        
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
                        <span><?= Html::a('Zobacz') ?></span>
                        <span><?= Html::a('Zaktualizuj') ?></span>
                        <span><?= Html::a('Usun') ?></span>
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
