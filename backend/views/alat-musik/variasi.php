<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AlatMusik */

$this->title = 'Variasi warna '. $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Alat Musik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alat-musik-view">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Pilihan Warna</h4>
                <div class="table-responsive">
                    <table class="table table-hovered">
                        <thead>
                            <th>Variasi</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <form id="form_warna" action="/alat-musik/variasi?id=<?= $id ?>" method="POST">
                        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                            <tr>
                                <td><input type="text" class="form-control" name="variasi"></td>
                                <td><input type="text" class="form-control" name="stock"></td>
                                <td><button id="select_warna" class="btn btn-primary"><i class="fe-plus"></i></button></td>
                            </tr>
                        </form>
                        <?php foreach($wmModel as $key => $value){?>
                            <tr id="row_<?=$value['id']?>" >
                                <td><?= $value['wm_variasi'] ?></td>
                                <td><input type="text" class="form-control" id="stock_<?=$value['id']?>" name="stock" value="<?= $value['stock'] ?>"></td>
                                <td><button onclick="updateData(this, <?= $value['id'] ?>, <?=$id?>)" class="btn btn-primary"><i class="fe-check"></i> </button> 
                                <button onclick="deleteData(<?= $value['id'] ?>)" class="btn btn-danger"><i class="fe-x"></i></button></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
