<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use frontend\components\BreadcrumbsHelper;
$this->title = 'Guru Kursus - Kursus Musik serta Jual beli Alat Musik Jogjakarta dan sekitarnya';

$this->params['breadcrumbs'][] = ['label' => 'Kursus Musik', 'url' => ['/kursus-musik']];
$this->params['breadcrumbs'][] = "Guru Kursus";


?>
<header>
    <div class="produk-header" style="background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.3)), url(<?=Url::base();?>/img/piano.jpg) center no-repeat; background-size: cover; background-attachment: fixed">  
        <div class="container">
        <div class="row">
            <div class="col-md-12 parent-ver">
                <div class="ch-ver">
                    <h1 class="ch-title text-center editable">Guru Kursus</h1>
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
                        <a href="?kat=0">Semua Kursus (<?=$allMusik?>) </a>
                    </li>
                    <?php foreach($kategori as $key => $value){ ?>
                    <li class="ql-item text-black <?= ($value['isActive']) ? 'active' : '' ?>">
                        <a href="<?= $query_result->changeUrlParams('ur.com', 'kat', $value['mengajar'])?>"><?= $value['namaKat'] ?> (<?=$value['jumlahKat']?>) </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-9 ">
                <div class="row">                   
                    <?php foreach($guru as $key => $value) { ?>
                        <div class="col-md-4 my-4">
                            <div class="box-guru">
                                <a href="<?=Url::base().'/kursus-musik/guru?slug=jsad8ue2hd8sx9uiajxznj89u32qsau89jioew1qsxa890zijok&id='.$value['id']?>">
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
</section>
<?php $this->registerJs("
    function showDropdown() {
        $('.filter-dropdown').toggle()
    }
    $(document).mouseup(e => {
        $('.filter-dropdown').hide()
    });
", \yii\web\View::POS_END) ?>