<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = Yii::$app->name . ' - My Portfolio';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <?= Html::img('@web/images/photo.png', [
            'alt' => Yii::t('app', 'My profile photo'),
            'class' => 'side-index__photo',
        ]) ?>

        <h1 class="site-index__h1"><?= Yii::t('app', 'Hi, my name is Luís') ?></h1>

        <p class="lead"><?= Yii::t('app', 'Passionate for developing Yii 2 websites and web applications!') ?></p>

        <p>
            <?= Html::a(Yii::t('app', 'See my work'), ['/project'], ['class' => 'btn btn-primary']) ?>
        </p>
    </div>

</div>
