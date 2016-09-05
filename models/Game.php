<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $video
 * @property string $status
 *
 * @property Picture[] $pictures
 */
class Game extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'status','recordh','recordm','price_d','price','title','subtitle'], 'required'],
            [['description', 'status','recordh','recordm'], 'string'],
            [['title', 'video','subtitle'], 'string', 'max' => 255],
            [['price_d','price'], 'integer'],
            [['picture','landing_picture'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'video' => 'Video',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPictures()
    {
        return $this->hasMany(Picture::className(), ['game_id' => 'id']);
    }
    public function getReserves()
    {
        return $this->hasMany(Reserve::className(), ['game_id' => 'id']);
    }
}
