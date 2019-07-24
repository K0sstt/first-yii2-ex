<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property int $date
 * @property string $email
 */
class User extends \yii\db\ActiveRecord
{
    const GENDER = ['male', 'female', 'undefined'];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'first_name', 'last_name', 'gender', 'email'], 'required'],
            [['date'], 'integer'],
            [['login', 'password', 'first_name', 'last_name', 'gender', 'email'], 'string', 'max' => 255],
            [['login'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'gender' => 'Gender',
            'date' => 'Date',
            'email' => 'Email',
        ];
    }

    public function getAddresses() {
        return $this->hasMany(Address::className(), ['user_id' => 'id']);
    }
}
