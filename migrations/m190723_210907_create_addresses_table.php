<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%addresses}}`.
 */
class m190723_210907_create_addresses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%addresses}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'zip_code' => $this->integer()->notNull(),
            'country' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'street' => $this->string()->notNull(),
            'house' => $this->integer()->notNull(),
            'office_apartment' => $this->integer()
        ]);

        $this->createIndex(
            'idx-addresses-user_id',
            'addresses',
            'user_id'
        );

        $this->addForeignKey(
            'fk-addresses-user_id',
            'addresses',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }
}
