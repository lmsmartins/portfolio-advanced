<?php

use common\models\Post;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var frontend\modules\blog\models\PostSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'post'],
        'layout' => "{items}\n{pager}",
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->title), ['/blog/post/' . $model->slug]);
        },
    ]) ?>

</div>
