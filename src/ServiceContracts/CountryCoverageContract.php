<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\CountryCoverage\CountryCoverageGetCountryResponse;
use Telnyx\CountryCoverage\CountryCoverageGetResponse;
use Telnyx\RequestOptions;

interface CountryCoverageContract
{
    /**
     * @api
     *
     * @return CountryCoverageGetResponse<HasRawResponse>
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): CountryCoverageGetResponse;

    /**
     * @api
     *
     * @return CountryCoverageGetCountryResponse<HasRawResponse>
     */
    public function retrieveCountry(
        string $countryCode,
        ?RequestOptions $requestOptions = null
    ): CountryCoverageGetCountryResponse;
}
