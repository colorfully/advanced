<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "punishment".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $staff_info_id
 * @property string $content
 * @property string $create_time
 */
class Punishment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'punishment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'staff_info_id','create_author_id'], 'integer'],
            [['create_time'], 'safe'],
            [['content'], 'string', 'max' => 155],
            [['title'], 'string', 'max' => 55],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户id',
            'staff_info_id' => '档案Id',
            'create_author_id'=>'作者Id',
            'title'=>'标题',
            'content' => '内容',
            'type' => '类型',
            'create_time' => '创建时间',
        ];
    }

    public function getPunishmentList($id)
    {
        $query = static::find()->where(['user_id' => $id]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>2]);
        $list = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
        $data['list'] = $list;
        $data['pagination'] = $pagination;
        return $data;
    }
}
