<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Testimonial $model */
/** @var array $projects */

$this->title = Yii::t('app', 'Update Testimonial: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Testimonials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="testimonial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'projects' => $projects,
    ]) ?>

</div>
