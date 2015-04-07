<?php
/**
 * Created by PhpStorm.
 * User: adeel
 * Date: 4/1/15
 * Time: 5:50 PM
 */


use Zizaco\Confide\UserValidator as ConfideUserValidator;
use Zizaco\Confide\UserValidatorInterface;

class UserAccountValidator extends ConfideUserValidator implements UserValidatorInterface
{
    public $rules = [
        'create' => [
            'username' => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:4',
            'first_name' => 'required',
            'last_name' => 'required',
            'organization' => 'required',
            'role' => 'required',
            'department' => 'required',
        ],
        'update' => [
            'username' => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ]
    ];
}