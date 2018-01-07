<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use cornernote\linkall\LinkAllBehavior;


class Articles extends ActiveRecord
{
    public $mark_ids;
    public $article_img;

    public static function tableName()
    {
        return '{{%articles}}';
    }

    public function behaviors()
    {
        return [
            LinkAllBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['title', 'short_description', 'description', 'category_id', 'mark_ids'], 'required'],
            [['title', 'short_description',  ], 'string', 'max' => 255],
            [['category_id', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['article_img'], 'file']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'short_description' => 'Короткий опис',
            'description' => 'Повна стаття',
            'category_id' => 'Категорія',
            'article_img' => 'Фотокартка статті',
          
            'mark_ids' => 'Мітки',
        
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $marks = [];
        foreach ($this->mark_ids as $markName) {
            $mark = Marks::getMarkByName($markName);
            if ($mark) {
                $marks[] = $mark;
            }
        }
        $this->linkAll('marks', $marks);
        parent::afterSave($insert, $changedAttributes);
    }

    public function getMarks()
    {
        return $this->hasMany(Marks::className(), ['id' => 'tag_id'])
            ->viaTable('markArticle', ['post_id' => 'id']);
    }

}
