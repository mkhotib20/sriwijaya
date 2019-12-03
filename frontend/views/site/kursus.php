<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Kursus Musik - Kursus Musik serta Jual beli Alat Musik Jogjakarta dan sekitarnya';
$data = [
    ['key' => 'home_1', 'content' => 'Jadilah musisi terbaik'],
    ['key' => 'home_2', 'content' => 'Indonesia'],
];
?>
<header>
    <div class="produk-header" style="background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.3)), url(<?=Url::base();?>/img/piano.jpg) center no-repeat; background-size: cover; background-attachment: fixed">  
        <div class="container">
        <div class="row">
            <div class="col-md-12 parent-ver">
                <div class="ch-ver">
                    <h1 class="ch-title text-center editable">Kursus Musik</h1>
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
                        <p>Menampilkan <?= $countAll ?> kursus dari kategori <?= ($selectedKat!=0) ? \backend\models\KursusKategori::find()->where(['id' => $selectedKat])->one()->nama : 'Semua kategori'?></p>
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
                    <?php foreach($alat_musik as $key => $value) { ?>
                    <div class="col-md-4 my-3">
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
                                <a href="#">Selengkapnya <i class="fe-chevrons-right"></i></a>
                            </div>
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
<section class="content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="content-header text-center">
                    <h2 class="editable">guru kami</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eveniet voluptates animi unde alias distinctio numquam aut sunt dolorum hic nostrum saepe ea, minima mollitia inventore. Voluptate similique dolore illum?</p>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <a class="text-btn" href="#">Selengkapnya <i class="fe-chevrons-right"></i></a>
            </div>
            <div class="col-md-12 ">
                <div class="row">                   
                    <?php foreach($guru as $key => $value) { ?>
                        <div class="col-md-3 my-4">
                            <div class="box-guru">
                                <a href="#">
                                <div class="bg-header" style="background: url('<?= \common\helper\ImageHelpers::getImageUrl(($value['img']!=null) ? 'guru/'.$value['img'] : null) ?>') center center no-repeat; background-size: cover"></div>
                                <div class="spacer"></div>
                                <div class="bg-caption text-center">
                                    <h4><?= $value['nama'] ?></h4>
                                    <p><?= $value['mengajar_kursus'] ?></p>
                                    <p> <?= $value['deskripsi'] ?></p>    
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
<?php $this->registerJs("
    function showDropdown() {
        $('.filter-dropdown').toggle()
    }
    $(document).mouseup(e => {
        $('.filter-dropdown').hide()
    });
", \yii\web\View::POS_END) ?>