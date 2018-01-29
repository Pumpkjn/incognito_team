<?php

class User
{
    private $data = null; // user row data
    private $db = null;
    public function __construct($user_data)
    {
        $this->data = $user_data;
    }

    public static function get_user_by_field($key, $value)
    {
        $db = database::get_instance();
        $data = $db->select_query("SELECT * FROM users WHERE `$key` = $value");
        if ($data)
        {
            return new User($data);
        }
        else return false;
    }

    public static function get_user_by_username($username) //get user by username
    {
        return self::get_user_by_field("username",$username);
    }

    public static function get_user_by_id($id)
    {
        return self::get_user_by_field("id",$id);
    }

    public static function register($user_data)
    {

    }

    public






}