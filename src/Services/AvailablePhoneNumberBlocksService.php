<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams\Filter;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AvailablePhoneNumberBlocksContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[locality], filter[country_code], filter[national_destination_code], filter[phone_number_type]
     *
     * @return AvailablePhoneNumberBlockListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): AvailablePhoneNumberBlockListResponse {
        [$parsed, $options] = AvailablePhoneNumberBlockListParams::parseRequest(
            ['filter' => $filter],
            $requestOptions
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
