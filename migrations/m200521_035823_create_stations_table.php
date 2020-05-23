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
            'address' => $this->string()->notNull()->unique(),
            'opening_time' => $this->time(),
            'closing_time' => $this->time(),
            'all_hours' => $this->boolean()->notNull()->defaultValue(false),
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
