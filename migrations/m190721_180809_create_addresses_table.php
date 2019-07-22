<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%addresses}}`.
 */
class m190721_180809_create_addresses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%addresses}}', [
            'id' => $this->primaryKey(),
            'zip_code' => $this->integer()->notNull(),
            'country' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'street' => $this->string()->notNull(),
            'house' => $this->integer()->notNull(),
            'office_apartment' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }
}
