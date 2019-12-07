<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KunjunganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="card widget-flat">
            <div class="card-body p-0">
                <div class="p-3 pb-0">
                    <div class="float-right">
                        <i class="mdi mdi-web text-primary widget-icon"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0">Kunjungan website hari ini</h5>
                    <h3 class="mt-2"><?=$todayWebView?></h3>
                </div>
                <div id="sparkline1"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-3 col-lg-6">
        <div class="card widget-flat">
            <div class="card-body p-0">
                <div class="p-3 pb-0">
                    <div class="float-right">
                        <i class="mdi mdi-web text-danger widget-icon"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0">Total Kunjungan Website</h5>
                    <h3 class="mt-2"><?=$totalWebView?></h3>
                </div>
                <div id="sparkline2"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-3 col-lg-6">
        <div class="card widget-flat">
            <div class="card-body p-0">
                <div class="p-3 pb-0">
                    <div class="float-right">
                        <i class="mdi mdi-file-document text-primary widget-icon"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0">Kunjungan hari ini (halaman)</h5>
                    <h3 class="mt-2"><?=$todayView?> halaman</h3>
                </div>
                <div id="sparkline3"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-3 col-lg-6">
        <div class="card widget-flat">
            <div class="card-body p-0">
                <div class="p-3 pb-0">
                    <div class="float-right">
                        <i class="mdi mdi-file-document text-danger widget-icon"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0">Total Kunjungan (halaman)</h5>
                    <h3 class="mt-2"><?=$totalView?> halaman</h3>
                </div>
                <div id="sparkline4"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    <div class="col-md-12">
        <br>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Grafik View Website</h4>
                <div class="spacer"></div>
                <select name="range" id="range">
                    <option value="3">3 Hari terakhir</option>
                    <option selected value="7">Satu Pekan terakhir</option>
                    <option value="30">Satu Bulan terakhir</option>
                    <option value="90">TIga Bulan terakhir</option>
                    <option value="365">Satu Tahun terakhir</option>
                </select>
                <canvas id="myChart" style="wodth:100%"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Alat musik paling sering dilihat</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive mt-3">
                            <table class="table table-hover table-striped table-bordered table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Alat Musik</th>
                                        <th class="text-center">Total View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index=1; foreach($top_am as $key => $value){ ?>
                                    <tr>
                                        <td><b><?= $index++ ?></b></td>
                                        <td>
                                            <img src="<?= \common\helper\ImageHelpers::getImageUrl(($value['img']!=null) ? 'alat-musik/'.$value['img'] : null) ?>"
                                                alt="contact-img" height="36" title="contact-img"
                                                class=" float-left mr-2" />
                                            <p class="mb-0 font-weight-bold"><a
                                                    href="<?=Url::base().'/alat-musik/view?id='.$value['id']?>"><?= $value['nama'] ?></a>
                                            </p>
                                            <span class="font-13"><?= $value['nama'] ?></span>
                                        </td>
                                        <td class="text-center">
                                            <?= $value['hitungan'] ?>
                                        </td>
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
    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Alat musik paling sering dilihat</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive mt-3">
                            <table class="table table-hover table-striped table-bordered table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kursus Musik</th>
                                        <th class="text-center">Total View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index=1; foreach($top_km as $key => $value){ ?>
                                    <tr>
                                        <td><b><?= $index++ ?></b></td>
                                        <td>
                                            <img src="<?= \common\helper\ImageHelpers::getImageUrl(($value['img']!=null) ? 'kursus/'.$value['img'] : null) ?>"
                                                alt="contact-img" height="36" title="contact-img"
                                                class=" float-left mr-2" />
                                            <p class="mb-0 font-weight-bold"><a
                                                    href="<?=Url::base().'/kursus/view?id='.$value['id']?>"><?= $value['nama'] ?></a>
                                            </p>
                                            <span class="font-13"><?= $value['nama'] ?></span>
                                        </td>
                                        <td class="text-center">
                                            <?= $value['hitungan'] ?>
                                        </td>
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
    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Alat musik paling sering dilihat</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive mt-3">
                            <table class="table table-hover table-striped table-bordered table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Guru</th>
                                        <th class="text-center">Total View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index=1; foreach($top_guru as $key => $value){ ?>
                                    <tr>
                                        <td><b><?= $index++ ?></b></td>
                                        <td>
                                            <img src="<?= \common\helper\ImageHelpers::getImageUrl(($value['img']!=null) ? 'guru/'.$value['img'] : null) ?>"
                                                alt="contact-img" height="36" title="contact-img"
                                                class=" float-left mr-2" />
                                            <p class="mb-0 font-weight-bold"><a
                                                    href="<?=Url::base().'/guru/view?id='.$value['id']?>"><?= $value['nama'] ?></a>
                                            </p>
                                            <span class="font-13"><?= $value['nama'] ?></span>
                                        </td>
                                        <td class="text-center">
                                            <?= $value['hitungan'] ?>
                                        </td>
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
</div>