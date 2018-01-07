<?php
namespace app\models;

use yii\db\ActiveRecord;

class Marks extends ActiveRecord
{
    public static function getMarkByName($name)
    {
        $mark = Marks::find()->where(['name' => $name])->one();
        if (!$mark) {
            $mark = new Marks();
            $mark->name = $name;
            $mark->save(false);
        }
        return $mark;
    }
}

