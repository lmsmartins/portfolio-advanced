<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TestimonialSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var \common\models\Project[] $projects */

$this->title = Yii::t('app', 'Testimonials');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonial-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Testimonial'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_gridview', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'projects' => $projects,
        'isProjectColumnVisible' => true,
    ]); ?>

</div>
