<?php
namespace frontend\components;
use yii\bootstrap4\Breadcrumbs;

class BreadcrumbsHelper extends Breadcrumbs
{
    public $homeLink = [
        'label' => 'Home',
        'url' => '/',
        'template' => '<li class="breadcrumb-item"><i class="fe-arrow-left"></i> <i class="fa fa-home"></i> {link}</li>'
    ];
    
}
