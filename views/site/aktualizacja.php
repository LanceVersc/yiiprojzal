<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */

$this->title = 'Aplikacja CRUD w YII2 Framework';
?>
<div class="site-index">

    <h1>ZAKTUALIZUJ POST</h1>


    <div class="body-content">
        <?php
            $form = ActiveForm::begin()?>

        <div class="row">
            
            <div class="form-group">
                <div class="col-lg-20">
                    <?= $form->field($post, 'tytul'); ?>
                </div>
            </div>

        </div>

        <div class="row">
            
            <div class="form-group">
                <div class="col-lg-20">
                    <?= $form->field($post, 'opis')->textarea(['rows' => '6']); ?>
                </div>
            </div>

        </div>

        <div class="row">
            
            <div class="form-group">
                <div class="col-lg-20">

<?php $items = ['KatTest1' => 'KatTest1', 'KatTest2' => 'KatTest2', 'KatTest3' => 'KatTest3']; ?>
                    <?= $form->field($post, 'kategoria')->dropDownList($items, ['prompt' => 'Wybierz']); ?>
                </div>
            </div>

        </div>

        <div class="row">
            
            <div class="form-group">
                <div class="col-lg-20">

                    <div class="col-lg-10">
                        <?= Html::submitButton('Zaktualizuj Post', ['class'=>'btn btn-primary']);?>
                    </div>
                    <div class="col-lg-10">
                        <a href=<?php echo yii::$app->homeUrl;?> class="btn btn-primary">Wroc</a>
                    </div>

                </div>
            </div>

        </div>

        <?php ActiveForm::end() ?>
    </div>
</div>
