<?php

namespace backend\models;

use Yii;
use yii\base\Behavior;

/**
 * This is the model class for table "uploaded_file".
 *
 * @property int $id
 * @property string $name
 * @property string $filename
 * @property int $size
 * @property string $type
 */
class UploadedFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploaded_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size'], 'integer'],
            [['name', 'filename'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'filename' => 'Filename',
            'size' => 'Size',
            'type' => 'Type',
        ];
    }
    public function behaviors() {
        return[
            [
                'class' => 'mdm\upload\UploadBehavior',
                'attribute' => 'filename',
                'autoSave' => TRUE,
                'autoDelete' => TRUE,
            ],
        ];
    }
    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        
        static::deleteAll(['type'=>null]);
    }
}

