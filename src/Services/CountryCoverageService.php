<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CountryCoverage\CountryCoverageGetCountryResponse;
use Telnyx\CountryCoverage\CountryCoverageGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CountryCoverageContract;

/**
 * Country Coverage.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CountryCoverageService implements CountryCoverageContract
{
    /**
     * @api
     */
    public CountryCoverageRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CountryCoverageRawService($client);
    }

    /**
     * @api
     *
     * Get country coverage
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): CountryCoverageGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get coverage for a specific country
     *
     * @param string $countryCode country ISO code
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveCountry(
        string $countryCode,
        RequestOptions|array|null $requestOptions = null
    ): CountryCoverageGetCountryResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveCountry($countryCode, requestOptions: $requestOptions);

        return $response->parse();
    }
}
