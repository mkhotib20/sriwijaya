<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AlatMusik */

$this->title = 'Penghargaan '. $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Alat Musik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alat-musik-view">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Tambahkan Penghargaan</h4>
                <div class="table-responsive">
                    <table class="table table-hovered">
                        <thead>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Tahun</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <form id="form_warna" action="/penghargaan/create" method="POST">
                        <input type="hidden" name="p_guru" value="<?= $id ?>">
                        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                            <tr>
                                <td><input type="text" class="form-control" required name="nama"></td>
                                <td><input type="text" class="form-control" required name="deskripsi"></td>
                                <td><input type="text" class="form-control" name="tahun"></td>
                                <td><button id="select_warna" class="btn btn-primary"><i class="fe-plus"></i></button></td>
                            </tr>
                        </form>
                        <?php foreach($penghargaan as $key => $value){?>
                            <tr id="row_<?=$value['id']?>" >
                                <td><?= $value['nama'] ?></td>
                                <td><?= $value['deskripsi'] ?></td>
                                <td><?= $value['tahun'] ?></td>
                                <td><button onclick="delPenghargaan(<?= $value['id'] ?>)" class="btn btn-danger"><i class="fe-x"></i></button></td>
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
