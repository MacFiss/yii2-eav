<?php

namespace modules\recipe\widgets;

use yii\base\Widget;

class GroupAttributes extends Widget
{
    /**
     * @var Model the data model that this widget is associated with.
     */
    public $model;

    /** @var ActiveForm */
    public $form;

    /** @var Array */
    public $defaultFields = [];

    /** @var String */
    public $template = 'group_attributes';

    /** @var string  */
    public $itemWrapClass = 'col-md-4';

    public function run()
    {
        $models = is_array($this->model) ? $this->model : [$this->model];
        $fields = [];

        foreach ($models as $groupId => $model) {
            $fields[$groupId] = $this->getFields($model, $groupId);
        }

        return $this->render($this->template, [
            'itemWrapClass' => $this->itemWrapClass,
            'fields' => $fields,
            'models' => $models,
            'form' => $this->form,
        ]);
    }

    private function getFields($model, $groupId)
    {
        $fields = [];

        foreach ($model->eav->getAttributesConfig() as $attribute => $config) {
            $widget = new \nullref\eav\widgets\Attribute([
                'config' => $config,
                'field' => $this->form->field($model, "[{$groupId}]{$attribute}"),
            ]);
            $fields[] = $widget->run();
        }

        return $fields;
    }
}