<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use frontend\components\BreadcrumbsHelper;
$this->title = $data->nama.' - Kursus Musik serta Jual beli Alat Musik Jogjakarta dan sekitarnya';

$this->params['breadcrumbs'][] = ['label' => 'Alat Musik', 'url' => ['/alat-musik']];
$this->params['breadcrumbs'][] = $data->nama;
$harga_diskon = ($data->harga_dasar-$data->harga_final)/$data->harga_dasar*100;

?>
<div style="height: 130px"></div>
<?=
BreadcrumbsHelper::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]);
?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
            <div class="bordering">
            <img style="width: 100%" src="<?= \common\helper\ImageHelpers::getImageUrl(($data->img!=null) ? 'alat-musik/'.$data->img : null) ?>" alt="foto_<?=$data->nama?>">
            </div>
            </div>
            <div class="col-md-7">
                <h1><?=$data->nama?></h1>
                <p><?= $data->kat_nama?></p>
                <?php if($harga_diskon != 0){ ?>
                    <div class="text-muted"><strike>Rp. <?= number_format($data->harga_dasar, 0, '.', ',') ?></strike></div>
                <?php }else{ ?>
                    <div class="spacer"></div>
                <?php } ?>
                <h3 class="price">
                    <?= ($data->harga_final != 0) ? 'Rp. '.number_format($data->harga_final, 0, '.', ',') : '' ?>
                </h3>
                <b> <p>Stock tersedia : <?= $stock ? $stock : 0 ?></p></b>
                <h5>
                <?php foreach($data_wm as $key => $value){ ?>
                    <span class="badge badge-pill bg-violet text-white px-4 py-2"><?=$value->wm_variasi?> <span class="badge badge-pill badge-light"><?= $value->stock ?></span> </span> 
                <?php } ?>
                </h5>
                <div class="spacer"></div>
                <p>
                    <?= $data->deskripsi ?>
                </p>
                <hr class="gray">
            </div>
        </div>
    </div>
</section>
<section class="content bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="content-header text-center">
                    <h2 class="editable">Alat Musik Lainnya</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eveniet voluptates animi unde alias distinctio numquam aut sunt dolorum hic nostrum saepe ea, minima mollitia inventore. Voluptate similique dolore illum?</p>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="row">                   
                    <?php foreach($all_am as $key => $value) { 
                        $diskon = ($value['harga_dasar']-$value['harga_final'])/$value['harga_dasar']*100;
                        ?>
                        <div class="col-md-3 my-4">
                            <div class="box-produk">
                                <a href="<?= Url::base().'/alat-musik/detail?slug=asdj8uduasjijiasda71wq8w9isjosk287qu9w&id='.$value['id'] ?>">
                                    <div class="bg-header" style="background: url('<?= \common\helper\ImageHelpers::getImageUrl(($value['img']!=null) ? 'alat-musik/'.$value['img'] : null) ?>') center center no-repeat; background-size: cover">
                                        <?php if($diskon != 0) { ?>
                                        <div class="ribbon"><span><?= number_format($diskon, 1, '.', ',') ?> %</span></div>
                                        <?php } ?>
                                    </div>
                                    <div class="bg-caption text-center">
                                        <h5 class="breaked"><?= $value['nama'] ?></h5>
                                        <?php if($diskon != 0){ ?>
                                            <div class="text-muted"><strike><small>Rp. <?= number_format($value['harga_dasar'], 0, '.', ',') ?></small></strike></div>
                                        <?php }else{ ?>
                                            <div class="spacer"></div>
                                        <?php } ?>
                                        <h6 class="price">
                                             <?= ($value['harga_final'] != 0) ? 'Rp. '.number_format($value['harga_final'], 0, '.', ',') : '' ?>
                                        </h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <hr class="gray">
            </div>
        </div>
    </div>
</section>
