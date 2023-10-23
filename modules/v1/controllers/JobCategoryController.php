<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Default controller for the `v1` module
 */
class JobCategoryController extends ActiveController
{
    public $modelClass = "\app\models\JobCategory";

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        //TO DO authentication behaviour
        return $behaviors;
    }

    public function actions() {
        $actions = parent::actions();
        // unset($actions['index']);

        return $actions;
    }

    protected function verbs() {
        return [
            // 'index' => ['POST','GET']
            'test' => ['POST']
        ];
        
    }

    // public function actionIndex() {
    //     return ['message' => 'Yolo']; 
    // }

    public function actionTest(){
        return ['message' => 'This ist test']; 
    }

}
