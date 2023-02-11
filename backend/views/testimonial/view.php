<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Testimonial $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Testimonials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="testimonial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'project_id',
                'format' => 'raw',
                'value' => function($model) {
                    /** @var $model \common\models\Testimonial */
                    return Html::a($model->project->name, ['project/view', 'id' => $model->project_id]);
                }
            ],
            [
                'attribute' => 'customer_image_id',
                'format' => 'raw',
                'value' => function ($model) {
                    /**
                     * @var $model common\models\Testimonial
                     */
                    if (!$model->customerImage) {
                        return null;
                    }
                    return Html::img($model->customerImage->absoluteUrl(), [
                        'alt' => $model->customer_name,
                        'height' => 200,
                    ]);
                }
            ],
            'title',
            'customer_name',
            'review:ntext',
            'rating',
        ],
    ]) ?>

</div>
