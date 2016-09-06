<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property string $title
 * @property string $subtitle
 * @property string $picture
 * @property string $video
 * @property string $type
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'subtitle', 'picture'], 'required'],
            [['type'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['subtitle', 'picture', 'video'], 'string', 'max' => 150],
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
            'subtitle' => 'Subtitle',
            'picture' => 'Picture',
            'video' => 'Video',
            'type' => 'Type',
        ];
    }
}
