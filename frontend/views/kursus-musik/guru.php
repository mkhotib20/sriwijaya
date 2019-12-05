<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use frontend\components\BreadcrumbsHelper;
$this->title = $data->nama.' - Kursus Musik serta Jual beli Alat Musik Jogjakarta dan sekitarnya';

$this->params['breadcrumbs'][] = ['label' => 'Kursus Musik', 'url' => ['/kursus-musik']];
$this->params['breadcrumbs'][] = ['label' => 'Guru Kursus', 'url' => ['/kursus-musik/guru']];
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
            <div class="col-md-5">
                <div style="height:350px; background: url('<?= \common\helper\ImageHelpers::getImageUrl(($data->img!=null) ? 'guru/'.$data->img : null) ?>') center center no-repeat; background-size: cover">
                </div>
            </div>
            <div class="col-md-7">
            <div class="spacer"></div>
                <h4><?=$data->nama?></h4>
                <b><p><?=$data->mengajar_kursus?></p></b>
                <div class="spacer"></div>
                <p>Umur : <b><span class="text-muted"><?=$data->usia?></span></b></p>
            </div>
            <div class="col-md-12">
            
            <div class="spacer"></div>
                <div class="row">
                    <div class="col-md-3 p-4">
                        <div class="jadwal-box text-white">
                            <p>Kursus Musik</p>
                            <h4 class="">Jadwal Guru</h4>
                            <p class="bg-white text-violet py-1 px-3 rounded-pill"><?= $data->nama ?></p>
                            <div class="day-container">
                                <p onclick="showDropdown()" class="bg-white text-violet py-1 px-3 rt rb mt-2 day"><?=$selectedDay?> <span class="float-right"><i class="fe-calendar "></i></span></p>
                                <div class="day-dropdown">
                                    <ul class="text-left">
                                        <?php foreach($days as $key => $day){ ?>
                                            <li class="fd-item"><a href="<?= $query_result->changeUrlParams('ur.com', 'day', $day['id'])?>"><?= $day['name'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="spacer"></div>
                            <?php foreach($jadwal as $key => $value){ ?>
                                <span class="badge badge-pill badge-light"><?= $value['namaJam'] ?></span>
                            <?php } ?>
                            <?php
                                if (count($jadwal)==0) {
                                    echo '<span class="badge badge-pill badge-light">No data</span>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-9 p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Tentang Guru</h4>
                                <p>
                                    <?= $data->deskripsi ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h4>Pengalaman</h4>
                                <?php foreach($penghargaan as $key => $value){ ?>
                                <div class="accordion">
                                    <div class="ac-header">
                                        <p> <span class="fe-<?= ($key==0) ? 'minus':'plus'?>"></span> <?= $value->nama ?></p>
                                    </div>
                                    <div class="ac-content <?= ($key==0) ? 'show' : '' ?>">
                                    <p><?=$value['deskripsi'] ?></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->registerJs("
    $('.ac-header').click(function(){
        $(document).find('.show').removeClass('show')
        $(this).siblings('.ac-content').toggleClass('show')
        findall($(this))
    })
    function findall(el) {
        var elem = $(document).find('.ac-content')
        elem.siblings('.ac-header').find('span').addClass('fe-plus')
        elem.siblings('.ac-header').find('span').removeClass('fe-minus')
        el.find('span').removeClass('fe-plus')
        el.find('span').addClass('fe-minus')
    }
", \yii\web\View::POS_END) ?>
<?php $this->registerJs("
    function showDropdown() {
        $('.day-dropdown').toggle()
        $('.day').removeClass('rb')
    }
    $(document).mouseup(e => {
        $('.day-dropdown').hide()
        $('.day').addClass('rb')
    });
", \yii\web\View::POS_END) ?>