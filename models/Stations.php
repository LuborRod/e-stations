<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "stations".
 *
 * @property int $id
 * @property string $city
 * @property string $address
 * @property string $opening_time
 * @property string $closing_time
 * @property boolean $24h
 */
class Stations extends ActiveRecord
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
            [['city', 'opening_time', 'closing_time', 'address'], 'required'],
            [['address'], 'unique'],
            [['24h'], 'boolean'],
            [['opening_time', 'closing_time'], 'date', 'format' => 'HH:mm'],
            [['city', 'address'], 'string', 'max' => 255],
            [['opening_time'], 'validateTime'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'address' => 'Address',
            'opening_time' => 'Opening Time',
            'closing_time' => 'Closing Time',
            '24h' => '24H',
        ];
    }

    /**
     * Custom validator for time format
     */
    public function validateTime()
    {
        if ($this->opening_time > $this->closing_time) {
            $this->addError('opening_time', 'Please give correct opening and closing time');
        }
    }


    /**
     * @param $city
     * @return array|ActiveRecord[]
     */
    public static function getStationsByCity($city)
    {
        return self::find()->where(['city' => $city])->all();
    }


    /**
     * @param $city
     * @return array|ActiveRecord[]
     */
    public static function getStationsByCityWhichCurrentlyOpen($city)
    {
        $now = date("H:i");

        return self::find()
            ->where(['<','opening_time', $now])
            ->andWhere(['>','closing_time', $now])
            ->orWhere(['24h' => true])
            ->andWhere(['city' => $city])
            ->all();
    }

}







