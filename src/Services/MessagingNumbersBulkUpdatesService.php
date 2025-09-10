<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
     * @param string $messagingProfileID Configure the messaging profile these phone numbers are assigned to:
     *
     * * Set this field to `""` to unassign each number from their respective messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign these numbers to that messaging profile
     * @param list<string> $numbers the list of phone numbers to update
     */
    public function create(
        $messagingProfileID,
        $numbers,
        ?RequestOptions $requestOptions = null
    ): MessagingNumbersBulkUpdateNewResponse {
        [$parsed, $options] = MessagingNumbersBulkUpdateCreateParams::parseRequest(
            ['messagingProfileID' => $messagingProfileID, 'numbers' => $numbers],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): MessagingNumbersBulkUpdateGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['messaging_numbers_bulk_updates/%1$s', $orderID],
            options: $requestOptions,
            convert: MessagingNumbersBulkUpdateGetResponse::class,
        );
    }
}
