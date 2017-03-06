<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "params".
 *
 * @property integer $id
 * @property string $type
 * @property string $description
 * @property string $value
 * @property integer $game_id
 */
class Params extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'params';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id'], 'integer'],
            [['type', 'description', 'value','status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'description' => 'Description',
            'value' => 'Value',
            'game_id' => 'Game ID',
        ];
    }
}
