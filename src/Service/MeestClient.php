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
        RequestEnum::GET_API_VERSION => Request\GetApiVersion::class,
        RequestEnum::SEARCH_CITY_BY_POST_CODE => Request\SearchCityByPostCode::class,
        RequestEnum::SEARCH_CITY => Request\SearchCity::class,
        RequestEnum::SEARCH_STREET_BY_NAME_AND_CITY_ID_REF => Request\SearchStreetByNameAndCityIdRef::class,
        ResponseEnum::SEARCH_DIVISIONS => Response\SearchDivisions::class,
        ResponseEnum::GET_API_VERSION => Response\GetApiVersion::class,
        ResponseEnum::SEARCH_CITY_BY_POST_CODE => Response\SearchCityByPostCode::class,
        ResponseEnum::SEARCH_STREET_BY_NAME_AND_CITY_ID_REF => Response\SearchStreetByNameAndCityIdRef::class,
        ResponseEnum::SEARCH_CITY => Response\SearchCity::class,
        ResponseEnum::DIVISION_DTO => Response\DTO\DivisionDTO::class,
        ResponseEnum::CITY_DTO => Response\DTO\CityDTO::class,
        ResponseEnum::STREET_DTO => Response\DTO\StreetDTO::class,
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
        return $this->client->__soapCall($request->getFunction()->getValue(), [$request->toArray()]);
    }
}
