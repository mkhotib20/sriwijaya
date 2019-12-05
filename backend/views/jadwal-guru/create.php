<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JadwalGuru */

$this->title = 'Create Jadwal Guru';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Gurus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-guru-create">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                        'days' => $days,
                        'jam' => $jam
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>
