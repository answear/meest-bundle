<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response\DTO;

class StreetDTO
{
    /**
     * @var string
     */
    public $streetIdRef;

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
    public $streetTypeUA;

    /**
     * @var string|null
     */
    public $streetTypeRU;

    /**
     * @var string
     */
    public $cityIdRef;
}
