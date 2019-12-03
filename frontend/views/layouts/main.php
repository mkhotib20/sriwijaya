<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use common\helper\ImageHelpers;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
$menus = [
    ['url' => '/', 'label' => 'Home'],
    ['url' => '/alat-musik', 'label' => 'Produk/Alat'],
    ['url' => '/kursus-musik', 'label' => 'Kursus Musik'],
    ['url' => '/tentang-kami', 'label' => 'Tentang Kami'],
];
$uri_parts = explode('?', $_SERVER['REQUEST_URI']);

$uri_parts = explode('/', $uri_parts[0]);
$uri_parts = '/'.$uri_parts[1];

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
</head>
<body>
<?php $this->beginBody() ?>

    <div class="fixed-top">
    <div class="top-social">
        <ul class="ts-item float-right">
            <li><a href=""><i class="fa fa-instagram"></i></a></li>
            <li><a href=""><i class="fa  fa-facebook"></i></a></li>
            <li><a href=""><i class="fa fa-phone"></i> +62 8989 xxxxzz <?=$uri_parts?> </a></li>
        </ul>
    </div>      
    <nav class="navbar navbar-expand-xl navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="<?=Url::base();?>/img/icon.jpg" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <?php foreach($menus as $key => $value) { ?>
                        <li class="nav-item <?= $uri_parts == $value['url'] ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= $value['url'] ?>"><span class=""><?= $value['label'] ?></span> </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <?=$content?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5 my-2">
                    <img class="footer-icon" src="<?=Url::base();?>/img/icon.jpg" alt="">
                    <p class="editable">Lorem ipsum dolor sit amet consectetur, suscipit, temporibus neque voluptates repellat autem quo minima nam pariatur in accusamus sint.</p>
                    <p class="editable">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor quibusdam modi delectus  </p>
                </div>
                <div class="col-md-4 pt-md-5">
                    <h5>Kontak dan alamat</h5>
                    <br>
                    <p class="editable">Jl. Kaliurang Nomor 20 Kentungan <br> Sleman, Daerah Istimewa Yogyakarta</p>
                    <hr class="gray">
                    <p class="editable">+62329xxxxxx</p>
                </div>
                <div class="col-md-3 pt-md-5">
                    <h5>Quick Links</h5>
                    <br>
                    <ul class="quick-link">
                        <?php foreach($menus as $key => $value) { ?>
                            <li class="ql-item ">
                                <a href="<?= $value['url'] ?>"><span class=""><?= $value['label'] ?></span> </a>
                            </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
<?php $this->endBody() ?>
</body>

</html>
<script>
    // $('.editable').attr('contenteditable', 'true')
    // $('.editable').focus(function(){
    //     var thisId = $(this).attr('id')
    //     createButton($(this), thisId)
    // })
    // $('.editable').blur(function(){
    //     var thisId = $(this).attr('id')
    //     $('#btn-save').remove()
    // })
    // function createButton(parent, id) {
    //     var btn = '<a onclick="save(\''+id+'\')" data-send="'+id+'" id="btn-save" class="btn btn-save" href="" style="position: absolute; right: 0"><i  class="fe-save"></i></a>'
    //     parent.append(btn)
    //     console.log(id);
    // }
    // function save(id) {
    //     var newText = $('#'+id).text()
    //     console.log(newText);
        
    // }
</script>
<?php $this->endPage() ?>