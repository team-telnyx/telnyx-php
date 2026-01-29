<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateCreateParams;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateGetResponse;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingNumbersBulkUpdatesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingNumbersBulkUpdatesRawService implements MessagingNumbersBulkUpdatesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Bulk update phone number profiles
     *
     * @param array{
     *   messagingProfileID: string, numbers: list<string>
     * }|MessagingNumbersBulkUpdateCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingNumbersBulkUpdateNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessagingNumbersBulkUpdateCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingNumbersBulkUpdateCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messaging_numbers_bulk_updates',
            body: (object) $parsed,
            options: $options,
            convert: MessagingNumbersBulkUpdateNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve bulk update status
     *
     * @param string $orderID order ID to verify bulk update status
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingNumbersBulkUpdateGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['messaging_numbers_bulk_updates/%1$s', $orderID],
            options: $requestOptions,
            convert: MessagingNumbersBulkUpdateGetResponse::class,
        );
    }
}
