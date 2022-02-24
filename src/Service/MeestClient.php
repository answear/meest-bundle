<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Service;

use Answear\MeestBundle\Enum\RequestEnum;
use Answear\MeestBundle\Enum\ResponseEnum;
use Answear\MeestBundle\Exception\MeestException;
use Answear\MeestBundle\Request;
use Answear\MeestBundle\Request\RequestInterface;
use Answear\MeestBundle\Response;

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

    /**
     * @var \SoapClient|null
     */
    private $client;
    /**
     * @var ConfigProvider
     */
    private $configProvider;

    public function __construct(ConfigProvider $configProvider)
    {
        $this->configProvider = $configProvider;
    }

    public function searchDivisions(Request\SearchDivisions $request): Response\SearchDivisions
    {
        return $this->request($request);
    }

    public function getApiVersion(Request\GetApiVersion $request): Response\GetApiVersion
    {
        return $this->request($request);
    }

    public function searchCityByPostCode(Request\SearchCityByPostCode $request): Response\SearchCityByPostCode
    {
        return $this->request($request);
    }

    public function searchStreetByNameAndCityIdRef(
        Request\SearchStreetByNameAndCityIdRef $request
    ): Response\SearchStreetByNameAndCityIdRef {
        return $this->request($request);
    }

    public function searchCity(Request\SearchCity $request): Response\SearchCity
    {
        return $this->request($request);
    }

    private function request(RequestInterface $request)
    {
        try {
            return $this->getClient()->__soapCall($request->getEndpoint()->getValue(), [$request->toArray()]);
        } catch (\SoapFault $soapFault) {
            throw new MeestException($soapFault);
        }
    }

    private function getClient(): \SoapClient
    {
        if (null !== $this->client) {
            return $this->client;
        }

        $soapOptions = [
            'classmap' => self::CLASSMAP,
            'location' => $this->configProvider->getApiUrl(),
            'exceptions' => true,
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
        ];

        $this->client = new \SoapClient(self::WSDL_URL, $soapOptions);

        return $this->client;
    }
}
