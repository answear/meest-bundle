<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response\DTO;

class DivisionDTO
{
    /**
     * @var string
     */
    public $divisionIDRRef;

    /**
     * @var bool
     */
    public $active;

    /**
     * @var string
     */
    public $descriptionUA;

    /**
     * @var string|null
     */
    public $descriptionRU;

    /**
     * @var string|null
     */
    public $regionDescriptionUA;

    /**
     * @var string|null
     */
    public $regionDescriptionRU;

    /**
     * @var string|null
     */
    public $regionDescriptionEN;

    /**
     * @var string|null
     */
    public $districtDescriptionUA;

    /**
     * @var string|null
     */
    public $districtDescriptionRU;

    /**
     * @var string|null
     */
    public $districtDescriptionEN;

    /**
     * @var string
     */
    public $cityDescriptionUA;

    /**
     * @var string|null
     */
    public $cityDescriptionRU;

    /**
     * @var string|null
     */
    public $cityDescriptionEN;

    /**
     * @var string|null
     */
    public $streetTypeUA;

    /**
     * @var string|null
     */
    public $streetDescriptionUA;

    /**
     * @var string|null
     */
    public $streetTypeRU;

    /**
     * @var string|null
     */
    public $streetDescriptionRU;

    /**
     * @var string|null
     */
    public $streetDescriptionEN;

    /**
     * @var string|null
     */
    public $house;

    /**
     * @var string|null
     */
    public $flat;

    /**
     * @var string
     */
    public $limitweight;

    /**
     * @var string
     */
    public $divisionType;

    /**
     * @var string
     */
    public $latitude;

    /**
     * @var string
     */
    public $longitude;

    /**
     * @var string|null
     */
    public $divisionCode;

    /**
     * @var bool
     */
    public $payTypeCard;

    /**
     * @var bool
     */
    public $payTypeCash;

    /**
     * @var bool
     */
    public $terminalCash;

    /**
     * @var string
     */
    public $workingHoursUa;
}
