<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2017 NRE
 */


namespace nullref\eav\models\value;


use nullref\eav\models\Value;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%eav_entity_value_int}}".
 *
 * @property int $id
 * @property int $attribute_id
 * @property int $entity_id
 * @property mixed $value
 */
class StringValue extends Value
{
    public static function tableName()
    {
        return '{{%eav_entity_value_string}}';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['value', 'string'],
        ]);
    }


    /**
     * @param ActiveQuery $query
     * @param string|bool $table
     */
    public function addWhere($query, $table = false)
    {
        $table = $table ? $table : self::JOIN_TABLE_PREFIX . $this->attributeModel->name;
        $query->andWhere(['like', "$table.value", $this->value]);
    }
}