<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response;

class GetApiVersion implements ResponseInterface
{
    /**
     * @var string
     */
    public $return;

    public function __construct(string $return)
    {
        $this->return = $return;
    }
}
