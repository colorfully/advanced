<?php

namespace app\models;

use Codeception\Lib\Interfaces\ActiveRecord;
use Yii;
use yii\data\ActiveDataProvider;
use backend\models\User;

/**
 * This is the model class for table "staff_transfer".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $original_position
 * @property string $now_position
 * @property string $reason
 * @property string $create_time
 */
class StaffTransfer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff_transfer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','create_author_id'], 'integer'],
            [['create_time'], 'safe'],
            [['original_position', 'now_position'], 'string', 'max' => 20],
            [['reason'], 'string', 'max' => 50],
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
            'original_position' => '原来职位',
            'now_position' => '目前职位',
            'reason' => '调动原因',
            'create_author_id'=>'经手人',
            'create_time' => '创建时间',
        ];
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
        $query = StaffTransfer::find();

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
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'original_position' => $this->original_position,
            'now_position' => $this->now_position,
            'reason' => $this->reason,
            'create_author_id' => $this->create_author_id,
            'create_time' => $this->create_time,
        ]);

//        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }

    public function getStaffTransferInfo($id)
    {
        return static::find()->where('user_id='.$id)->orderBy('create_time desc')->asArray()->all();
    }

}
