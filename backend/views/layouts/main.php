<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstra4\NavBar;
use yii\helpers\Url;
use backend\components\Helpers;

use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\components\rbac\MenuHelper;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="wrapper">

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- LOGO -->
        <a href="index.html" class="logo text-center mb-4">
            <span class="logo-lg">
                <img src="<?=Url::base();?>/img/icon.jpg" alt="" height="100">
            </span>
            <span class="logo-sm">
                <img src="<?=Url::base();?>/img/icon.png" alt="" height="34">
            </span>
        </a>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <!-- <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>
                <li>
                    <a href="index.html">
                        <i class="fe-airplay"></i>
                        <span class="badge badge-success float-right">08</span>
                        <span> Dashboard </span>
                    </a>
                </li>
            </ul> -->
            <?php
                    $callback = function($menu)
                    {
                        $data = json_decode($menu['data'], true);
                        $icon = isset($data['icon']) ? $data['icon'] : '';
                        $hide = !(isset($data['hide']) ? ($data['hide'] == 1 ? true : false) : false);
                        $accordion = !empty($menu['children']) ? '<span class="menu-arrow"></span>' : '';
                        $ret = [
                            'label' => $menu['name'],
                            'visible' => $hide,
                            'url' => $menu['route'] == null ? '#' : [$menu['route']],
                            'items' => $menu['children'],
                            'options' => $menu['route'] == null ? ['class' => 'has-sub nav-item'] : ['class' => ''],
                            'template' => '<a href="{url}"><i class="' . $icon . '"></i>' . $accordion . ' <span>{label}</span></a>',
                        ];
                        return $ret;
                    };
                        $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
                        $nav_title = '<li class="menu-title">Navigation</li>';
                        $me = Menu::widget([
                            'options' => ['class' => 'metismenu', 'id' => 'side-menu'],
                            // 'activateParents' => true,
                            'submenuTemplate' => "\n<ul class='nav-second-level'>\n{items}\n</ul>\n",
                            'items' => $items
                        ]);
                ?>
            
            <?= $me ?>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Topbar Start -->
        <div class="navbar-custom" style="min-height: 80px">
            <ul class="list-unstyled topbar-right-menu float-right mb-0">

               

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?=Url::base();?>/simulor/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                        <small class="pro-user-name ml-1">
                            <?= Yii::$app->user->identity->username ?>
                        </small>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <a href="<?=Url::base()?>/user/change-password" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>Change Password</span>
                        </a>


                        <div class="dropdown-divider"></div>
                        <?php 
                            if (!Yii::$app->user->isGuest) {
                                echo Html::beginForm(['/site/logout'], 'post')
                                . Html::submitButton(
                                    ' <i class="fe-log-out"></i><span>Logout</span>',
                                    ['class' => 'dropdown-item notify-item', 'style' => 'width: 100%; cursor:pointer']
                                ). Html::endForm(); 
                            }
                            ?>

                    </div>
                </li>

            </ul>
            <button class="button-menu-mobile open-left disable-btn">
                <i class="fe-menu"></i>
            </button>
        </div>
        <!-- end Topbar -->

        <!-- Start Content-->
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <?= Breadcrumbs::widget([
                                    'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>\n", // template for all links
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                    'activeItemTemplate' => "<li class='breadcrumb-item active'>{link}</li>\n",
                                ]); ?>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= Html::encode($this->title) ?></h4>
                    </div>
                </div>
            </div>     

            <?= $content ?>
            <!-- end row -->
        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    Simulor Admin &copy; 2018 - Coderthemes.com
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="#">About Us</a>
                        <a href="#">Help</a>
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>



</div>
<?php $this->endBody() ?>
</body>
</html>
<script>
    var url = 'http://admin.sriwijaya.io/'
    $(document).ready(function(){
        $('.metismenu').prepend('<li class="menu-title">Navigation</li>')
        $('.dropify').dropify();
        $("body").on("submit", "form", function() {
            $(this).submit(function() {
                return false;
            });
            return true;
        });
        $('#select_warna').click(() => {
            $('#form_warna').submit()
        })

    })
    function updateData(e, id, wm_am) {
        stock = $('#stock_'+id).val()
        data = {
            stock: stock,
            wm_am: wm_am
        }
        var newUrl = url+'wm/update'+'?id='+id
        $.ajax({
            type: "POST",
            url: newUrl,
            data: data,
            success: (resp) => {
                var data = JSON.parse(resp)
                if (data.code=='200') {
                    $('#stock_'+id).val(stock)
                    alert('Ganti data berhasil')
                }
                else{
                    alert('Ganti data gagal')
                }
            }
        });
    }
    function deleteData(id) {
        var hapus = confirm("Yakin ingin menghapus?")
        if (hapus) {
            var newUrl = url+'wm/delete'+'?id='+id
                $.ajax({
                    type: "POST",
                    url: newUrl,
                    success: (resp) => {
                        var data = JSON.parse(resp)
                        if (data.code=='200') {
                            $('#row_'+id).remove()
                            iziToast.success({
                                title: 'Sukses',
                                message: 'Berhasil menghapus',
                                position:	'topRight'
                            });
                        }
                        else{
                            iziToast.error({
                                title: 'gagal',
                                message: 'gagal menghapus',
                                position:	'topRight'
                            });
                        }
                    }
                });
        }
    }
    function delPenghargaan(id) {
        var hapus = confirm("Yakin ingin menghapus?")
        if (hapus) {
            var newUrl = url+'penghargaan/delete'+'?id='+id
                    $.ajax({
                        type: "POST",
                        url: newUrl,
                        success: (resp) => {
                            var data = JSON.parse(resp)
                            if (data.code=='200') {
                                $('#row_'+id).remove()
                                iziToast.success({
                                    title: 'Sukses',
                                    message: 'Berhasil menghapus',
                                    position:	'topRight'
                                });
                            }
                            else{
                                iziToast.error({
                                    title: 'gagal',
                                    message: 'gagal menghapus',
                                    position:	'topRight'
                                });
                            }
                        }
                    });
        }
    }
    function delPenghargaan(id) {
        var hapus = confirm("Yakin ingin menghapus?")
        if (hapus) {
            var newUrl = url+'jadwal-guru/delete'+'?id='+id
                    $.ajax({
                        type: "POST",
                        url: newUrl,
                        success: (resp) => {
                            var data = JSON.parse(resp)
                            if (data.code=='200') {
                                $('#row_'+id).remove()
                                iziToast.success({
                                    title: 'Sukses',
                                    message: 'Berhasil menghapus',
                                    position:	'topRight'
                                });
                            }
                            else{
                                iziToast.error({
                                    title: 'gagal',
                                    message: 'gagal menghapus',
                                    position:	'topRight'
                                });
                            }
                        }
                    });
        }
    }
</script>
 <?php
    if (Yii::$app->session->hasFlash('success')) {
        echo Helpers::alert('success');
    }
    if (Yii::$app->session->hasFlash('error')) {
        echo Helpers::alert('error');
    }
?>

<?php $this->endPage() ?>
