<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
     */
    public function retrieve(
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
     */
    public function retrieveCountry(
        string $countryCode,
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
