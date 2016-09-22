<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "picture".
 *
 * @property integer $id
 * @property string $description
 * @property integer $game_id
 * @property string $type
 *
 * @property Game $game
 */
class Picture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'picture';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'type'], 'required'],
            [['game_id'], 'integer'],
            [['type','record'], 'string'],
            [['description'], 'string', 'max' => 150],
            [['game_id'], 'exist', 'skipOnError' => true, 'targetClass' => Game::className(), 'targetAttribute' => ['game_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'game_id' => 'Game ID',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGame()
    {
        return $this->hasOne(Game::className(), ['id' => 'game_id']);
    }
}
