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
            'date' => $this->integer()->notNull(),
            'email' => $this->string()->unique()->notNull(),
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
