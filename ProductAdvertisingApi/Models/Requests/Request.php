<?php 

namespace App\Packages\ProductAdvertisingApi\Models\Requests;

class Request {
    
    protected $operation, $responseGroups, $service, $version;

    public function __construct()
    {
        $this->responseGroups = [];
        $this->service = 'AWSECommerceService';
        $this->version = '2015-08-01';
    }

    public function getParams()
    {
        $responseGroups = implode(',',$this->responseGroups);

        return [
            'Operation'		=> $this->operation,
            'ResponseGroup'	=> $responseGroups,
            'Service'		=> $this->service,
            'Timestamp'		=> gmdate("Y-m-d\TH:i:s\Z"),
            'Version'		=> $this->version
        ];
    }
    /*
    |--------------------------------------------------------------------------
    | Getters 
    |--------------------------------------------------------------------------
    */
    
    public function getOperation()
    {
        return $this->operation;
    }
    
    public function getResponseGroups()
    {
        return $this->responseGroups;
    }
    
    /*
    |--------------------------------------------------------------------------
    | Setters 
    |--------------------------------------------------------------------------
    */

    public function addResponseGroup($responseGroup)
    {
        $this->responseGroups[] = $responseGroup;
        return $this;
    }

    public function setOperation($operation)
    {
        $this->operation = $operation;
        return $this;
    }
    
    public function setResponseGroups($responseGroups)
    {
        $this->responseGroups = $responseGroups;
        return $this;
    }
    
}