<?php

namespace backend\models;

use Yii;
use backend\models\Guru;
use backend\models\AlatMusik;
use backend\models\KursusMusik;
/**
 * This is the model class for table "kunjungan".
 *
 * @property int $id
 * @property string $ip
 * @property string $time
 * @property int $quarter
 * @property string $produk
 */
class Kunjungan extends \backend\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kunjungan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip', 'quarter', 'produk'], 'required'],
            [['time'], 'safe'],
            [['quarter'], 'integer'],
            [['ip'], 'string', 'max' => 50],
            [['produk'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'time' => 'Time',
            'quarter' => 'Quarter',
            'produk' => 'Produk',
        ];
    }
    public function getTopProduct($type=null, $range=10)
    {
        if ($type==null) {
            return false;
        }
        $arr = [];
        $data = Kunjungan::find()->select(['*', 'count(ip) as hitungan'])->groupBy('produk')->orderBy('hitungan DESC')->asArray()->all();
        // return $data;
        foreach ($data as $key => $value) {
            $ser = self::serialize($value['produk'], $value['hitungan']);
            if ($ser) {
                if ($ser['produk'] == $type) {
                    $arr[] = $ser;
                }
            }
        }
        switch ($type) {
            case 'alat-musik':
                $produk = AlatMusik::find()->asArray()->all();
                break;
            case 'kursus-musik':
                $produk = Kursus::find()->asArray()->all();
                break;
            case 'guru':
                $produk = Guru::find()->asArray()->all();
                break;
            
            default:
                # code...
                break;
        }
        $top_products=[];
        foreach ($arr as $key => $value) {
            foreach ($produk as $key2 => $value2) {
                if ($value['id'] == $value2['id']) {
                    $top_products[$key] = $value;
                    $top_products[$key]['nama'] = $value2['nama'];
                    $top_products[$key]['img'] = isset($value2['img']) ? $value2['img'] : null;
                    break;
                }
            }
        }
        
        return array_slice($top_products, 0, $range);
    }
    
    public function serialize($str, $hitungan)
    {
        $arr = explode('/', $str);
        if (!empty($arr[1])) {
            return [
                'produk' => $arr[0],
                'id' => $arr[1][0],
                'hitungan' => $hitungan
            ];
        }
        else{
            return false;
        }
    }
}
