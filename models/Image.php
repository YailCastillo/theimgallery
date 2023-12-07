<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "libros".
 *
 * @property int $img_id
 * @property string $img_title
 * @property string $img_capt
 * @property string $img_date
 * @property string $img_img
 * @property string $img_user
 */
class Image extends ActiveRecord
{

    public $archivo;
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'image';
    }

    public function rules()
    {
        return [
            [['img_title', 'img_capt'], 'required'],
            [['img_date'], 'safe'],
            [['img_title'], 'string', 'max' => 100],
            [['img_capt'], 'string', 'max' => 1000],
            [['img_user'], 'string', 'max' => 255],
            [['archivo'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'img_id' => 'ID',
            'img_tile' => 'Title',
            'img_capt' => 'Caption',
            'img_date' => 'Date',
            'img_user' => 'User',
            'archivo' => 'Image',
        ];
    }
}