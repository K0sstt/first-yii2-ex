<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "addresses".
 *
 * @property int $id
 * @property int $zip_code
 * @property string $country
 * @property string $city
 * @property string $street
 * @property int $house
 * @property int $office_apartment
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addresses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zip_code', 'country', 'city', 'street', 'house'], 'required'],
            [['zip_code', 'house', 'office_apartment'], 'integer'],
            [['country'], 'string', 'max' => 2],
            [['city'], 'string', 'max' => 15],
            [['street'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zip_code' => 'Zip Code',
            'country' => 'Country',
            'city' => 'City',
            'street' => 'Street',
            'house' => 'House',
            'office_apartment' => 'Office/Apartment',
        ];
    }
}
