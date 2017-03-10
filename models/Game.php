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
            [['description', 'status','recordh','recordm','price_d','price','title','subtitle','start_time','duration'], 'required'],
            [['description', 'status','recordh','recordm'], 'string'],
            [['min_people','max_people','order'], 'integer'],
            [['title', 'video','subtitle'], 'string', 'max' => 255],
            [['start_time', 'end_time'], 'string', 'max' => 10],
            [['duration','space_time'], 'string', 'max' => 15],
            [['price_d','price'], 'number'],
            [['picture','landing_picture'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
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
        return $this->hasMany(Picture::className(), ['game_id' => 'id'])->orderBy(['id'=>SORT_DESC]);
    }
    public function getReserves()
    {
        return $this->hasMany(Reserve::className(), ['game_id' => 'id']);
    }
}
