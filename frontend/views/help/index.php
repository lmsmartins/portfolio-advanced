<?php

use yii\helpers\Html;

$this->title = 'Help Center';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="help-index">

    <h1><?= Html::encode($this->title); ?></h1>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc gravida faucibus justo, eu volutpat dui faucibus eu.
        Vestibulum non urna posuere, consectetur nisi in, lacinia tellus. Aliquam ac euismod lectus, posuere pellentesque
        ligula. Mauris non congue nunc. Fusce dictum est a ante ullamcorper dictum. Integer viverra non lacus tincidunt
        viverra. Curabitur vehicula varius odio sed pretium. Sed porta, tellus sed ultricies ultrices, est diam dapibus
        turpis, sit amet imperdiet risus elit vel elit. Morbi fringilla placerat blandit. Aliquam dignissim euismod leo, ut
        rutrum risus consequat dapibus. Curabitur mollis efficitur orci, id porta sapien iaculis sagittis.
    </p>

    <div>
        <?= Html::a('Account Settings', ['help/account-settings']) ?>
    </div>

    <div>
        <?= Html::a('Login and Security', ['help/login-and-security']) ?>
    </div>

    <div>
        <?= Html::a('Privacy', ['help/privacy']) ?>
    </div>

</div>
