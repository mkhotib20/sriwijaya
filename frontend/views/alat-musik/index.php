<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use frontend\components\BreadcrumbsHelper;

$this->title = 'Alat Musik - Kursus Musik serta Jual beli Alat Musik Jogjakarta dan sekitarnya';
$data = [
    ['key' => 'home_1', 'content' => 'Jadilah musisi terbaik'],
    ['key' => 'home_2', 'content' => 'Indonesia'],
];
$this->params['breadcrumbs'][] = "Alat Musik";


?>
<header>
    <div class="produk-header" style="background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.3)), url(<?=Url::base();?>/img/piano.jpg) center no-repeat; background-size: cover; background-attachment: fixed">  
        <div class="container">
        <div class="row">
            <div class="col-md-12 parent-ver">
                <div class="ch-ver">
                    <h1 class="ch-title text-center editable">Alat Musik</h1>
                </div>
            </div>
        </div>
        </div>
    </div>
</header>
<style>
    .quick-link .active{
        font-weight: bold;
    }
</style>
<div class="spacer"></div>
<?=
BreadcrumbsHelper::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => [],
]);
?>
<section class="content bg-white">
    <div class="container">
                <div class="spacer"></div>
        <div class="row">
            <div class="col-md-3">
                <form action="" method="GET">
                    <input value="<?= (isset($_GET['src_key']) ? $_GET['src_key'] : '') ?>" name="src_key" type="text" placeholder="cari disini" class="form-control">
                </form>
                <div class="spacer"></div>
                <h5>Kategori Produk</h5>
                <div class="unline"></div>
                <div class="spacer"></div>
                <ul class="quick-link prod-kat">
                    <li class="ql-item text-black <?= ($selectedKat==0) ? 'active' : '' ?>">
                        <a href="?kat=0">Semua Kategori (<?=$allMusik?>) </a>
                    </li>
                    <?php foreach($kategori as $key => $value){ ?>
                    <li class="ql-item text-black <?= ($value['isActive']) ? 'active' : '' ?>">
                        <a href="<?= $query_result->changeUrlParams('ur.com', 'kat', $value['kategori'])?>"><?= $value['namaKat'] ?> (<?=$value['jumlahKat']?>) </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-7">
                        <p>Menampilkan <?= $countAll ?> produk dari <?= ($selectedKat!=0) ? 'kategori '. \backend\models\AmKategori::find()->where(['id' => $selectedKat])->one()->name : 'Semua kategori'?></p>
                    </div>
                    <div class="col-md-5">
                        <div class="filter text-right">
                            <span>Urutkan : </span><a onclick="showDropdown()" class="btn-filter" href="javascript:void(0)"><?= $filters[$filterSelected] ?> <span class="fe-chevron-down"></span></a>
                            <div class="filter-dropdown">
                                <ul class="text-left">
                                    <?php foreach($filters as $key => $value){ ?>
                                    <li class="fd-item"><a href="<?= $query_result->changeUrlParams('ur.com', 'filter', $key)?>"><?= $value ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($alat_musik as $key => $value) { 
                        $diskon = ($value['harga_dasar']-$value['harga_final'])/$value['harga_dasar']*100;
                        ?>
                        <div class="col-md-4 my-4">
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="spacer"></div>
                        <?php
                            echo \yii\bootstrap4\LinkPager::widget([
                                'pagination' => $pages,
                                'listOptions' => ['class' => ['pagination', 'justify-content-center']]
                            ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
</script>
<?php $this->registerJs("
    function showDropdown() {
        $('.filter-dropdown').toggle()
    }
    $(document).mouseup(e => {
        $('.filter-dropdown').hide()
    });
", \yii\web\View::POS_END) ?>
