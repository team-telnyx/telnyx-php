<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\CountryCoverage\CountryCoverageGetCountryResponse;
use Telnyx\CountryCoverage\CountryCoverageGetResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CountryCoverageContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): CountryCoverageGetResponse;

    /**
     * @api
     *
     * @param string $countryCode country ISO code
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveCountry(
        string $countryCode,
        RequestOptions|array|null $requestOptions = null
    ): CountryCoverageGetCountryResponse;
}
