<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateGetResponse;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingNumbersBulkUpdatesContract;

final class MessagingNumbersBulkUpdatesService implements MessagingNumbersBulkUpdatesContract
{
    /**
     * @api
     */
    public MessagingNumbersBulkUpdatesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagingNumbersBulkUpdatesRawService($client);
    }

    /**
     * @api
     *
     * Bulk update phone number profiles
     *
     * @param string $messagingProfileID Configure the messaging profile these phone numbers are assigned to:
     *
     * * Set this field to `""` to unassign each number from their respective messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign these numbers to that messaging profile
     * @param list<string> $numbers the list of phone numbers to update
     *
     * @throws APIException
     */
    public function create(
        string $messagingProfileID,
        array $numbers,
        ?RequestOptions $requestOptions = null,
    ): MessagingNumbersBulkUpdateNewResponse {
        $params = Util::removeNulls(
            ['messagingProfileID' => $messagingProfileID, 'numbers' => $numbers]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve bulk update status
     *
     * @param string $orderID order ID to verify bulk update status
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): MessagingNumbersBulkUpdateGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($orderID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
