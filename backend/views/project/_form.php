<?php

use kartik\editors\Summernote;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Project $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerJsFile(
    '@web/js/projectForm.js',
    ['depends' => [\yii\web\JqueryAsset::class]]
);
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tech_stack')->widget(Summernote::class, [
        'useKrajeePresets' => true,
        // other widget settings
    ]); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_date')->widget(\yii\jui\DatePicker::class, [
        'options' => ['readOnly' => true],
    ]) ?>

    <?= $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::class, [
        'options' => ['readOnly' => true],
    ]) ?>

    <?= $form->field($model, 'imageFiles[]')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*', 'multiple' => true],
        'pluginOptions' => [
            'initialPreview' => $model->imageAbsoluteUrls(),
            'initialPreviewAsData' => true,
            'showUpload' => false,
            'deleteUrl' => Url::to(['project/delete-project-image']),
            'initialPreviewConfig' => $model->imageConfigs(),
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
