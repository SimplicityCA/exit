<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property integer $id
 * @property string $status
 * @property integer $client_id
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'client_id'], 'integer'],
            [['status'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'client_id' => 'Client ID',
        ];
    }
}
