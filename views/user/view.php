<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $user app\models\User */

$this->title = $user->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $user->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $user->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <!-- <?= $user->login ?> -->

    <?= DetailView::widget([
        'model' => $user,
        'attributes' => [
            'id',
            'login',
            'password',
            'first_name',
            'last_name',
            'gender',
            'date',
            'email:email',
        ],
        'model' => $addresses,
        'attributes' => [
            'id',
            'user_id',
            'zip_code',
            'country',
            'city',
            'street',
            'house',
            'office_apartment',
        ],
    ]) ?>

</div>
