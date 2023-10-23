<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "job_category".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $seo_link
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class JobCategory extends CustomBaseActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'slugAttribute' => 'seo_link'
            ]
        ];

    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'seo_link'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'seo_link' => 'Seo Link',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function fields()
    {
        $fields = parent::fields();
        $fields['created_at'] = function ($model) {
            return Yii::$app->formatter->asDatetime($model->created_at);
        };
        // remove fields that contain sensitive information
        unset($fields['updated_at']);

        return $fields;
    }
}
