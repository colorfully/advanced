<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "recruitment".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $introducer
 * @property string $company
 * @property string $address
 * @property string $content
 * @property string $phone
 * @property string $create_time
 * @property string $deadline
 * @property string $method
 * @property string $school_location
 */
class Recruitment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recruitment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['content'], 'string'],
            [['create_time', 'deadline'], 'safe'],
            [['introducer'], 'string', 'max' => 25],
            [['company', 'address', 'school_location'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 15],
            [['method'], 'string', 'max' => 255],
            [['email'],'email'],
            [['introduced'],'string','max'=>200],
            [['position_info'],'string','max'=>155],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '发布人id',
            'introducer' => '介绍人',
            'company' => '公司',
            'address' => '地址',
            'content' => '内容',
            'phone' => '电话号码',
            'create_time' => '创建时间',
            'deadline' => '截止时间',
            'method' => '方式',
            'school_location' => '学校位置',
            'email' => '邮箱',
            'introduced'=>'公司介绍',
            'position_info'=>'职位'
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
        $query = Recruitment::find();


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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'introducer' => $this->introducer,
            'address' => $this->address,
            'phone' => $this->phone,
            'create_time' => $this->create_time,
            'deadline' => $this->deadline,
            'method' => $this->method,
            'school_location' => $this->school_location,
            'email' => $this->email,
        ]]);

        $query->andFilterWhere(['like', 'company', $this->company]);

        return $dataProvider;
    }

    /**
     * 获取招聘信息
     * @param $id
     * @return mixed
     */
    public function getRecruitment($id)
    {
        $query = static::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>2]);
        $list = $query->where('unix_timestamp(deadline)>'.time())->offset($pagination->offset)->limit($pagination->limit)->orderBy('create_time desc')->asArray()->all();
        $data['list'] = $list;
        $data['pagination'] = $pagination;
        return $data;
    }

    /**
     * 保存招聘信息
     * @param array $array
     * @return bool
     */
    public function saveRecruitment($array=[])
    {
        $Recruitment=new Recruitment();
        $Recruitment->user_id = $array['user_id'];
        $Recruitment->introducer = $array['introducer'];
        $Recruitment->company = $array['company'];
        $Recruitment->address = $array['address'];
        $Recruitment->content = $array['content'];
        $Recruitment->phone = $array['phone'];
        $Recruitment->create_time = date('Y-m-d H:i:s',time());
        $Recruitment->deadline = $array['deadline'];
        $Recruitment->method = $array['method'];
        $Recruitment->school_location = isset($array['school_location'])?$array['school_location']:'';
        $Recruitment->email = $array['email'];
        $Recruitment->position_info = $array['position_info'];
        $Recruitment->introduced = $array['introduced'];
        return $Recruitment->save();
    }

    public function getRecruitmentOne($id)
    {
        return static::find()->where('id='.$id)->asArray()->one();
    }
}
