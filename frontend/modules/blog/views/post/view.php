<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Post $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="post-view__date">
        <?= Yii::$app->formatter->asDate($model->created_at) ?>
    </div>

    <div class="post-view__body">
        <?= Yii::$app->formatter->asParagraphs($model->body) ?>
    </div>


</div>
