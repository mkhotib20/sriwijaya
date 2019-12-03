<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use \frontend\components\Icons;

$this->title = 'Sriwijaya - Kursus Musik serta Jual beli Alat Musik Jogjakarta dan sekitarnya';
$data = [
    ['key' => 'home_1', 'content' => 'Jadilah musisi terbaik'],
    ['key' => 'home_2', 'content' => 'Indonesia'],
];
?>
<header>
    <div class="carousel-caption">
        <div class="row">
            <div class="col-md-12 parent-ver">
                <div class="child-ver">
                    <h3 id="<?= $data[0]['key'] ?>" class="slogan text-center editable" data-id="haha"><?= $data[0]['content'] ?> </h3> 
                    <h1 id="<?= $data[1]['key'] ?>" class="main-title text-center editable" data-id="haha"><?= $data[1]['content'] ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol> -->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.3)), url(<?=Url::base();?>/img/piano.jpg) center no-repeat; background-size: cover;">  
            </div>
            <div class="carousel-item" style="background:linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.3)), url(<?=Url::base();?>/img/mik.jpg) center no-repeat; background-size: cover;">
            </div>
            <div class="carousel-item" style="background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.3)), url(<?=Url::base();?>/theme/img/player.png) center no-repeat; background-size: cover;">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
<section class="content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="content-header text-center">
                    <h2>Layanan Kami</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eveniet voluptates animi unde alias distinctio numquam aut sunt dolorum hic nostrum saepe ea, minima mollitia inventore. Voluptate similique dolore illum?</p>
                </div>
            </div>
            <div class="col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-md-6 my-3">
                        <div class="box-layanan">
                            <div class="imgxicon">
                                <img class="bl-img" src="<?=Url::base();?>/img/mik.jpg" alt="">
                                <div class="iconion">
                                    <div class="bl-icon ml-auto mr-auto"><span class="fe-shopping-bag"></span><a href=""></a></div>
                                </div>
                            </div>
                            <div class="bl-caption p-3 text-center">
                                <h5>Alat Musik</h5>
                                <p class="editable blc-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi atque fugit reprehenderit est porro. </p>
                                <a href="#">Selengkapnya <i class="fe-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 my-3">
                        <div class="box-layanan">
                            <div class="imgxicon">
                                <img class="bl-img" src="<?=Url::base();?>/img/piano.jpg" alt="">
                                <div class="iconion">
                                    <div class="bl-icon ml-auto mr-auto"><span class="fa fa-pencil-square-o"></span><a href=""></a></div>
                                </div>
                            </div>
                            <div class="bl-caption p-3 text-center">
                                <h5>Kursus</h5>
                                <p class="editable blc-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi atque fugit reprehenderit est porro. </p>
                                <a href="#">Selengkapnya <i class="fe-chevrons-right"></i></a>
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
            <div class="col-md-7 my-5 pr-5">
                <div class="content-header">
                    <h3 class="editable">Kenapa Memilih kami ?</h3>
                    <p class="editable">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eveniet voluptates animi unde alias distinctio numquam aut sunt dolorum hic nostrum saepe ea, minima mollitia inventore. Voluptate similique dolore illum?</p>
                </div>
                <div class="spacer"></div>
                <button class="btn btn-style">BERGABUNG</button>
            </div>
            <div class="col-md-5 my-5 pr-5">
                <div class="wc-right">
                    <div class="row">
                        <div class="col-3">
                            <div class="svg-sm">
                                <?= Icons::get('guitar')?>
                            </div>
                        </div>
                        <div class="col-9">
                            <h5>Guru Profesional</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore facere iusto </p>
                        </div>
                        <div class="col-3">
                            <div class="svg-sm">
                                <?= Icons::get('man')?>
                            </div>
                        </div>
                        <div class="col-9">
                            <h5>Murah dan Efisien</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore facere iusto </p>
                        </div>
                        <div class="col-3">
                            <div class="svg-sm">
                                <?= Icons::get('medal')?>
                            </div>
                        </div>
                        <div class="col-9">
                            <h5>Kualitas Terjamin</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore facere iusto </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content bg-white">
    <div class="container">
        <div class="row">
            <hr class="gray">
            <div class="col-md-8 offset-md-2">
                <div class="content-header text-center">
                    <h2>Alat Musik</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eveniet voluptates animi unde alias distinctio numquam aut sunt dolorum hic nostrum saepe ea, minima mollitia inventore. Voluptate similique dolore illum?</p>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="row">
                    <div id="alat-musik" class="owl-carousel owl-theme">
                        <?php foreach($kategori as $key => $value) { ?>
                        <div class="col-md-12 my-3">
                            <div class="box-layanan">
                                <a href="/alat-musik?kat=<?=$value['kategori']?>">
                                <div class="imgxicon">
                                <div class="bg-header" style="background: url('<?= \common\helper\ImageHelpers::getImageUrl(($value['img']!=null) ? 'alat-musik/'.$value['img'] : null) ?>') center center no-repeat; background-size: cover"></div>
                                    <div class="iconion">
                                        <div class="bl-icon ml-auto mr-auto"><span class="fe-shopping-bag"></span></div>
                                    </div>
                                </div>
                                <div class="bl-caption p-3 text-center">
                                    <h5><?= $value['name'] ?></h5>
                                    <!-- <p class="editable blc-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique nobis  </p> -->
                                    
                                <a href="/alat-musik?kat=<?=$value['kategori']?>">Selengkapnya <i class="fe-chevrons-right"></i></a>
                                </div>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
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
                    <h2 class="editable">Kursus Musik</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eveniet voluptates animi unde alias distinctio numquam aut sunt dolorum hic nostrum saepe ea, minima mollitia inventore. Voluptate similique dolore illum?</p>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="row">       
                    <div id="kursus" class="owl-carousel  owl-theme">                 
                        <?php foreach($katKursus as $key => $value) { ?>
                            <div class="col-md-12 my-3 text-center">
                                <a class="kur-kat" href="/kursus-musik?kat=<?=$value['id']?>">
                                    <div class="svg-sm">
                                        <?= Icons::get('medal')?>
                                    </div>
                                    <p> <?= $value['nama'] ?></p>
                                </a>
                            </div>
                        <?php } ?>
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
            <a class="text-btn" href="<?=Url::base()?>/kursus-musik/guru">Selengkapnya <i class="fe-chevrons-right"></i></a>
            </div>
            <div class="col-md-12 ">
                <div class="row">                   
                    <?php foreach($guru as $key => $value) { ?>
                        <div class="col-md-3 my-4">
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
    </div>
</section>
<section class="content bg-img text-white ">
    <div class="container mt-md-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="content-header text-center">
                    <h2 class="editable">Siapkan dirimu untuk perubahan</h2>
                    <p>nostrum saepe ea, minima mollitia inventore. Voluptate similique dolore illum?</p>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <div class="spacer"></div>
                <button class="btn btn-style bg-white">HUBUNGI KAMI</button>
            </div>
        </div>
    </div>
</section>
<section class="content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="content-header text-center">
                    <h2 class="editable">Beri kami ulasan</h2>
                    <p>nostrum saepe ea, minima mollitia inventore. Voluptate similique dolore illum?</p>
                </div>
            </div>
            <div class="col-md-10 offset-md-1 text-center">
                <form action="">
                    <div class="form__group">
                        <input type="text" class="form__field" name="nama" placeholder="nama">
                        <label for="" class="form__label">Nama</label>
                    </div>
                    <div class="form__group">
                        <input type="email" class="form__field" name="email" placeholder="nama">
                        <label for="" class="form__label">Email</label>
                    </div>
                    <div class="form__group">
                        <textarea name="pesan" id="" cols="30" rows="5" placeholder="Pesan" class="form__field"></textarea>
                        <label for="" class="form__label">Pesan</label>
                    </div>
                    <br>
                    <div class="forom__group">
                        <button class="btn btn-style" type="submit">KIRIM</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $this->registerJs("
    
    $('#kursus').owlCarousel({
        loop:true,
        dots: true,
        responsiveClass:true,
        dotsEach: true,
        nav:true,
        navText: ['<i class=\"fe-arrow-left oc-btn \"></i>','<i class=\"fe-arrow-right oc-btn \"></i>'],
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:4,
            }
        }
    })
    $('#alat-musik').owlCarousel({
        loop:true,
        dots: true,
        responsiveClass:true,
        dotsEach: true,
        nav:true,
        navText: ['<i class=\"fe-arrow-left oc-btn \"></i>','<i class=\"fe-arrow-right oc-btn \"></i>'],
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:4,
            }
        }
    })
", \yii\web\View::POS_END) ?>
