<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CountryCoverage\CountryCoverageGetCountryResponse;
use Telnyx\CountryCoverage\CountryCoverageGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CountryCoverageContract;

final class CountryCoverageService implements CountryCoverageContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get country coverage
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): CountryCoverageGetResponse {
        /** @var BaseResponse<CountryCoverageGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'country_coverage',
            options: $requestOptions,
            convert: CountryCoverageGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get coverage for a specific country
     *
     * @throws APIException
     */
    public function retrieveCountry(
        string $countryCode,
        ?RequestOptions $requestOptions = null
    ): CountryCoverageGetCountryResponse {
        /** @var BaseResponse<CountryCoverageGetCountryResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['country_coverage/countries/%1$s', $countryCode],
            options: $requestOptions,
            convert: CountryCoverageGetCountryResponse::class,
        );

        return $response->parse();
    }
}
