<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */

$this->title = 'Aplikacja CRUD w YII2 Framework';
?>
<div class="site-index">

    <h1>WYSWIETL POST</h1>

    <div class="body-content">

        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                
                <?php echo $post->tytul; ?>

            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                
                <?php echo $post->opis; ?>

            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-center">
                
                <?php echo $post->kategoria; ?>

            </li>
        </ul>

        <div class="row">
            <a href=<?php echo yii::$app->homeUrl;?> class="btn btn-primary">Wroc</a>
        </div>

    </div>
</div>
