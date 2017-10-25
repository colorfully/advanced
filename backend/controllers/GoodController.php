<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use mdm\admin\components\MenuHelper;

/**
 * Site controller
 */
class GoodController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionDelete(){
        return $this->render('delete');
    }
}
