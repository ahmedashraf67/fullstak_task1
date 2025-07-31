<?php
class book{

    public $title;
    public $price;
    public function read()
    {
        echo "you have read $this->title";
    }

     public function showprice()
    {
        echo "book price is : $this->price";
    }
}
$book1 =new book();
$book1->title = "AI fundamentals";
$book1->title = "1000";
$book1->read();
$book1->showprice();