<?php

namespace App\Packages\ProductAdvertisingApi\Models\Response\Item;

class Offer {

    protected $merchant, $offerAttributes;
    protected $offerListingId, $price, $salePrice, $amountSaved, $percentageSaved;
    protected $availability, $availabilityAttributes, $isEligibleForSuperSaver, $isEligibleForPrime;

    public function __construct($xml)
    {

        if (!isset($xml->Merchant->Name)) {
            return false;
        }

        $this->merchant = (string)$xml->Merchant->Name;
        $this->offerAttributes = (string)$xml->OfferAttributes;
        $this->offerListingId = (string)$xml->OfferListing->OfferListingId;
        $this->price = (string)$xml->OfferListing->Price;
        $this->salePrice = (string)$xml->OfferListing->SalePrice;
        $this->amountSaved = (string)$xml->OfferListing->AmountSaved;
        $this->percentageSaved = (string)$xml->OfferListing->PercentageSaved;
        $this->availability = (string)$xml->OfferListing->Availability;
        $this->availabilityAttributes = (string)$xml->OfferListing->AvailabilityAttributes;
        $this->isEligibleForSuperSaver = (string)$xml->OfferListing->IsEligibleForsuperSaverShipping;
        $this->isEligibleForPrime = (string)$xml->OfferListing->IsEligibleForPrime;
    }

    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    public function getMerchant()
    {
        return $this->merchant;
    }

    public function isEligibleForPrime()
    {
        if ($this->isEligibleForPrime) {
            return true;
        }

        return false;
    }
}