<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Tests\Functional\Service;

use Answear\MeestBundle\Enum\DivisionTypeEnum;
use Answear\MeestBundle\Enum\RequestEnum;
use Answear\MeestBundle\Request\SearchCity;
use Answear\MeestBundle\Request\SearchCityByPostCode;
use Answear\MeestBundle\Request\SearchDivisions;
use Answear\MeestBundle\Request\SearchStreetByNameAndCityIdRef;
use Answear\MeestBundle\Response\DTO\CityDTO;
use Answear\MeestBundle\Response\DTO\DivisionDTO;
use Answear\MeestBundle\Response\DTO\StreetDTO;
use Answear\MeestBundle\Response\ResponseInterface;
use Answear\MeestBundle\Response\SearchCity as SearchCityResponse;
use Answear\MeestBundle\Response\SearchCityByPostCode as SearchCityByPostCodeResponse;
use Answear\MeestBundle\Response\SearchDivisions as SearchDivisionsResponse;
use Answear\MeestBundle\Response\SearchStreetByNameAndCityIdRef as SearchStreetByNameAndCityIdRefResponse;
use Answear\MeestBundle\Service\MeestClient;
use PHPUnit\Framework\TestCase;

class MeestClientTest extends TestCase
{
    /**
     * @test
     */
    public function fetchesDivisions(): void
    {
        $meestClientMock = $this->createMock(MeestClient::class);
        $meestClientMock->method('request')->with(new SearchDivisions(DivisionTypeEnum::collectionPoint()))
            ->willReturn($this->getResponse(RequestEnum::SEARCH_DIVISIONS));

        $actualResponse = $meestClientMock->request(new SearchDivisions(DivisionTypeEnum::collectionPoint()));

        $this->assertEquals(
            $this->getExpectedSearchDivisionsResponse(),
            $actualResponse
        );
    }

    /**
     * @test
     */
    public function searchesCity(): void
    {
        $meestClientMock = $this->createMock(MeestClient::class);
        $meestClientMock->method('request')->with(new SearchCity('Одеса'))
            ->willReturn($this->getResponse(RequestEnum::SEARCH_CITY));

        $actualResponse = $meestClientMock->request(new SearchCity('Одеса'));

        $this->assertEquals(
            $this->getExpectedSearchCityResponse(),
            $actualResponse
        );
    }

    /**
     * @test
     */
    public function searchesCityByPostCode(): void
    {
        $meestClientMock = $this->createMock(MeestClient::class);
        $meestClientMock->method('request')->with(new SearchCityByPostCode('46001'))
            ->willReturn($this->getResponse(RequestEnum::SEARCH_CITY_BY_POST_CODE));

        $actualResponse = $meestClientMock->request(new SearchCityByPostCode('46001'));

        $this->assertEquals(
            $this->getExpectedSearchCityByPostCodeResponse(),
            $actualResponse
        );
    }

    /**
     * @test
     */
    public function searchesStreetByNameAndCityIdRef(): void
    {
        $meestClientMock = $this->createMock(MeestClient::class);
        $meestClientMock->method('request')
            ->with(new SearchStreetByNameAndCityIdRef('0xb11200215aee3ebe11df749b62c3d54a', 'Зелена'))
            ->willReturn($this->getResponse(RequestEnum::SEARCH_STREET_BY_NAME_AND_CITY_ID_REF));

        $actualResponse = $meestClientMock->request(
            new SearchStreetByNameAndCityIdRef('0xb11200215aee3ebe11df749b62c3d54a', 'Зелена')
        );

        $this->assertEquals(
            $this->getExpectedSearchStreetByNameAndCityIdRefResponse(),
            $actualResponse
        );
    }

    private function getResponse(string $functionName): ResponseInterface
    {
        $responseXml = file_get_contents(
            __DIR__ . '/../../DataFixtures/XML/' . ucfirst($functionName) . 'Response.xml'
        );
        $wsdl = __DIR__ . '/../../DataFixtures/XML/MeestPoland.wsdl';

        $soapClientMock = $this->getMockBuilder(\SoapClient::class)
            ->setConstructorArgs([$wsdl, ['classmap' => MeestClient::CLASSMAP]])
            ->onlyMethods(['__doRequest'])
            ->getMock();

        $soapClientMock->expects($this->once())
            ->method('__doRequest')->will($this->returnValue($responseXml));

        return $soapClientMock->__call($functionName, []);
    }

    private function getExpectedSearchDivisionsResponse(): SearchDivisionsResponse
    {
        $response = new SearchDivisionsResponse();

        $division1 = new DivisionDTO();
        $division1->divisionIDRRef = '0x80e71c98ec13526111e9f1b5a7d55fdd';
        $division1->active = true;
        $division1->descriptionUA = 'м.Вишгород,вул.Грушевського 6-А';
        $division1->descriptionRU = 'г.Вышгород,ул.Грушевского 6-А';
        $division1->regionDescriptionUA = 'КИЇВСЬКА';
        $division1->regionDescriptionRU = 'КИЕВСКАЯ';
        $division1->regionDescriptionEN = 'KYIVS`KA';
        $division1->districtDescriptionUA = 'Вишгородський';
        $division1->districtDescriptionRU = 'Вышгородский';
        $division1->districtDescriptionEN = 'Vyshgorodskyi';
        $division1->cityDescriptionUA = 'Вишгород';
        $division1->cityDescriptionRU = 'Вышгород';
        $division1->cityDescriptionEN = 'Vyshgorod';
        $division1->streetTypeUA = 'вул.';
        $division1->streetDescriptionUA = 'Грушевського';
        $division1->streetTypeRU = 'Грушевского';
        $division1->streetDescriptionRU = 'Грушевского';
        $division1->streetDescriptionEN = 'Grushevskogo';
        $division1->house = '6-А';
        $division1->flat = '';
        $division1->limitweight = '30.00';
        $division1->divisionType = 'DIVISION_PICKPOINT';
        $division1->latitude = '50.5885820';
        $division1->longitude = '30.4866250';
        $division1->divisionCode = '8225';
        $division1->payTypeCard = false;
        $division1->payTypeCash = true;
        $division1->terminalCash = false;
        $division1->workingHoursUa = 'Пн 09:00 - 19:00; Вт 09:00 - 19:00; Ср 09:00 - 19:00; Чт 09:00 - 19:00; Пт 09:00 - 19:00; Сб --:-- - --:--; Нд --:-- - --:--';

        $response->return[] = $division1;

        $division2 = new DivisionDTO();
        $division2->divisionIDRRef = '0x80c6000c29800ae711ea758c27a64b5b';
        $division2->active = true;
        $division2->descriptionUA = 'м.Кривий Ріг,вул.Тесленка 13 прим. 77';
        $division2->descriptionRU = 'г.Кривой Рог,ул.Тесленко 13 прим. 77';
        $division2->regionDescriptionUA = 'ДНІПРОПЕТРОВСЬКА';
        $division2->regionDescriptionRU = 'ДНЕПРОПЕТРОВСКАЯ';
        $division2->regionDescriptionEN = 'DNIPROPETROVS`KA';
        $division2->districtDescriptionUA = 'Кривий Ріг';
        $division2->districtDescriptionRU = 'Кривой Рог';
        $division2->districtDescriptionEN = 'Kryvyi Rig';
        $division2->cityDescriptionUA = 'Кривий Ріг';
        $division2->cityDescriptionRU = 'Кривой Рог';
        $division2->cityDescriptionEN = 'Kryvyi Rig';
        $division2->streetTypeUA = 'вул.';
        $division2->streetDescriptionUA = 'Тесленка';
        $division2->streetTypeRU = 'Тесленко';
        $division2->streetDescriptionRU = 'Тесленко';
        $division2->streetDescriptionEN = 'Teslenka';
        $division2->house = '13 прим. 77';
        $division2->flat = '';
        $division2->limitweight = '0.00';
        $division2->divisionType = 'DIVISION_PICKPOINT';
        $division2->latitude = '47.9377160';
        $division2->longitude = '33.4092340';
        $division2->divisionCode = '9432';
        $division2->payTypeCard = false;
        $division2->payTypeCash = true;
        $division2->terminalCash = false;
        $division2->workingHoursUa = 'Пн 09:00 - 19:00; Вт 09:00 - 19:00; Ср 09:00 - 19:00; Чт 09:00 - 19:00; Пт 09:00 - 19:00; Сб 09:00 - 15:00; Нд --:-- - --:--';

        $response->return[] = $division2;

        $division3 = new DivisionDTO();
        $division3->divisionIDRRef = '0x80cc1c98ec13526111e7b80ab095ab14';
        $division3->active = true;
        $division3->descriptionUA = 'м.Кривий Ріг,Просп.Миру 33';
        $division3->descriptionRU = 'г.Кривой Рог,Просп.Мира 33';
        $division3->regionDescriptionUA = 'ДНІПРОПЕТРОВСЬКА';
        $division3->regionDescriptionRU = 'ДНЕПРОПЕТРОВСКАЯ';
        $division3->regionDescriptionEN = 'DNIPROPETROVS`KA';
        $division3->districtDescriptionUA = 'Кривий Ріг';
        $division3->districtDescriptionRU = 'Кривой Рог';
        $division3->districtDescriptionEN = 'Kryvyi Rig';
        $division3->cityDescriptionUA = 'Кривий Ріг';
        $division3->cityDescriptionRU = 'Кривой Рог';
        $division3->cityDescriptionEN = 'Kryvyi Rig';
        $division3->streetTypeUA = 'Просп.';
        $division3->streetDescriptionUA = 'Миру';
        $division3->streetTypeRU = 'Мира';
        $division3->streetDescriptionRU = 'Мира';
        $division3->streetDescriptionEN = 'Myru';
        $division3->house = '33';
        $division3->flat = '';
        $division3->limitweight = '30.00';
        $division3->divisionType = 'DIVISION_PICKPOINT';
        $division3->latitude = '47.9096770';
        $division3->longitude = '33.3890410';
        $division3->divisionCode = '3411';
        $division3->payTypeCard = false;
        $division3->payTypeCash = true;
        $division3->terminalCash = false;
        $division3->workingHoursUa = 'Пн 09:00 - 17:00; Вт 09:00 - 17:00; Ср 09:00 - 17:00; Чт 09:00 - 17:00; Пт 09:00 - 17:00; Сб --:-- - --:--; Нд --:-- - --:--';

        $response->return[] = $division3;

        return $response;
    }

    private function getExpectedSearchCityResponse(): SearchCityResponse
    {
        $response = new SearchCityResponse();

        $city = new CityDTO();
        $city->cityIdRef = '0xb11200215aee3ebe11df749b6ed81d37';
        $city->descriptionUA = 'Одеса';
        $city->descriptionRU = 'Одесса';
        $city->descriptionEN = 'Odesa';
        $city->regionDescriptionUA = 'ОДЕСЬКА';
        $city->regionDescriptionRU = 'ОДЕССКАЯ';
        $city->regionDescriptionEN = 'ODES`KA';
        $city->districtDescriptionUA = 'Одеса';
        $city->districtDescriptionRU = 'Одесса';
        $city->districtDescriptionEN = 'Odesa';

        $response->return = $city;

        return $response;
    }

    private function getExpectedSearchCityByPostCodeResponse(): SearchCityByPostCodeResponse
    {
        $response = new SearchCityByPostCodeResponse();

        $city = new CityDTO();
        $city->cityIdRef = '0xb11200215aee3ebe11df749b50c590ab';
        $city->descriptionUA = 'Грабовець';
        $city->descriptionRU = 'Грабовец';
        $city->descriptionEN = 'Grabovets';
        $city->regionDescriptionUA = 'ТЕРНОПІЛЬСЬКА';
        $city->regionDescriptionRU = 'ТЕРНОПОЛЬСКАЯ';
        $city->regionDescriptionEN = 'TERNOPIL`S`KA';
        $city->districtDescriptionUA = 'Тернопільський';
        $city->districtDescriptionRU = 'Грабовец';
        $city->districtDescriptionEN = 'Grabovets';

        $response->return = $city;

        return $response;
    }

    private function getExpectedSearchStreetByNameAndCityIdRefResponse(): SearchStreetByNameAndCityIdRefResponse
    {
        $response = new SearchStreetByNameAndCityIdRefResponse();

        $street = new StreetDTO();
        $street->streetIdRef = '0x9b3700215aee3ebe11dfe0d3da9108ea';
        $street->descriptionUA = 'Зелена';
        $street->descriptionRU = 'Зеленая';
        $street->descriptionEN = 'Zelena';
        $street->streetTypeUA = 'вул.';
        $street->streetTypeRU = 'ул.';
        $street->cityIdRef = '0xb11200215aee3ebe11df749b62c3d54a';

        $response->return = $street;

        return $response;
    }
}
