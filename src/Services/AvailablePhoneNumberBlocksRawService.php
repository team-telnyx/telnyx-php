<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams\Filter\PhoneNumberType;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AvailablePhoneNumberBlocksRawContract;

final class AvailablePhoneNumberBlocksRawService implements AvailablePhoneNumberBlocksRawContract
{
    // @phpstan-ignore-next-line
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
     *     countryCode?: string,
     *     locality?: string,
     *     nationalDestinationCode?: string,
     *     phoneNumberType?: 'local'|'toll_free'|'mobile'|'national'|'shared_cost'|PhoneNumberType,
     *   },
     * }|AvailablePhoneNumberBlockListParams $params
     *
     * @return BaseResponse<AvailablePhoneNumberBlockListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AvailablePhoneNumberBlockListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AvailablePhoneNumberBlockListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'available_phone_number_blocks',
            query: $parsed,
            options: $options,
            convert: AvailablePhoneNumberBlockListResponse::class,
        );
    }
}
