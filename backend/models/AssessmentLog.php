<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assessment_log".
 *
 * @property integer $id
 * @property integer $standard_id
 * @property string $score
 * @property string $create_time
 */
class AssessmentLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assessment_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'standard_id','user_id'], 'integer'],
            [['score'], 'number'],
            [['create_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'standard_id' => '关联standard的id',
            'score' => '分数',
            'create_time' => '创建时间',
            'user_id' => '用户ID',
        ];
    }


    /**
     * 将评价数据保存在评价记录表
     * @param $data
     * @return bool
     */
    public function saveAssessmentLog($data)
    {

        foreach ($data as $key=>$value){
            $AssessmentLog=new AssessmentLog();
            $AssessmentLog->standard_id=$key;
            $AssessmentLog->score=$value['score'];
            $AssessmentLog->create_time=date('Y-m-d H:i:s',time());
            $AssessmentLog->user_id=$value['user_id'];
            $AssessmentLog->save();
        }

        return true;
    }

    public function getAssessmentLog($id)
    {
        return static::find()->select('avg(score) as avg_score,standard_id')->where(['user_id'=>$id])->groupBy('standard_id')->asArray()->all();
    }
}
