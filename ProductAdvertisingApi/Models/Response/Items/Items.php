<?php

namespace App\Packages\ProductAdvertisingApi\Models\Response\Items;

use App\Packages\ProductAdvertisingApi\Models\Response\Item\Item;

class Items {

    protected $items, $request;

    public function __construct($xml)
    {

        echo("<pre>");
        $string = print_r($xml, true);
        $lines = explode("\n", $string);
        foreach($lines as $index=>$line) {
//            echo($line . "\n");
            if($index > 100) { break; }
        }

        $this->request = $xml->Request;//new ResponseRequest();

        $this->items = [];

        foreach ($xml->Item as $item) {
            $this->items[] = new Item($item);
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Getters 
    |--------------------------------------------------------------------------
    */

    public function getItems()
    {
        return $this->items;
    }

    public function getRequest()
    {
        return $this->request;
    }

    /*
    |--------------------------------------------------------------------------
    | Setters 
    |--------------------------------------------------------------------------
    */
}