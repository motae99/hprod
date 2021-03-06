<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ambulance".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $rate
 * @property string $working_hourse
 */
class Ads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adspanner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'img'], 'required'],
            [['data', 'img'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'data' => Yii::t('app', 'data'),
            'img' => Yii::t('app', 'img'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return AdsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdsQuery(get_called_class());
    }
}
