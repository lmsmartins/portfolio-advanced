<?php

namespace frontend\controllers;

class BlogController extends \yii\web\Controller
{
    public function actionHowToUseGii()
    {
        return $this->render('how-to-use-gii');
    }

    public function actionIAmStartingABlog()
    {
        return $this->render('i-am-starting-a-blog');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
