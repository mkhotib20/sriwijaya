<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AmKategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Am Kategoris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="am-kategori-index">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Tambah <?= Html::encode($this->title) ?></h4>
                <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'icon')->dropDownList($icons, ['class' => 'form-control']); ?>
                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                    </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List <?= Html::encode($this->title) ?></h4>
                
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'attribute' => 'icon',
                'format' => 'raw',
                'value' => function($dataProvider){
                    return '<div class="svg-sm">'.\frontend\components\Icons::get($dataProvider->icon).'</div>';
                }
            ],
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
