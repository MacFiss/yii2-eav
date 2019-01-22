<?php

namespace nullref\eav\widgets;

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
    public $fields = [];

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

        $data = array_merge(
            $this->fields,
            $model->eav->getAttributesConfig()
        );

        foreach ($data as $attribute => $config) {
            $widget = new \nullref\eav\widgets\Attribute([
                'config' => $config,
                'field' => $this->form->field($model, "[{$groupId}]{$attribute}"),
            ]);

            $fields[$attribute] = $widget->run();
        }

        return $fields;
    }
}