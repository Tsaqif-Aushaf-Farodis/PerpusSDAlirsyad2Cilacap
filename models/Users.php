<?php

namespace app\models;

use Yii;
use \app\models\base\Users as BaseUsers;

/**
 * This is the model class for table "users".
 */
class Users extends BaseUsers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['username', 'password', 'authKey', 'accessToken', 'role', 'name', 'email', 'phone'], 'required'],
            [['username', 'password', 'phone'], 'string', 'max' => 15],
            [['authKey', 'accessToken', 'role', 'name', 'email'], 'string', 'max' => 50],
            [['username'], 'unique']
        ]);
    }
	
}
