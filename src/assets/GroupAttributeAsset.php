<?php
namespace nullref\eav\assets;
use yii\web\AssetBundle;

class GroupAttributeAsset extends AssetBundle
{
    public $sourcePath = '@nullref/eav/assets';
    public $css = [
        'css/group-attribute.css',
    ];
    public $js = [
    ];
    public $depends = [
        'nullref\core\assets\ToolsAsset',
    ];
}