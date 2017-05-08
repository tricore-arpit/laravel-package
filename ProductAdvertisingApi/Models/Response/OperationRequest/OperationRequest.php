<?php

namespace App\Packages\ProductAdvertisingApi\Models\Response\OperationRequest;

class OperationRequest {

    protected $requestId, $arguments, $requestProcessingTime;

    public function __construct($xml)
    {
        $this->requestId = (string)$xml->RequestId;
        $this->arguments = [];
        $this->requestProcessingTime = (string)$xml->RequestProcessingTime;

//        \Bugsnag::setBeforeNotifyFunction(function($error) use ($xml){
//            $error->setMetaData([
//                'Data' => [
//                    'Xml' => $xml
//                ]
//            ]);
//        });

        if (isset($xml) && $xml != [] && isset($xml->Arguments) && isset($xml->Arguments->Argument) && count($xml->Arguments->Argument) > 0) {
            foreach ($xml->Arguments->Argument as $argument) {
                $this->arguments[] = new Argument($argument);
            }
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function getArguments()
    {
        return $this->arguments;
    }

    public function getRequestProcessingTime()
    {
        return $this->requestProcessingTime;
    }

    /*
    |--------------------------------------------------------------------------
    | Setters
    |--------------------------------------------------------------------------
    */

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
        return $this;
    }

    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
        return $this;
    }

    public function setRequestProcessingTime($requestProcessingTime)
    {
        $this->requestProcessingTime = $requestProcessingTime;
        return $this;
    }
}