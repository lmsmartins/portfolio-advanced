<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\TestimonialSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="testimonial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'project_id') ?>

    <?= $form->field($model, 'customer_image_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?php // echo $form->field($model, 'review') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
