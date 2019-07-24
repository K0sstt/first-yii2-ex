<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user app\models\User */
/* @var $address app\models\Address */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'email')->textInput(['maxlength' => true]) ?>

    <?php if(isset($address)): ?>

    <?= $form->field($address, 'zip_code')->textInput() ?>

    <?= $form->field($address, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'house')->textInput() ?>

    <?= $form->field($address, 'office_apartment')->textInput() ?>

    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
