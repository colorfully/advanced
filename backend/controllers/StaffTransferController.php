<?php

namespace backend\controllers;

use backend\models;
use app\models\StaffInfo;
use app\models\StaffPosistion;
use Yii;
use app\models\StaffTransfer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StaffTransferController implements the CRUD actions for StaffTransfer model.
 */
class StaffTransferController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all StaffTransfer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StaffTransfer();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StaffTransfer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new StaffTransfer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StaffTransfer();
        $position=StaffPosistion::find()->asArray()->all();
        if ($model->load(Yii::$app->request->post())) {
            //重新组装数据插入数据库
            $item=explode(' ',date('Y-m-d H:i:s'));
            $model->user_id=Yii::$app->request->get('id');
            $model->create_time=Yii::$app->request->post('StaffTransfer')['create_time'].' '.$item[1];
            //获取写入该信息的用户ID
            $model->create_author_id=Yii::$app->user->identity->getId();
            $model->save();
            //同步到staff_info
            $staff_info=StaffInfo::findOne(['user_id'=>Yii::$app->request->get('id')]);
            $staff_info->position=Yii::$app->request->post('StaffTransfer')['now_position'];
            $staff_info->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,'position'=>$position
            ]);
        }
    }

    /**
     * Updates an existing StaffTransfer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->create_time=substr($model->create_time,0,10);
        //定义的职位
        $position=StaffPosistion::find()->asArray()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'position'=>$position
            ]);
        }
    }

    /**
     * Deletes an existing StaffTransfer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StaffTransfer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StaffTransfer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StaffTransfer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
