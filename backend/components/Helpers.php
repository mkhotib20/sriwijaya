<?php
namespace backend\components;
class Helpers 
{
    function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public static function getImg()
    {
        $arr = \common\helper\ImageHelpers::getRandomImage($_SERVER['DOCUMENT_ROOT'],'kursus');
        return $arr[2];
    }
    public static function alert($getFlash)
    {
        if ($getFlash == 'success') {
            return "
            <script>
                iziToast.success({
                    title: 'Sukses',
                    message: '". \Yii::$app->session->getFlash($getFlash) ."',
                    position:	'topRight'
                });
            </script>
        ";
        } elseif ($getFlash == 'error') {
            // return '<div class="alert alert-icon-left alert-warning alert-dismissible mb-2" role="alert">
            //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //                     <span aria-hidden="true">×</span>
            //                 </button>
            //             ' . \Yii::$app->session->getFlash($getFlash) . '
            //         </div>';
            return "
                <script>
                    iziToast.error({
                        title: 'Gagal',
                        message: '". \Yii::$app->session->getFlash($getFlash) ."',
                        position:	'topRight'
                    });
                </script>
            ";
        }
    }
}
