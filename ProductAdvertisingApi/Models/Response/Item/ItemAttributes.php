<?php

namespace App\Packages\ProductAdvertisingApi\Models\Response\Item;

class ItemAttributes {

    protected $binding, $brand, $catalogNumberList, $ean, $eanList, $feature, $hazardousMaterialType;
    protected $isAutographed, $isMemorabilia, $itemDimensions, $label, $listPrice, $manufacturer;
    protected $model, $mpn, $packageQuantity, $partNumber, $productGroup, $productTypeName, $publisher;
    protected $size, $sku, $studio, $title, $upc, $upcList;

    public function __construct($xml)
    {
        $this->binding = (string)$xml->Binding;
        $this->brand = (string)$xml->Brand;
        $this->catalogNumberList = $xml->CatalogNumberList;
        $this->ean = (string)$xml->EAN;
        $this->eanList = $xml->EANList;
        $this->feature = $xml->Feature;
        $this->feature = (string)$xml->Feature;
        $this->hazardousMaterialType = (string)$xml->HazardousMaterialType;

        $this->isAutographed = (string)$xml->IsAutographed;
        $this->isMemorabilia = (string)$xml->IsMemorabilia;
        $this->itemDimensions = new Dimensions($xml->ItemDimensions);
        $this->label = (string)$xml->Label;
        $this->listPrice = $xml->ListPrice;
        $this->manufacturer = (string)$xml->Manufacturer;

        $this->model = (string)$xml->Model;
        $this->mpn = (string)$xml->MPN;
        $this->packageQuantity = (string)$xml->PackageQuantity;
        $this->partNumber = (string)$xml->PartNumber;
        $this->productGroup = (string)$xml->ProductGroup;
        $this->productTypeName = (string)$xml->ProductTypeName;
        $this->publisher = (string)$xml->Publisher;

        $this->size = (string)$xml->Size;
        $this->sku = (string)$xml->SKU;
        $this->studio = (string)$xml->Studio;
        $this->title = (string)$xml->Title;
        $this->upc = (string)$xml->UPC;
        $this->upcList = $xml->UPCList;

    }

    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    public function getItemDimensions()
    {
        return $this->itemDimensions;
    }
    
    public function getListPrice()
    {
        return $this->listPrice;
    }

}