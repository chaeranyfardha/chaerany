<?php

namespace backend\models;

use Yii;
use common\models\User;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\BlameableBehavior;
use backend\models\Category;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $lead_photo
 * @property string $lead_text
 * @property string $content
 * @property string $meta_description
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $category_id
 *
 * @property Category $category
 * @property User $createdBy
 * @property User $updatedBy
 * @property PostTag[] $postTags
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['lead_text', 'content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by', 'category_id'], 'integer'],
            [['title', 'slug', 'lead_photo'], 'string', 'max' => 128],
            [['meta_description'], 'string', 'max' => 160],
            [['title'], 'unique'],
            [['slug'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'lead_photo' => 'Lead Photo',
            'lead_text' => 'Lead Text',
            'content' => 'Content',
            'meta_description' => 'Meta Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['post_id' => 'id']);
    }
     public function behaviors() {
        return[
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression ('NOW()'),
                ],
               
            [
                'class' => SluggableBehavior::classNAme(),
                'attribute' => 'title',
                'slugAttribute' => 'slug',
            ],
            [
               'class' => BlameableBehavior::className(),
                
                ]
            ];
    }
}
