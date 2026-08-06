<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AvailablePhoneNumbersRawContract;

/**
 * Number search.
 *
 * @phpstan-import-type FilterShape from \Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AvailablePhoneNumbersRawService implements AvailablePhoneNumbersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Searches the Telnyx inventory for available phone numbers. Filters support number patterns, location, number type, features, reservability, and other inventory constraints; the response includes matching numbers and search metadata.
     *
     * @param array{filter?: Filter|FilterShape}|AvailablePhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AvailablePhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AvailablePhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AvailablePhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'available_phone_numbers',
            query: $parsed,
            options: $options,
            convert: AvailablePhoneNumberListResponse::class,
        );
    }
}
