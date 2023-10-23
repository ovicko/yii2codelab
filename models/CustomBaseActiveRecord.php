<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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
class CustomBaseActiveRecord extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
            TimestampBehavior::class,
        ]];
    }
}
