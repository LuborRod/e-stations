<?php


namespace unit\models;


use app\models\Stations;
use Codeception\Test\Unit;
use yii\web\BadRequestHttpException;

class StationsTest extends Unit
{
    public function testCreating()
    {
        $station = new Stations();
        $station->city = 'Dnipro';
        $station->address = 'Gagaraina, 3';
        $station->opening_time = '08:00';
        $station->closing_time = '23:00';
        $this->assertTrue($station->save());
    }

    public function testUpdating()
    {
        $station = new Stations();

        $station->city = 'Nikopol';
        $station->address = 'Trubnikov, 3';
        $station->opening_time = '09:00';
        $station->closing_time = '23:00';
        $this->assertTrue($station->save());
        $this->assertEquals('Nikopol',$station->city);
    }

//    public function testDeleting()
//    {
//        $station1 = Stations::findOne(['city' => 'Nikopol']);
//        $this->assertNotNull($station1);
//        Stations::deleteAll(['city' => $station1->city]);
//        $station2 = Stations::findOne(['city' => 'Nikopol']);
//        $this->assertNull($station2);
//    }



}