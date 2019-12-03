<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
$data = [
    ['key' => 'home_2', 'content' => 'Tentang Kami'],
];


$this->title = 'Tentang Kami - Kursus Musik serta Jual beli Alat Musik Jogjakarta dan sekitarnya';
?>


<header>
    <div class="produk-header" style="background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.3)), url(<?=Url::base();?>/img/piano.jpg) center no-repeat; background-size: cover; background-attachment: fixed">  
        <div class="container">
        <div class="row">
            <div class="col-md-12 parent-ver">
                <div class="ch-ver">
                    <h1 class="ch-title text-center editable">Tentang Kami</h1>
                </div>
            </div>
        </div>
        </div>
    </div>
</header>
<section class="content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-md-6 my-3">
                        <div class="founder-img">
                            <img src="<?=Url::base()?>/img/icon.png" alt="">
                            <div class="fi-ava" style="background: url('<?= \common\helper\ImageHelpers::getImageUrl('guru/img.jpg') ?>') center center no-repeat; background-size: cover"></div>
                        </div>
                    </div>
                    <div class="col-md-6 my-3">
                        <div class="content-header">
                            <h3 class="editable">SRIWIJAYA ADALAH SALAH SATU DISTRIBUTOR TERBAIK DI YOGYAKARTA</h3>
                        </div>
                        <div class="content-caption">
                            <p class="editable">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor earum error eos possimus vitae facere dolore consequatur doloribus repellendus alias omnis temporibus, illum eligendi incidunt deleniti rem hic cum ex. Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eveniet voluptates animi unde alias distinctio numquam aut sunt dolorum hic nostrum saepe ea, minima mollitia inventore. Voluptate similique dolore illum?</p>
                                <b>
                                    <p class="editable">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos a nostrum sit vel distinctio dolor inventore deserunt magni laudantium architecto iusto, sint soluta autem maxime optio nemo. Error, reprehenderit numquam?"</p>

                                </b>
                            <div class="spacer"></div>
                            <div class="fi-name float-right">
                                <h4 class="editable"><span class="line line-cell black"></span>Muhammad khotib </h4>
                                <h6 class="editable "><span class="line line-cell"></span>Founder</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content bg-gray">
<div class="container">
        <div class="row">
            <hr class="gray">
            <div class="col-md-8 offset-md-2">
                <div class="content-header text-center">
                    <h2 class="editable">Sejarah</h2>
                    <p class="editable" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eveniet voluptates animi unde alias distinctio numquam aut sunt dolorum hic nostrum saepe ea, minima mollitia inventore. Voluptate similique dolore illum?</p>
                </div>
            </div>
            <div class="col-md-10 offset-md-1">
            <div class="spacer"></div>
                <div class="timeline">
                    <div class="row no-gutters">
                        <?php foreach ($sejarah as $key => $value) {
                            if($key%2==0){
                            ?>
                        <div class="col-md-6">
                            <div class="t-item ti-left">
                                <div class="ti-icon bg-violet text-center">
                                    <h4 ><?= date('Y', strtotime($value['tanggal'])) ?></h4>
                                    <div class="ti-line bg-violet "></div>
                                </div>
                                <div class="til-box">
                                    <div class="box-layanan static">
                                        <div class="imgxicon">
                                            <img class="bl-img" src="<?=\common\helper\ImageHelpers::getImageUrl('sejarah/'.$value['img']);?>" alt="">
                                            <div class="iconion">
                                                <div class="bl-icon bli-lg ml-auto mr-auto"><?= date('d', strtotime($value['tanggal'])) ?> <br> <?= date('M', strtotime($value['tanggal'])) ?></div>
                                            </div>
                                        </div>
                                        <div class="bl-caption p-3 text-center">
                                            <h5><?= $value['judul'] ?></h5>
                                            <p class="editable blc-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi atque fugit reprehenderit est porro. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }else { ?>
                        <div class="col-md-6">
                            <div class="t-item ti-right">
                                <div class="ti-icon bg-violet text-center">
                                <h4 ><?= date('Y', strtotime($value['tanggal'])) ?></h4>
                                    <div class="ti-line bg-violet "></div>
                                </div>
                                <div class="tir-box">
                                    <div class="box-layanan static">
                                        <div class="imgxicon">
                                            <img class="bl-img" src="<?=\common\helper\ImageHelpers::getImageUrl('sejarah/'.$value['img']);?>" alt="">
                                            <div class="iconion">
                                            <div class="bl-icon bli-lg ml-auto mr-auto"><?= date('d', strtotime($value['tanggal'])) ?> <br> <?= date('M', strtotime($value['tanggal'])) ?></div>
                                            </div>
                                        </div>
                                        <div class="bl-caption p-3 text-center">
                                            <h5><?= $value['judul'] ?></h5>
                                            <p class="editable blc-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi atque fugit reprehenderit est porro. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content bg-img">
    <div class="container">
        <div class="box-our bg-white">
            <div class="row">
                <div class="col-md-7">
                    <div class="fi-name">
                        <p class="editable"><span class="line line-sm line-cell black"></span>Perjalanan kami </p>
                    </div>
                    <div class="content-header">
                        <h3 class="editable">APA YANG SUDAH KAMI LAKUKAN</h3>
                    </div>
                    <div class="spacer"></div>
                    <div class="accordion">
                        <div class="ac-header">
                            <p> <span class="fe-minus"></span> Hahahah</p>
                        </div>
                        <div class="ac-content show">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit ea rerum, voluptatibus animi aliquid iste dicta est. Pariatur, harum velit officiis, sint earum exercitationem repudiandae adipisci rerum impedit aperiam officia.</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="ac-header">
                            <p> <span class="fe-plus"></span> Hahahah</p>
                        </div>
                        <div class="ac-content">
                            <p>Poke ipsum dolor sit amet, consectetur adipisicing elit. Suscipit ea rerum, voluptatibus animi aliquid iste dicta est. Pariatur, harum velit officiis, sint earum exercitationem repudiandae adipisci rerum impedit aperiam officia.</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="ac-header">
                            <p> <span class="fe-plus"></span> Hahahah</p>
                        </div>
                        <div class="ac-content">
                            <p>Peler dolor sit amet, consectetur adipisicing elit. Suscipit ea rerum, voluptatibus animi aliquid iste dicta est. Pariatur, harum velit officiis, sint earum exercitationem repudiandae adipisci rerum impedit aperiam officia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                <div class="spacer"></div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus eaque iure expedita architecto eligendi pariatur eveniet distinctio, quod ut voluptatum at, ratione voluptatem rem! Quas beatae libero iste eum minima!</p>
                    <iframe class="youtube-video"  src="https://www.youtube.com/embed/6MqGY0dpvrg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <script>
    
    </script>
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