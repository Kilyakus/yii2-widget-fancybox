<?php
namespace kilyakus\widget\fancybox;

use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Json;

class Fancybox extends Widget
{
    public $options = [
        'buttons' => [ 
            "zoom",
            //"share",
            "slideShow",
            "fullScreen",
            "download",
            "thumbs",
            "close"
          ],
    ];
    public $selector;

    public $group = 'images';

    public function init()
    {
        parent::init();

        if (empty($this->selector)) {
            throw new InvalidConfigException('Required `selector` param isn\'t set.');
        }
    }

    public function run()
    {
        $clientOptions = (count($this->options)) ? Json::encode($this->options) : '';

        $view = $this->view;
        $view->registerAssetBundle(FancyboxAsset::className());
        $view->registerJs('var selector = $("'.$this->selector.'");for(var i=0;i<selector.length;i++){$(selector[i]).attr("data-fancybox","'.$this->group.'");}selector.fancybox('.$clientOptions.');',$view::POS_READY,$this->group);
    }
}