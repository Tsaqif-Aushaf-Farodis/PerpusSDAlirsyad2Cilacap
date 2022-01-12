<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "users".
 *
 * @property integer $user_id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string $role
 * @property string $name
 * @property string $email
 * @property string $phone
 *
 * @property \app\models\Peminjaman[] $peminjamen
 */
class Users extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'peminjamen'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accessToken', 'role', 'name', 'email', 'phone'], 'required'],
            [['username', 'password', 'phone'], 'string', 'max' => 15],
            [['authKey', 'accessToken', 'role', 'name', 'email'], 'string', 'max' => 50],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'role' => 'Role',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjamen()
    {
        return $this->hasMany(\app\models\Peminjaman::className(), ['user_id' => 'user_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\UsersQuery(get_called_class());
    }
}
