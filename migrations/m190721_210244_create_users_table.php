<?php

use yii\db\Migration;
use app\models\User;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m190721_210244_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->unique()->notNull(),
            'password' => $this->string()->notNull(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'gender' => $this->string()->defaultValue(User::GENDER[3])->notNull(),
            'date' => $this->dateTime()->notNull(),
            'email' => $this->string()->unique()->notNull(),
            'address_id' => $this->integer()->notNull()
        ]);

        $this->createIndex(
            'idx-users-address_id',
            'users',
            'address_id'
        );

        $this->addForeignKey(
            'fk-users-address_id',
            'users',
            'address_id',
            'addresses',
            'id',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }
}
