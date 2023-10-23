<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

/**
 * This is the model class for table "job".
 *
 * @property int $id
 * @property int|null $job_category_id
 * @property string|null $seo_link
 * @property int|null $user_id
 * @property int|null $status
 * @property string|null $title
 * @property string|null $description Content of the job
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Job extends CustomBaseActiveRecord implements Linkable
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,

            [
            'class' => SluggableBehavior::class,
            'attribute' => 'title',
            'slugAttribute' => 'seo_link'
        ]];

    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'job_category_id', 'user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['seo_link', 'title'], 'string', 'max' => 255],
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
            'job_category_id' => 'Job Category ID',
            'seo_link' => 'Seo Link',
            'user_id' => 'User ID',
            'status' => 'Status',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function fields()
    {
        $fields = parent::fields();
        // $fields['job_category_id'] = function ($model) {
        //     return JobCategory::findOne($model->job_category_id);
        // };

        return $fields;
    }

    public function extraFields()
    {
        return ['jobCategory'];
    }


    public function getJobCategory()  {
        return $this->hasOne(JobCategory::class, ['id' => 'job_category_id']);
    }

    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['job/view', 'id' => $this->id], true),
            'view' => Url::to(['job/view', 'id' => $this->id], true),
        ];
    }
}
