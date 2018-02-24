<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

/**
 * This is the model class for table "get_pension".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $get_pension
 * @property string $create_time
 */
class GetPension extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'get_pension';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['get_pension'], 'number'],
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
            'user_id' => '用户ID',
            'get_pension' => '领取金额',
            'create_time' => '创建日期',
        ];
    }

    /**
     * @inheritdoc
     * @return GetPensionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GetPensionQuery(get_called_class());
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
        $query = static::find();


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
            'user_id' => $this->user_id,
            'get_pension' => $this->get_pension,
            'create_time' => $this->create_time,
        ]]);


        return $dataProvider;
    }

    /**
     * 获取领取养老金列表
     * @param $id
     * @return mixed
     */
    public function getPensionsList($id)
    {
        $query = static::find()->where(['user_id' => $id]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>1]);
        $list = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
        $data['list'] = $list;
        $data['pagination'] = $pagination;
        return $data;
    }

    /**
     * 保存领取养老金记录
     * @param array $array
     * @return bool
     */
    public function savePensions($array=[])
    {
        $Recruitment=new GetPension();
        $Recruitment->user_id = $array['user_id'];
        $Recruitment->get_pension = $array['get_pension'];
        $Recruitment->create_time = date('Y-m-d H:i:s',time());
        return $Recruitment->save();
    }

    /**
     * 获取最新的领取养老金记录
     * @param $id
     * @return GetPension|array|null
     */
    public function getLastGetPensions($id)
    {
        return static::find()->where(['user_id' => $id])->orderBy('create_time desc')->asArray()->one();
    }
}
