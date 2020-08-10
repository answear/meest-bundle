<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Service;

use Answear\MeestBundle\Enum\RequestEnum;
use Answear\MeestBundle\Enum\ResponseEnum;
use Answear\MeestBundle\Request;
use Answear\MeestBundle\Request\RequestInterface;
use Answear\MeestBundle\Response;
use Answear\MeestBundle\Response\ResponseInterface;

class MeestClient
{
    private const WSDL_URL = 'http://meestb2b.com/administration/services/MeestPoland?wsdl';

    public const CLASSMAP = [
        RequestEnum::SEARCH_DIVISIONS => Request\SearchDivisions::class,
        ResponseEnum::SEARCH_DIVISIONS => Response\SearchDivisions::class,
        ResponseEnum::DIVISION_DTO => Response\DTO\DivisionDTO::class,
    ];

    /** @var \SoapClient */
    private $client;

    public function __construct(ConfigProvider $configProvider)
    {
        $soapOptions['classmap'] = self::CLASSMAP;
        $soapOptions['location'] = $configProvider->getApiUrl();
        $soapOptions['exceptions'] = true;

        $this->client = new \SoapClient(self::WSDL_URL, $soapOptions);
    }

    public function request(RequestInterface $request): ResponseInterface
    {
        return $this->client->__soapCall($request->getMethod()->getValue(), [$request->toArray()]);
    }
}
