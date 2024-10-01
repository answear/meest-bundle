# Meest Bundle
Meest B2B API integration for Symfony.  
Documentation of the Meest B2B API can be found here: http://dev.meestb2b.com:8090/confluence/.

Installation
------------

* install with Composer
```
composer require answear/meest-bundle
```

`Answear\MeestBundle\AnswearMeestBundle::class => ['all' => true],`  
should be added automatically to your `config/bundles.php` file by Symfony Flex.

Usage
------------
1. Fetch array of Nova Poshta Pickup Points (or any other supported division type found in DivisionTypeEnum)
```php
use Answear\MeestBundle\Enum\DivisionTypeEnum;
use Answear\MeestBundle\Request\SearchDivisions;
use Answear\MeestBundle\Response\DTO\DivisionDTO;
use Answear\MeestBundle\Response\SearchDivisions as SearchDivisionsResponse;
use Answear\MeestBundle\Service\MeestClient;

// ...

/**
 * @var MeestClient
 */
private $meestClient;

public function __construct(
    ...
    MeestClient $meestClient
) {
    ...
    $this->meestClient = $meestClient;
}

...

public function pickupPoints(): void
{
    /** @var SearchDivisionsResponse $response */
    $response = $this->meestClient->request(new SearchDivisions(DivisionTypeEnum::NovaPoshtaPoint));
    
    /** @var DivisionDTO $division */
    foreach ($response->return as $division) {
        if ($division->active) {
            ...
        }
    }
    ...
}
```

Final notes
------------

Feel free to open pull requests with new features, improvements or bug fixes. The Answear team will be grateful for any comments.

