<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%e_stations}}`.
 */
class m200521_035823_create_stations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stations}}', [
            'id' => $this->primaryKey(),
            'city' => $this->string(),
            'address' => $this->string(),
            'opening_time' => $this->string(5),
            'closing_time' => $this->string(5),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%stations}}');
    }
}
