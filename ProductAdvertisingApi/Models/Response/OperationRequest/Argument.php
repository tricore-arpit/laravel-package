<?php 

namespace App\Packages\ProductAdvertisingApi\Models\Response\OperationRequest;

class Argument {
    
    protected $name, $value;

    public function __construct(\SimpleXMLElement $xml)
    {
        $this->setName((string)$xml['Name']);
        $this->setValue((string)$xml['Value']);
    }

    /*
    |--------------------------------------------------------------------------
    | Getters   
    |--------------------------------------------------------------------------
    */
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getValue()
    {
        return $this->value;
    }
    
    /*
    |--------------------------------------------------------------------------
    | Setters 
    |--------------------------------------------------------------------------
    */
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}