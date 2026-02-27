<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CountryCoverage\CountryCoverageGetCountryResponse;
use Telnyx\CountryCoverage\CountryCoverageGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CountryCoverageRawContract;

/**
 * Country Coverage.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CountryCoverageRawService implements CountryCoverageRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get country coverage
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CountryCoverageGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $countryCode country ISO code
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CountryCoverageGetCountryResponse>
     *
     * @throws APIException
     */
    public function retrieveCountry(
        string $countryCode,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['country_coverage/countries/%1$s', $countryCode],
            options: $requestOptions,
            convert: CountryCoverageGetCountryResponse::class,
        );
    }
}
