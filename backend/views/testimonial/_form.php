<?php

use kartik\file\FileInput;
use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Testimonial $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $projects */
?>

<div class="testimonial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->dropDownList($projects, ['prompt' => Yii::t('app', 'Select a project')]) ?>

    <?= $form->field($model, 'imageFile')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'initialPreview' => $model->imageAbsoluteUrl(),
            'initialPreviewAsData' => true,
            'initialPreviewConfig' => $model->imageConfig(),
            'showUpload' => false,
            'deleteUrl' => Url::to(['testimonial/delete-customer-image'])
        ],
    ]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rating')->widget(StarRating::classname(), [
        'pluginOptions' => ['step' => 1]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
