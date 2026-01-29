<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams\Filter;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AvailablePhoneNumberBlocksRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   filter?: Filter|FilterShape
     * }|AvailablePhoneNumberBlockListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AvailablePhoneNumberBlockListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AvailablePhoneNumberBlockListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
