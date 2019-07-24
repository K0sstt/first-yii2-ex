<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $address app\models\Address */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($address, 'zip_code')->textInput() ?>

    <?= $form->field($address, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'house')->textInput() ?>

    <?= $form->field($address, 'office_apartment')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
