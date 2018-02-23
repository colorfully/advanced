<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

/**
 * This is the model class for table "assessment".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $evaluation
 * @property double $average_score
 * @property integer $type
 * @property string $create_time
 */
class Assessment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assessment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'type','other_id'], 'integer'],
            [['average_score'], 'number'],
            [['create_time'], 'safe'],
            [['evaluation'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '评价者',
            'evaluation' => '评价',
            'average_score' => '平均分',
//            'type' => '评价类型: 1:学生 2:职工',
            'other_id' => '被评价者ID',
            'create_time' => '创建时间',
            'name'=>'姓名'
        ];
    }

    /**
     * @inheritdoc
     * @return AssessmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AssessmentQuery(get_called_class());
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Assessment::find();



        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['and',[
//        'id' => $params['Assessment']['id'],
        'user_id' => $this->user_id,
        'evaluation' => $this->evaluation,
//        'average_score' => $this->average_score,
//        'other_id' => $this->other_id,
        'create_time' =>$this->create_time,
    ]]);

        return $dataProvider;
    }

    public function saveAssessment($data)
    {
        $Assessment = new Assessment();
        $Assessment->user_id = $data['user_id'];
        $Assessment->evaluation = $data['evaluation'];
        $Assessment->average_score = $data['average_score'];
        $Assessment->type = $data['type'];
        $Assessment->other_id = $data['other_id'];
        $Assessment->create_time =date('Y-m-d H:i:s', time());
        $Assessment->save();
        return true;
    }

    /**
     * 查询评价信息通过评价者ID
     * @param $user_id
     * @return Assessment[]|array
     */
    public function getAssessmentListById($user_id)
    {
        return static::find()->where(['user_id'=>$user_id])->asArray()->all();
    }

    /**
     * 查询评价信息通过被评价者id
     * @param $user_id
     * @return Assessment[]|array
     */
    public function getAssessmentListByOtherId($user_id)
    {
        $query = static::find()->where(['and',['other_id'=>$user_id],['!=','evaluation','']]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>1]);
        $list = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
        $data['list'] = $list;
        $data['pagination'] = $pagination;
        return $data;
    }
}
