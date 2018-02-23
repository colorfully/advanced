<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff_posistion".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $permissions
 */
class StaffPosistion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff_posistion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'permissions'], 'integer'],
            [['name'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '职位名称',
            'parent_id' => '父ID',
            'permissions' => '权限',
        ];
    }
}
