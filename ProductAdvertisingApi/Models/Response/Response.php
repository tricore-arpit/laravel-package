<?php

namespace App\Packages\ProductAdvertisingApi\Models\Response;

use App\Packages\ProductAdvertisingApi\Models\Response\Items\Items;
use App\Packages\ProductAdvertisingApi\Models\Exceptions\PaApiRequestException;
use App\Packages\ProductAdvertisingApi\Models\Response\OperationRequest\OperationRequest;

class Response implements \IteratorAggregate {

    protected $raw, $xml;

    protected $operationRequest, $items;

    public function __construct($raw)
    {
        $this->raw = $raw;
        $this->xml = simplexml_load_string($raw);

        if (isset($this->xml->Error) && $this->xml->Error->Code == 'RequestThrottled') {
            throw new PaApiRequestException('Throttled');
        }

        if (isset($this->xml->Error)) {
            throw new PaApiRequestException($this->xml->Error->Message);
        }

        $this->operationRequest = new OperationRequest($this->xml->OperationRequest);
        $this->items = new Items($this->xml->Items);
    }

    /*
    |--------------------------------------------------------------------------
    | Getter 
    |--------------------------------------------------------------------------
    */

    public function getItems()
    {
        return $this->items;
    }

    public function getOperationRequest()
    {
        return $this->operationRequest;
    }

    public function getRaw()
    {
        return $this->raw;
    }

    public function getXml()
    {
        return $this->xml;
    }

    /*
    |--------------------------------------------------------------------------
    | Setters 
    |--------------------------------------------------------------------------
    */

    public function setRaw($raw)
    {
        $this->raw = $raw;
        return $this;
    }

    public function setXml($xml)
    {
        $this->xml = $xml;
        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Iterator
    |--------------------------------------------------------------------------
    */

    public function getIterator()
    {
        $o = new \ArrayObject($this->items->getItems());
        return $o->getIterator();
    }

}