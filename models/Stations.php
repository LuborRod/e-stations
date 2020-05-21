<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "e_stations".
 *
 * @property int $id
 * @property string $address
 * @property string $city
 * @property string $opening_time
 * @property string $closing_time
 */
class Stations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city', 'opening_time','closing_time','address'], 'required'],
            [['city','address'], 'string', 'max' => 255],
            [['opening_time', 'closing_time'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'city' => 'City',
            'opening_time' => 'Opening Time',
            'closing_time' => 'Closing Time',
        ];
    }
}
