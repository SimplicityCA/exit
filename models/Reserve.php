<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserve".
 *
 * @property integer $id
 * @property string $start_date
 * @property string $end_date
 * @property string $status
 * @property integer $game_id
 *
 * @property Game $game
 */
class Reserve extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserve';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date', 'status', 'game_id'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['status'], 'string'],
            [['game_id'], 'integer'],
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
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'status' => 'Status',
            'game_id' => 'Game ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGame()
    {
        return $this->hasOne(Game::className(), ['id' => 'game_id']);
    }
        public function getClients()
    {
        return $this->hasMany(Client::className(), ['id' => 'game_id']);
    }
}
