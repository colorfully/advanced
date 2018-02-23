<?php

namespace app\models;

use backend\models\User;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "staff_info".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $id_card
 * @property integer $age
 * @property string $position
 * @property integer $sex
 * @property integer $pay
 * @property string $create_date
 */
class StaffInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'age', 'pay'], 'integer'],
            [['create_date'], 'safe'],
            [['position'],'required','on'=>'create'],
            ['sex','string'],
            [['name', 'position'],'string', 'max' => 25],
            [['name'],'required','on'=>'create'],
            [['address', 'id_card'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 50],
        ];
    }

    public function Scenario()
    {
        return [
            'create' => ['position', 'name'],
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
            'name' => '姓名',
            'address' => '地址',
            'phone' => '手机号码',
            'id_card' => '身份证',
            'age' => '年龄',
            'position' => '职位',
            'sex' => '性别',
            'pay' => '薪酬',
            'create_date' => '创建日期',
        ];
    }

    public function getUsers()
    {
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

    public function search($params)
    {
        $query = $this::find();


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
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'id_card' => $this->id_card,
            'deadline' => $this->age,
            'position' => $this->position,
            'sex' => $this->sex,
            'pay' => $this->pay,
            'create_date' => $this->create_date,
        ]]);

        return $dataProvider;
    }

    /**
     * 获取职工信息
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getStaffInfo($id)
    {
      return static::find()->where(['user_id'=>$id])->asArray()->all();
    }

    public function getStaffList($id)
    {
        return static::find()->where('user_id!='.$id)->asArray()->all();
    }

}
