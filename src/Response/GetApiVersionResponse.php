<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response;

class GetApiVersionResponse implements ResponseInterface
{
    /**
     * @var string $return
     */
    public $return;

    public function __construct(string $return)
    {
        $this->return = $return;
    }
}
