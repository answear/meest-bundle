<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response;

use Answear\MeestBundle\Response\DTO\DivisionDTO;

class SearchDivisions implements ResponseInterface
{
    /**
     * @var DivisionDTO[]|array
     */
    public array $return = [];
}
