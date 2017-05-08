<?php

namespace App\Packages\ProductAdvertisingApi\Models\Response\Item;

class Item {

    protected $asin, $detailPageUrl, $itemLinks, $salesRank, $itemAttributes;
    protected $offers, $offerSummary, $browseNodes;

    public function __construct($xml)
    {
        $this->asin = (string)$xml->ASIN;
        $this->detailPageUrl = (string)$xml->DetailPageURL;
        $this->itemLinks = $this->getItemLinks($xml->ItemLinks);
        $this->salesRank = (string)$xml->SalesRank;
        $this->itemAttributes = $xml->ItemAttributes;
        $this->itemAttributes = $xml->ItemAttributes;
        $this->offerSummary = $xml->OfferSummary;
        $this->offers = new Offers($xml->Offers);
        $this->browseNodes = new BrowseNodes($xml->BrowseNodes);
    }

    public function getItemLinks($xml)
    {
        $output = [];

        foreach($xml->ItemLink as $link) {
            $output[] = [
                'Description' => (string)$link->Description,
                'URL' => (string)$link->URL,
            ];
        }

        return $output;
    }

    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    public function getBuyBoxWinner()
    {

        $merchant = $this->offers->getFirstOffer()->getMerchant();
//        echo("Merchant: " . $merchant . "\n");

        if ($merchant == 'Amazon.com') {
            return 'AMZ';
        } else if ($merchant == '') {
            return 'Unknown';
        }

        if ($this->offers->getFirstOffer()->isEligibleForPrime()) {
            return 'FBA';
        }

        return 'FBM';
    }
    
    public function getOffers()
    {
        return $this->offers;
    }

    public function getAsin()
    {
        return $this->asin;
    }
}