<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateCreateParams;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateGetResponse;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingNumbersBulkUpdatesContract;

final class MessagingNumbersBulkUpdatesService implements MessagingNumbersBulkUpdatesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update the messaging profile of multiple phone numbers
     *
     * @param array{
     *   messaging_profile_id: string, numbers: list<string>
     * }|MessagingNumbersBulkUpdateCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MessagingNumbersBulkUpdateCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingNumbersBulkUpdateNewResponse {
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
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): MessagingNumbersBulkUpdateGetResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['messaging_numbers_bulk_updates/%1$s', $orderID],
            options: $requestOptions,
            convert: MessagingNumbersBulkUpdateGetResponse::class,
        );
    }
}
