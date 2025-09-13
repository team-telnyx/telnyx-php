<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): CountryCoverageGetResponse;

    /**
     * @api
     *
     * @return CountryCoverageGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): CountryCoverageGetResponse;

    /**
     * @api
     *
     * @return CountryCoverageGetCountryResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveCountry(
        string $countryCode,
        ?RequestOptions $requestOptions = null
    ): CountryCoverageGetCountryResponse;

    /**
     * @api
     *
     * @return CountryCoverageGetCountryResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveCountryRaw(
        string $countryCode,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): CountryCoverageGetCountryResponse;
}
