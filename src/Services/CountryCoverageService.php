<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     * @return CountryCoverageGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): CountryCoverageGetResponse {
        $params = [];

        return $this->retrieveRaw($params, $requestOptions);
    }

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
    ): CountryCoverageGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'country_coverage',
            options: $requestOptions,
            convert: CountryCoverageGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get coverage for a specific country
     *
     * @return CountryCoverageGetCountryResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveCountry(
        string $countryCode,
        ?RequestOptions $requestOptions = null
    ): CountryCoverageGetCountryResponse {
        $params = [];

        return $this->retrieveCountryRaw($countryCode, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): CountryCoverageGetCountryResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['country_coverage/countries/%1$s', $countryCode],
            options: $requestOptions,
            convert: CountryCoverageGetCountryResponse::class,
        );
    }
}
