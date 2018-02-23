<?php
namespace backend\controllers;


use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;


/**
 * Site controller
 */
class GoodController extends Controller
{
       public function actionIndex(){
           return $this->render('index');
       }

    public function actionCreate(){
        return $this->render('create');
    }
}
