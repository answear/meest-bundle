<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response\DTO;

class CityDTO
{
    /**
     * @var string
     */
    public $cityIdRef;

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
    public $descriptionEN;

    /**
     * @var string
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
     * @var string
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

}
