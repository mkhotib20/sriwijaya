<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use frontend\components\BreadcrumbsHelper;
$this->title = $data->nama.' - Kursus Musik serta Jual beli Alat Musik Jogjakarta dan sekitarnya';

$this->params['breadcrumbs'][] = ['label' => 'Kursus Musik', 'url' => ['/kursus-musik']];
$this->params['breadcrumbs'][] = $data->nama;

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
            <div class="col-md-12">
                <h1><?=$data->nama?></h1>
                <h3>Rp. <?= number_format($data->tarif, 0, ".", ",") ?></h3>
                <div class="spacer"></div>
            </div>
            <div class="col-md-5">
            <img style="width: 100%" src="<?= \common\helper\ImageHelpers::getImageUrl(($data->img!=null) ? 'kursus/'.$data->img : null) ?>" alt="foto_<?=$data->nama?>">
            </div>
            <div class="col-md-7">
                <p>
                    <?= $data->deskripsi ?>
                </p>
                <h5> Guru : <?php foreach($guru as $key => $value) { echo '<a class="text-black" href="'.Url::base().'/kursus-musik/guru?slug=as77a6sgy73eywsjajhas87ehwhx8a&id='.$value['id'].'">'.$value->nama.'</a>'.', '; } ?> </h5>
                <hr class="gray">
                <p>Kategori : <?= $data->kat_nama ?></p>
            </div>
        </div>
    </div>
</section>
<section class="content bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="content-header text-center">
                    <h2 class="editable">Kursus Lainnya</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eveniet voluptates animi unde alias distinctio numquam aut sunt dolorum hic nostrum saepe ea, minima mollitia inventore. Voluptate similique dolore illum?</p>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="row">                   
                    <?php foreach($all_kursus as $key => $value) { ?>
                        <div class="col-md-3 my-3">
                            <div class="box-layanan static kursus">
                                <div class="imgxicon ">
                                <div class="bg-header" style="background: url('<?= \common\helper\ImageHelpers::getImageUrl(($value['img']!=null) ? 'kursus/'.$value['img'] : null) ?>') center center no-repeat; background-size: cover">
                                            
                                        </div>
                                    <div class="iconion">
                                        <div class="bl-icon ml-auto mr-auto"><span class="fe-shopping-bag"></span><a href=""></a></div>
                                    </div>
                                </div>
                                <div class="bl-caption p-3 text-center">
                                    <h5 class="breaked"><?= $value['nama'] ?></h5>
                                    <h6 class="price breaked-sm">
                                            <?= ($value['tarif'] != 0) ? 'Rp. '.number_format($value['tarif'], 0, '.', ',') : '' ?>
                                        <small>/bulan</small>
                                    </h6>
                                    <a class="text-black" href="<?= Url::base().'/kursus-musik/detail?slug=asdj8uduasjijiasda71wq8w9isjosk287qu9w&id='.$value['id'] ?>">Selengkapnya <i class="fe-chevrons-right"></i></a>
                                </div>
                            </div>
                    </div>
                    <?php } ?>
                </div>
                <hr class="gray">
            </div>
        </div>
    </div>
</section>
