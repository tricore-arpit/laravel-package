<?php

namespace App\Packages\ProductAdvertisingApi;

class Client {

    protected $accessKeyId, $associateTag, $secretAccessKey;

    public function getParams()
    {
        return [
            'AWSAccessKeyId' => $this->getAccessKeyId(),
            'AssociateTag' => $this->getAssociateTag(),
        ];
    }
    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    public function getEndPoint()
    {
        return $this->endPoint;
    }

    public function getAccessKeyId()
    {
        return $this->accessKeyId;
    }

    public function getAssociateTag()
    {
        return $this->associateTag;
    }

    public function getSecretAccessKey()
    {
        return $this->secretAccessKey;
    }

    /*
    |--------------------------------------------------------------------------
    | Setters
    |--------------------------------------------------------------------------
    */

    public function setKeys($keys)
    {
        if (!isset($keys['access_key']) || !isset($keys['associate_tag']) || !isset($keys['secret_key'])) {
            throw new InvalidKeysException('With keys: ' . print_r($keys,true));
        }

        $this->setAccessKeyId($keys['access_key']);
        $this->setAssociateTag($keys['associate_tag']);
        $this->setSecretAccessKey($keys['secret_key']);

        return $this;
    }
    
    public function setEndPoint($endPoint)
    {
        $this->endPoint = $endPoint;
        return $this;
    }

    public function setAccessKeyId($accessKeyId)
    {
        $this->accessKeyId = $accessKeyId;
        return $this;
    }

    public function setAssociateTag($associateTag)
    {
        $this->associateTag = $associateTag;
        return $this;
    }

    public function setSecretAccessKey($secretAccessKey)
    {
        $this->secretAccessKey = $secretAccessKey;
        return $this;
    }
}