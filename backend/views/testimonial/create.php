<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Testimonial $model */
/** @var array $projects */

$this->title = Yii::t('app', 'Create Testimonial');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Testimonials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'projects' => $projects,
    ]) ?>

</div>
