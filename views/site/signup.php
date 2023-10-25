<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */


use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Signup ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-body">
    <h5 class="card-title text-center"><?= Html::encode($this->title) ?></h5>
    <p>Please fill out the following fields to signup:</p>
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div style="color:#999;margin:1em 0">
        Have an account? <?= Html::a('Login', ['site/login']) ?>.
    </div>

    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>