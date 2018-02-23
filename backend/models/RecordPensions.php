<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "record_pensions".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $already_pensions
 * @property integer $all_pensions
 * @property string $create_time
 */
class RecordPensions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'record_pensions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'already_pensions', 'all_pensions'], 'integer'],
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
            'already_pensions' => '已经提交养老金月数',
            'all_pensions' => '总月数',
            'create_time' => '创建日期',
        ];
    }

    /**
     * @inheritdoc
     * @return RecordPensionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecordPensionsQuery(get_called_class());
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
            'already_pensions' => $this->already_pensions,
            'all_pensions' => $this->all_pensions,
            'create_time' => $this->create_time,
        ]]);
//
//        $query->andFilterWhere(['like', 'company', $this->company]);

        return $dataProvider;
    }

    public function getRecordList($id)
    {
        return static::find()->where(['user_id'=>$id])->asArray()->one();
    }
}
