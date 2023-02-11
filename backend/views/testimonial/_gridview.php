<?php
use common\models\Testimonial;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var backend\models\TestimonialSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var \common\models\Project[] $projects */
/** @var boolean $isProjectColumnVisible */
?>

<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        [
            'attribute' => 'project_id',
            'format' => 'raw',
            'filter' => $projects,
            'visible' => $isProjectColumnVisible,
            'value' => function ($model) {
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
                    'height' => 75,
                ]);
            }
        ],
        'title',
        'customer_name',
        //'review:ntext',
        'rating',
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Testimonial $model, $key, $index, $column) {
                return Url::toRoute(['testimonial/' . $action, 'id' => $model->id]);
            }
        ],
    ],
]);