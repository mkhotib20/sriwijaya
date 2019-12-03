<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List <?= Html::encode($this->title) ?></h4>
                <p>
                    <?= Html::a('Create User', ['create'], ['class' => 'btn btn-primary']) ?>
                </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'name',
            'password',
            'user_type',
            'verification_token',
            //'password_reset_token',
            //'username',
            //'email:email',
            //'status',
            //'login_failed',
            //'last_login_attempt',
            //'penalty_time',
            //'auth_key',
            //'created_by',
            //'created_by_name',
            //'updated_at',
            //'created_at',

            [
                'class' => 'backend\components\ActionColumn',
                'template' => '{view} {update} {delete}',
                'header'=> "Pilihan"
            ],
        ],
    ]); ?>


            </div>
        </div>
    </div>
</div>

</div>
