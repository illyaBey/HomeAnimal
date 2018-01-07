<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Comments extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%comments}}';
    }
}
