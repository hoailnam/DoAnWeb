<?php
class Product
{
    private $id;
    private $name;
    private $image;
    private $price;

    public function __construct($id, $name, $image, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_image()
    {
        return $this->image;
    }

    public function get_price()
    {
        return $this->price;
    }
}
