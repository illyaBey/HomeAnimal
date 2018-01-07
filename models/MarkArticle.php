<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class MarkArticle extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%markArticle}}';
    }

    public function rules()
    {
        return [
            [['post_id', 'tag_id'], 'integer']
        ];
    }

    public function getMarks()
    {
        return $this->hasOne(Marks::className(), ['id' => 'tag_id']);
    }


}
