<?php
namespace kilyakus\widget\fancybox;

class FancyboxAsset extends \yii\web\AssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';

        if (YII_DEBUG) {
            $this->js[] = 'js/jquery.fancybox.js';
            $this->css[] = 'css/jquery.fancybox.css';
        } else {
            $this->js[] = 'js/jquery.fancybox.min.js';
            $this->css[] = 'css/jquery.fancybox.min.css';
        }

        parent::init();
    }
}