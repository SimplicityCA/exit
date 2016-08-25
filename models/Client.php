<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property string $identity
 * @property string $names
 * @property string $lastnames
 * @property string $phone
 * @property string $cellphone
 * @property string $email
 * @property integer $reserve_id
 *
 * @property Reserve $reserve
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identity', 'names', 'lastnames', 'phone', 'cellphone', 'email', 'reserve_id','number_players','pay_method','total_price'], 'required'],
            [['reserve_id','number_players'], 'integer'],
            [['total_price'], 'number'],
            [['identity', 'phone', 'cellphone'], 'string', 'max' => 10],
            [['names', 'lastnames'], 'string', 'max' => 45],
            [['email','pay_method'], 'string', 'max' => 150],
            [['reserve_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reserve::className(), 'targetAttribute' => ['reserve_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'identity' => 'Cédula',
            'names' => 'Nombres',
            'lastnames' => 'Apellidos',
            'phone' => 'Teléfono',
            'cellphone' => 'Celular',
            'email' => 'Email',
            'reserve_id' => 'Reserve ID',
            'number_players' => 'Número de Participantes',
            'pay_method' => 'Método de Pago',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReserve()
    {
        return $this->hasOne(Reserve::className(), ['id' => 'reserve_id']);
    }
}
