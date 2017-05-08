<?php

namespace App\Packages\ProductAdvertisingApi\Models\Response\Item;

class Offers{

    protected $totalOffers, $totalOfferPages, $moreOffersUrl;
    protected $offers;

    public function __construct($xml)
    {
        $this->offers = [];
        $this->totalOffers = (string)$xml->TotalOffers;
        $this->totalOfferPages = (string)$xml->TotalOfferPages;
        $this->moreOffersUrl = (string)$xml->MoreOffersUrl;

        if (count($xml->Offer) == 0) {
            $this->offers[] = new Offer($xml->Offer);
        } else {
            foreach ($xml->Offer as $offer) {
                $this->offers[] = new Offer($offer);
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    public function getFirstOffer()
    {
        return $this->offers[0];
    }
}