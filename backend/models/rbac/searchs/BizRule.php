<?php

namespace backend\models\rbac\searchs;

use Yii;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use backend\components\rbac\RouteRule;
use backend\components\rbac\Configs;
use backend\models\rbac\BizRule as MBizRule;

class BizRule extends Model
{
    public $name;

    public function rules()
    {
        return [
            [['name'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
        ];
    }

    public function search($params)
    {
        $authManager = Configs::authManager();
        $models = [];
        $included = !($this->load($params) && $this->validate() && trim($this->name) !== '');
        foreach ($authManager->getRules() as $name => $item) {
            if ($name != RouteRule::RULE_NAME && ($included || stripos($item->name, $this->name) !== false)) {
                $models[$name] = new MBizRule($item);
            }
        }

        return new ArrayDataProvider([
            'allModels' => $models,
        ]);
    }
}
