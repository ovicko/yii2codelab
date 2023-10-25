<?php

namespace app\modules\v1\controllers;

use app\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\HttpHeaderAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

/**
 * Default controller for the `v1` module
 */
class JobController extends ActiveController
{
    public $modelClass = "\app\models\Job";

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => \yii\filters\auth\CompositeAuth::class,
            'authMethods' => [
                [
                    'class' => \yii\filters\auth\HttpBasicAuth::class,
                    'auth' => function ($username, $password) {
                        $user = User::find()->where(['username' => $username])->one();
                        if ($user && $user->validatePassword($password)) {
                            return $user;
                        }
                        return null;
                    },
                ],
                \yii\filters\auth\QueryParamAuth::class,
            ],
        ];
        return $behaviors;
    }
}
