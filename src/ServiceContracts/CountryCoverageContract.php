<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CountryCoverage\CountryCoverageGetCountryResponse;
use Telnyx\CountryCoverage\CountryCoverageGetResponse;
use Telnyx\RequestOptions;

interface CountryCoverageContract
{
    /**
     * @api
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): CountryCoverageGetResponse;

    /**
     * @api
     */
    public function retrieveCountry(
        string $countryCode,
        ?RequestOptions $requestOptions = null
    ): CountryCoverageGetCountryResponse;
}
