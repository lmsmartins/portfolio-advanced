<?php
use kartik\rating\StarRating;
use yii\helpers\Html;

/** @var common\models\Testimonial $model */
?>

<div class="project-view__testimonial">
    <?php
    if ($model->customerImage) {
        echo Html::img($model->customerImage->absoluteUrl(), ['class' => 'project-view__testimonial-image']);
    }
    ?>
    <?= $model->customer_name ?>

    <?php
    echo StarRating::widget([
        'name' => 'rating',
        'value' => $model->rating,
        'pluginOptions' => [
            'displayOnly' => true,
            'size' => 'sm',
        ]
    ]);
    ?>

    <div class="font-weight-bold">
        <?= $model->title ?>
    </div>

    <div>
        <?= $model->review ?>
    </div>
</div>
