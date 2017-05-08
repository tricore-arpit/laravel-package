<?php

namespace App\Packages\ProductAdvertisingApi\Models\Response\Item;

class Dimensions {

    protected $length, $lengthUnits, $width, $widthUnits;
    protected $height, $heightUnits, $weight, $weightUnits;
    protected $flags;

    public function __construct($xml)
    {

        $this->flags = [];

        if (isset($xml->Height)) {
            $this->setHeight((string)$xml->Height);
            $this->setHeightUnits((string)$xml->Height['Units']);
        } else {
            $this->setHeight(0);
        }

        if (isset($xml->Length)) {
            $this->setLength((string)$xml->Length);
            $this->setLengthUnits((string)$xml->Length['Units']);
        } else {
            $this->setLength(0);
        }

        if (isset($xml->Width)) {
            $this->setWidth((string)$xml->Width);
            $this->setWidthUnits((string)$xml->Width['Units']);
        } else {
            $this->setWidth(0);
        }

        if (isset($xml->Weight)) {
            $this->setWeight((string)$xml->Weight);
            $this->setWeightUnits((string)$xml->Weight['Units']);
        } else {
            $this->setWeight(0);
        }

        $this->standardize();

    }

    public function standardize()
    {
        switch ($this->heightUnits) {
            case 'hundredths-inches':
                $this->height = $this->height / 100;
                $this->heightUnits = 'inches';
                break;

            case 'centimeters':
                $this->height = $this->height / 2.54;
                $this->heightUnits = 'inches';
                break;

            case 'mm':
                $this->height = $this->height / 25.4;
                $this->heightUnits = 'inches';
                break;

            case 'meters':
                $this->height = $this->height * 39.3701;
                $this->heightUnits = 'inches';
                break;

            case 'yards':
                $this->height = $this->height * 36;
                $this->heightUnits = 'inches';
                break;

            case 'inches':
                break;

            default:
                $this->flags[] = "Height units can't be standardized. Units: $this->heightUnits";
        }

        // Length
        switch ($this->lengthUnits) {
            case 'hundredths-inches':
                $this->length = $this->length / 100;
                $this->lengthUnits = 'inches';
                break;

            case 'centimeters':
                $this->length = $this->length / 2.54;
                $this->lengthUnits = 'inches';
                break;

            case 'mm':
                $this->length = $this->length / 25.4;
                $this->lengthUnits = 'inches';
                break;

            case 'meters':
                $this->length = $this->length * 39.3701;
                $this->lengthUnits = 'inches';
                break;

            case 'yards':
                $this->length = $this->length * 36;
                $this->lengthUnits = 'inches';
                break;

            case 'inches':
                break;

            default:
                $this->flags[] = "Length units can't be standardized. Units: $this->lengthUnits";
        }

        // Width
        switch ($this->widthUnits) {
            case 'hundredths-inches':
                $this->width = $this->width / 100;
                $this->widthUnits = 'inches';
                break;

            case 'centimeters':
                $this->width = $this->width / 2.54;
                $this->widthUnits = 'inches';
                break;

            case 'mm':
                $this->width = $this->width / 25.4;
                $this->widthUnits = 'inches';
                break;

            case 'meters':
                $this->width = $this->width * 39.3701;
                $this->widthUnits = 'inches';
                break;

            case 'yards':
                $this->width = $this->width * 36;
                $this->widthUnits = 'inches';
                break;

            case 'inches':
                break;

            default:
                $this->flags[] = "Width units can't be standardized. Units: $this->widthUnits";
        }

        // Weight
        switch ($this->weightUnits) {
            case 'hundredths-pounds':
                $this->weight = $this->weight / 100;
                $this->weightUnits = 'pounds';
                break;

            case 'grams':
                $this->weight = $this->weight / 453.592;
                $this->weightUnits = 'pounds';
                break;

            case 'milligrams':
                $this->weight = $this->weight / 453592;
                $this->weightUnits = 'pounds';
                break;

            case 'ounces':
                $this->weight = $this->weight / 16;
                $this->weightUnits = 'pounds';
                break;

            case 'Kilograms':
                $this->weight = $this->weight / 0.453592;
                $this->weightUnits = 'pounds';
                break;

            case 'hundredths-inches':
                $this->weight = $this->weight / 100; //@todo is this the best solution?
                $this->weightUnits = 'pounds';
                $this->flags[] = 'Weight unit was set to hundredths-inches';
                break;

            case 'pounds':
                break;

            default:
                $this->flags[] = "Weight units can't be standardized. Units: $this->weightUnits";
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    public function getLength()
    {
        return $this->length;
    }

    public function getLengthUnits()
    {
        return $this->lengthUnits;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getWidthUnits()
    {
        return $this->widthUnits;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getHeightUnits()
    {
        return $this->heightUnits;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getWeightUnits()
    {
        return $this->weightUnits;
    }

    /*
    |--------------------------------------------------------------------------
    | Setters
    |--------------------------------------------------------------------------
    */

    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    public function setLengthUnits($lengthUnits)
    {
        $this->lengthUnits = $lengthUnits;
        return $this;
    }

    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    public function setWidthUnits($widthUnits)
    {
        $this->widthUnits = $widthUnits;
        return $this;
    }

    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    public function setHeightUnits($heightUnits)
    {
        $this->heightUnits = $heightUnits;
        return $this;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    public function setWeightUnits($weightUnits)
    {
        $this->weightUnits = $weightUnits;
        return $this;
    }

}