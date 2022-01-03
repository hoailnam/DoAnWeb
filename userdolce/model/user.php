<?php

class User
{
    private $user_id;
    private $user_name;
    private $password;
    private $address;
    private $phone;

    public function __construct($id, $name, $pass, $address, $phone)
    {
        $this->user_id = $id;
        $this->user_name = $name;
        $this->phone = $phone;
        $this->address = $address;
        $this->password = $pass;
    }

    public function get_userid()
    {
        return $this->user_id;
    }
    public function get_username()
    {
        return $this->user_name;
    }

    public function get_password()
    {
        return $this->password;
    }
    public function get_address()
    {
        return $this->address;
    }
    public function get_phone()
    {
        return $this->phone;
    }
}
