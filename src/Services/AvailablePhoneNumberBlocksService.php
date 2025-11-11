<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AvailablePhoneNumberBlocksContract;

final class AvailablePhoneNumberBlocksService implements AvailablePhoneNumberBlocksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List available phone number blocks
     *
     * @param array{
     *   filter?: array{
     *     country_code?: string,
     *     locality?: string,
     *     national_destination_code?: string,
     *     phone_number_type?: "local"|"toll_free"|"mobile"|"national"|"shared_cost",
     *   },
     * }|AvailablePhoneNumberBlockListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|AvailablePhoneNumberBlockListParams $params,
        ?RequestOptions $requestOptions = null,
    ): AvailablePhoneNumberBlockListResponse {
        [$parsed, $options] = AvailablePhoneNumberBlockListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'available_phone_number_blocks',
            query: $parsed,
            options: $options,
            convert: AvailablePhoneNumberBlockListResponse::class,
        );
    }
}
