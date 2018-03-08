<?php

namespace api\common\models;

class Physicain extends \api\components\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{physician}}';
    }

    public function fields()
    {
        return [
            'id',
            'name',
            'contact_no',
            'email',
        ];
    }

    public function extraFields() {
        return [
            'work' => function($model) { return $model->avail; },
            // 'outstanding' => function($model) { return $model->outstanding; }
            // 'items' => function($model) { return $model->item; }
        ];
    }

    public function getAvail()
    {
        return $this->hasMany(Availability::className(), ['physician_id' => 'id']);
         
    }

    public static function find() {
        return new PhysicainQuery(get_called_class());
    }
}

class PhysicainQuery extends \api\components\db\ActiveQuery
{
}