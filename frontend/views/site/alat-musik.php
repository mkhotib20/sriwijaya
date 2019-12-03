<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Alat Musik';
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
                    <h1 class="ch-title text-center editable"><?= $this->title ?></h1>
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
                <h5>Kategori Produk</h5>
                <div class="unline"></div>
                <div class="spacer"></div>
                <ul class="quick-link">
                    <li class="ql-item text-black <?= ($selectedKat==0) ? 'active' : '' ?>">
                        <a href="?kat=0">Semua Kategori (<?=$allMusik?>) </a>
                    </li>
                    <?php foreach($kategori as $key => $value){ ?>
                    <li class="ql-item text-black <?= ($value['isActive']) ? 'active' : '' ?>">
                        <a href="?kat=<?=$value['kategori']?>"><?= $value['namaKat'] ?> (<?=$value['jumlahKat']?>) </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-8">
                        <p>Menampilkan <?= $countAll ?> produk dari kategori <?= ($selectedKat!=0) ? \backend\models\AmKategori::find()->where(['id' => $selectedKat])->one()->name : 'Semua kategori'?></p>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($alat_musik as $key => $value) { ?>
                    <div class="col-md-4 my-3">
                        <div class="box-layanan static">
                            <div class="imgxicon static-img">
                                <img class="bl-img static-img" src="<?=\common\helper\ImageHelpers::getImageUrl('alat-musik/'.$value['img']);?>" alt="">
                                <div class="iconion">
                                    <div class="bl-icon ml-auto mr-auto"><span class="fe-shopping-bag"></span><a href=""></a></div>
                                </div>
                            </div>
                            <div class="bl-caption p-3 text-center">
                                <h5><?= $value['nama'] ?></h5>
                                <p class="editable blc-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique nobis  </p>
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

<?php $this->registerJs("

", \yii\web\View::POS_END) ?>
