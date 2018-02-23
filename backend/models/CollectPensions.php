<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "collect_pensions".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $salary
 * @property string $refer_pension
 * @property string $create_time
 */
class CollectPensions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collect_pensions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['salary', 'refer_pension'], 'number'],
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
            'salary' => '薪水',
            'refer_pension' => '上缴养老金额',
            'create_time' => '创建日期',
        ];
    }

    /**
     * @inheritdoc
     * @return CollectPensionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CollectPensionsQuery(get_called_class());
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
        $query = CollectPensions::find();


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
            'salary' => $this->salary,
            'refer_pension' => $this->refer_pension,
            'create_time' => $this->create_time,
        ]]);


        return $dataProvider;
    }

    /**
     * 获取上缴养老金列表
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
     * 计算已上缴金额总数
     * @param $id
     * @return mixed
     */
    public function SumPensions($id)
    {
        $data=static::find()->select(["sum(refer_pension) as a" ])->groupBy('user_id')->where('user_id='.$id)->sum('a');
        return $data;
    }

    /**
     * 保存养老金信息
     * @param $data
     */
    public function savePensions($data)
    {
        $collect_pensions=new CollectPensions();
        $collect_pensions->user_id=$data['user_id'];
        $collect_pensions->salary=$data['salary'];
        $collect_pensions->refer_pension=$data['refer_pension'];
        $collect_pensions->create_time=date('Y-m-d H:i:s',time());
        $collect_pensions->save();
    }

    /**
     * 获取最新的上缴养老金记录
     * @param $id
     * @return CollectPensions|array|null
     */
    public function getLastPensions($id)
    {
        return static::find()->where(['user_id' => $id])->orderBy('create_time desc')->asArray()->one();
    }


}
