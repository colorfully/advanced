<?php

namespace backend\controllers;

use app\models\Assessment;
use app\models\AssessmentLog;
use app\models\AsssessmentStandard;
use app\models\CollectPensions;
use app\models\GetPension;
use app\models\Punishment;
use app\models\RecordPensions;
use app\models\Recruitment;
use app\models\StaffInfo;
use app\models\StaffTransfer;
use backend\models\User;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * AssessmentController implements the CRUD actions for Assessment model.
 */
class FrontendController extends Controller
{
    public $layout = 'frontend-layout';
    public $user_id=0;
    public $full_pension=50;
    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }
    public function init()
    {
        $this->user_id=Yii::$app->user->getId();
    }

    /**
     * 登录
     * Lists all Assessment models.
     * @return mixed
     */
    public function actionIndex()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->actionSite();
        }
        $msg='请登录';
        $post = Yii::$app->getRequest()->post();
        if (isset($post)&&!empty($post)) {
            $msg='';
            $login = (new User())->Login($post['premium_subscriber_auth']['email'], $post['premium_subscriber_auth']['password']);
            if ($login)
                return $this->actionSite();
            else
                $msg='密码或者账号错误';
        }
        $this->layout=false;
        return $this->render('login',['error'=>$msg]);
    }

    /**
     * 首页
     * @return string
     */
    public function actionSite()
    {
        //获取登录账号的ID
        $user_id=Yii::$app->getUser()->getId();
        //通过登录账号ID查找用户信息
        $user_info=(new User())->getUserName($user_id);
        $session = Yii::$app->session;
        if($session->get('username')!=$user_info['username']){
            $session->set('username',$user_info['username']);
        }
        return $this->render('site',['user_info'=>$user_info]);
    }

    /**
     * 个人信息
     * @return string
     */
    public function actionPersonalInfo()
    {
        //获取登录账号的ID
        $user_id=Yii::$app->getUser()->getId();
        //通过登录账号ID查找用户信息
        $user_info=(new User())->getUserInfo($user_id);
        return $this->render('personal-info',['user_info'=>$user_info]);
    }

    /**
     * 退出登录
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->getUser()->logout();
        $this->layout=false;
        $this->redirect('/advanced/backend/web/index.php?r=frontend/index');
    }

    /**
     * 登录
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->actionSite();
        }
        $msg='请登录';
        $post = Yii::$app->getRequest()->post();
        if (isset($post)&&!empty($post)) {
            $msg='';
            $login = (new User())->Login($post['premium_subscriber_auth']['email'], $post['premium_subscriber_auth']['password']);
            if ($login)
                return $this->actionSite();
            else
                $msg='密码或者账号错误';
        }
        $this->layout=false;
        return $this->render('login',['error'=>$msg]);
    }

    /**
     * 调动人员信息
     * @return string
     */
    public function actionStaffTransfer()
    {
        //获取登录账号的ID
        $user_id=Yii::$app->getUser()->getId();
        //通过登录账号ID查找用户信息
        $StaffTransfer_info=(new StaffTransfer())->getStaffTransferInfo($user_id);
        $author_id=array_unique(array_column($StaffTransfer_info,'create_author_id'));
        $staff_info=(new StaffInfo())->getStaffInfo($author_id);
        if(!empty($staff_info)){
            $staff_arr=array_column($staff_info,'name','user_id');
        }
        foreach ($StaffTransfer_info as &$value){
                if(isset($staff_arr[$value['create_author_id']])){
                    $value['author_name']=$staff_arr[$value['create_author_id']];
                }
        }
        return $this->render('staff-transfer-info',['StaffTransfer_info'=>$StaffTransfer_info]);
    }

    /**
     * 奖惩信息
     * @return string
     */
    public function actionPunishment()
    {
        //获取登录账号的ID
        $user_id=$this->user_id;
        $punishmentList=(new Punishment())->getPunishmentList($user_id);
        $author_id=array_unique(array_column($punishmentList['list'],'create_author_id'));
        $staff_info=(new StaffInfo())->getStaffInfo($author_id);
        if(!empty($staff_info)){
            $staff_arr=array_column($staff_info,'name','user_id');
        }
        foreach ($punishmentList['list'] as &$value){
            if(isset($staff_arr[$value['create_author_id']])){
                $value['author_name']=$staff_arr[$value['create_author_id']];
            }
        }
        return $this->render('punishment',['punishmentList'=>$punishmentList['list'],'pagination'=>$punishmentList['pagination']]);

    }

    /**
     * 校园招聘
     * @return string
     */
    public function actionRecruitment()
    {
        //获取登录账号的ID
        $user_id=$this->user_id;
        $recruitmentList=(new Recruitment())->getRecruitment($user_id);
        foreach ($recruitmentList['list'] as &$value){
            $position=explode(',',$value['position_info']);
            $value['deadline']=substr($value['deadline'],0,10);
            foreach ($position as $ke=>$val){
                $position_detail=explode('-',$val);
                $value['position_list'][$ke]['position_name']=$position_detail[0];
                $value['position_list'][$ke]['position_money']=$position_detail[1];

            }
        }
        return $this->render('recruitment',['recruitmentList'=>$recruitmentList['list'],'pagination'=>$recruitmentList['pagination'],'type'=>1]);
    }

    /**
     * 创建校园招聘信息
     * @return string
     */
    public function actionCreateRecruitment()
    {
        $post=Yii::$app->request->post();
        $user_id=$this->user_id;
        $staff_info=(new StaffInfo())->getStaffInfo($user_id);
        unset($post['_csrf-backend']);
        $post['user_id']=$user_id;
        $post['introducer']=$staff_info[0]['name'];
        $result=(new Recruitment())->saveRecruitment($post);
        if($result){
            return json_encode('success');
        }else{
            return json_encode('false');
        }
    }

    /**
     * 查看校园招聘详情
     * @return string
     */
    public function actionViewRecruitment()
    {
        $recruitment_id=Yii::$app->request->get('id');
        $recruitment_info=(new Recruitment())->getRecruitmentOne($recruitment_id);
        $position=explode(',',$recruitment_info['position_info']);
        $value['deadline']=substr($recruitment_info['deadline'],0,10);
        foreach ($position as $ke=>$val){
            $position_detail=explode('-',$val);
            $recruitment_info['position_list'][$ke]['position_name']=$position_detail[0];
            $recruitment_info['position_list'][$ke]['position_money']=$position_detail[1];

        }
        return $this->render('recruitment',['recruitment_info'=>$recruitment_info,'type'=>2]);
    }

    /**
     * 养老金信息
     * @return string
     */
    public function actionRecordPensions()
    {
        $user_id = $this->user_id;
        $RecordList = (new RecordPensions())->getRecordList($user_id); //获取已经该员工已经交了多少个月养老金
        $PensionsList = (new CollectPensions())->getPensionsList($user_id); //获取上缴养老金列表
        $last_record = (new CollectPensions())->getLastPensions($user_id);//计算两次上缴养老金月数差
        $last_record_time = strtotime($last_record['create_time']);
        $diff_data = (int)((time() - $last_record_time) / 86400);
        if ($diff_data > 30)
            $can_use = 1;
        else
            $can_use = 0;
        $post = Yii::$app->request->post();
        if (!empty($post)) {
            $staff_info = (new StaffInfo())->getStaffInfo($user_id);
            if (isset($staff_info[0])) {
                $refer_pension = $staff_info[0]['pay'] * 0.02;//上缴养老金 按工资的 %2 来上缴
                $data = [
                    'user_id' => $user_id,
                    'salary' => $staff_info[0]['pay'],
                    'refer_pension' => $refer_pension
                ];
                (new CollectPensions())->savePensions($data);
                $update_record = (new RecordPensions())::findOne(['user_id' => $user_id]);
                if(isset($update_record)){
                    $update_record->updateCounters(['all_pensions' => 1]); //更新已经提交的养老金月数
                }else{
                    $create_record=new RecordPensions();
                    $create_record->user_id=$this->user_id;
                    $create_record->already_pensions=0;
                    $create_record->all_pensions=1;
                    $create_record->create_time=date('Y-m-d H:i:s',time());
                    $create_record->save();
                }

                return json_encode('success');
            }
        }
        $RecordList['need_month'] = $this->full_pension - (int)$RecordList['all_pensions']; //算出还需要上缴多少个月养老金
        return $this->render('record-pensions', ['RecordList' => $RecordList, 'PensionsList' => $PensionsList['list'], 'pagination' => $PensionsList['pagination'], 'can_use' => $can_use]);

    }

    /**
     * 领取养老金
     * @return string
     */
    public function actionGetPensions()
    {
        $user_id=$this->user_id;
        $RecordList=(new RecordPensions())->getRecordList($user_id);
        $RecordList['need_month']=$this->full_pension-(int)$RecordList['all_pensions'];
        $post=Yii::$app->request->post();
        $last_record = (new GetPension())->getLastGetPensions($user_id);//计算两次领取老金月数差
        $last_record_time = strtotime($last_record['create_time']);
        $diff_data = (int)((time() - $last_record_time) / 86400);
        if ($diff_data > 30)
            $can_use = 1;
        else
            $can_use = 0;
        if(!empty($post)){
            $sum=(new CollectPensions())->SumPensions($user_id);
            $array['user_id']=$user_id;
            $array['get_pension']=$sum*0.01;
            (new GetPension())->savePensions($array);
            return json_encode('success');
        }
        $PensionsList=(new GetPension())->getPensionsList($user_id);
        return $this->render('get-pensions',['PensionsList'=>$PensionsList['list'],'pagination'=>$PensionsList['pagination'],'need_month'=>$RecordList['need_month'],'can_use'=>$can_use]);
    }


    /**
     * 考核
     * @return string
     */
    public function actionAssessment()
    {
        $user_id=$this->user_id;
        //查询职工人员信息
        $staff_list=(new StaffInfo())->getStaffList($user_id);
        //查询已被评价过的职工人员列表
        $has_assessment=(new Assessment())->getAssessmentListById($user_id);
        $has_assessment=array_column($has_assessment,'other_id');
        foreach ($staff_list as $key=>&$value){
           if(in_array($value['user_id'],$has_assessment))
              unset($staff_list[$key]);
        }
        //查询考核的题目以及内容
        $standard_list=(new AsssessmentStandard())->getStandardList();
        return $this->render('assessment',['StaffList'=>$staff_list,'StandardList'=>$standard_list]);
    }

    /**
     * 保存考核评价等信息
     * @return string
     */
    public function actionCreateAssessment()
    {
        $post_data=Yii::$app->request->post();
        //start 保存到考核记录表
        $score_arr=explode(',',$post_data['score_date']);
        unset($score_arr[0]);
        $data=[];
        foreach ($score_arr as $key=>$value){
            $data[$key]['score']=$value;
            $data[$key]['user_id']=$post_data['user_id'];
        }
        (new AssessmentLog())->saveAssessmentLog($data);
        //end
        unset($data);
        $data['user_id']=$this->user_id;
        $data['other_id']=$post_data['user_id'];
        $data['evaluation']=$post_data['assess'];
        $data['average_score']=(float)$post_data['avg'];
        $data['type']=1;
        (new Assessment())->saveAssessment($data);
        return json_encode('success');
    }

    /**
     * 查询考核信息
     * @return string
     */
    public function actionAssessmentInfo()
    {
        $user_id=$this->user_id;
        $assessment_log=(new AssessmentLog())->getAssessmentLog($user_id);
        $standard_list=(new AsssessmentStandard())->getStandardList();
        $assessment_log=array_column($assessment_log,'avg_score','standard_id');
        foreach ($standard_list as $key=>&$value){
            if(isset($assessment_log[$value['id']])){
                $value['avg_score']=number_format($assessment_log[$value['id']],2);
            }else{
                $value['avg_score']='';
            }
        }
        $assessment=(new Assessment())->getAssessmentListByOtherId($user_id);
        return $this->render('assessment-info',['assessment'=>$assessment['list'],'pagination'=>$assessment['pagination'],'standard_list'=>$standard_list]);
    }

    public function actionLayout(){
        return $this->render('login');
    }



    /**
     * Displays a single Assessment model.
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
     * Creates a new Assessment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Assessment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Assessment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Assessment model.
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
     * Finds the Assessment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Assessment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Assessment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
