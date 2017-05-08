<?php

namespace App\Packages\ProductAdvertisingApi\Models\Requests;

class ItemLookupRequest extends Request {

    protected $ids, $idType;

    public function __construct()
    {
        parent::__construct();
        $this->operation = 'ItemLookup';
        $this->ids = [];
    }

    public function getParams()
    {

        $asinListString = implode(',', $this->getIds());

        $params = parent::getParams();

        $params['IdType'] = $this->getIdType();
        $params['ItemId'] = $asinListString;

        return $params;
    }

    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    public function getIds()
    {
        return $this->ids;
    }

    public function getIdType()
    {
        return $this->idType;
    }

    /*
    |--------------------------------------------------------------------------
    | Setters
    |--------------------------------------------------------------------------
    */

    public function addId($id)
    {
        $this->ids[] = $id;
        return $this;
    }

    public function setIds($ids)
    {
        $this->ids = $ids;
        return $this;
    }

    public function setIdType($idType)
    {
        $this->idType = $idType;
        return $this;
    }
}