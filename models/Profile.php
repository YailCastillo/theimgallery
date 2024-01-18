<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Profile extends ActiveRecord
{
    public $profpic;

    public static function tableName()
    {
        return 'profile';
    }

    public function rules()
    {
        return [
            [['prof_bio'], 'string', 'max' => 500],
            [['prof_color'], 'string', 'max' => 15],
            [['prof_fontcolor'], 'string', 'max' => 15],
            [['profpic'], 'file', 'extensions' => 'png, jpg'],
        ];
    }
}