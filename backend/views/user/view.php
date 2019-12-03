<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
    <h4 class="header-title">Detail <?= Html::encode($this->title) ?></h4>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'name',
            'password',
            'user_type',
            'verification_token',
            'password_reset_token',
            'username',
            'email:email',
            'status',
            'login_failed',
            'last_login_attempt',
            'penalty_time',
            'auth_key',
            'created_by',
            'created_by_name',
            'updated_at',
            'created_at',
        ],
    ]) ?>

    </div>
        </div>
    </div>
</div>
</div>
