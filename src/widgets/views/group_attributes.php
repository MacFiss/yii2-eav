<?php
use yii\helpers\Html;
use nullref\eav\assets\GroupAttributeAsset;
use wbraganca\dynamicform\DynamicFormWidget;

GroupAttributeAsset::register($this);
?>
<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.group-attributes', // required: css class selector
    'widgetItem' => '.attribute', // required: css class
    'limit' => 4, // the maximum times, an element can be cloned (default 999)
    'min' => 0, // 0 or 1 (default 1)
    'insertButton' => '[data-attribute-group-add]', // css class
    'deleteButton' => '[data-attribute-group-remove]', // css class
    'model' => $models[0],
    'formId' => 'dynamic-form',
    'formFields' => array_keys($fields[0]),
]); ?>
<div class="group-attributes">
    <?php foreach ($models as $groupId => $model): ?>
        <div class="attribute">
            <?php if(array_key_exists($groupId, $fields)): ?>
                <div class="row">
                    <?php foreach ($fields[$groupId] as $field): ?>
                        <div class="<?= $itemWrapClass ?>">
                            <?= $field ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="buttons">
                <?php if(!$model->isNewRecord): ?>
                    <?= Html::activeHiddenInput($model, "[{$groupId}]id") ?>
                <?php endif; ?>
                <?= Html::button(Yii::t('yii', 'Delete'), [
                    'class' => 'btn btn-block btn-danger remove-item',
                    'data-attribute-group-remove' => true
                ]) ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php DynamicFormWidget::end(); ?>
