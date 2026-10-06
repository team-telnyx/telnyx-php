<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\CallingRoutingContract;
use Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingListResponse;
use Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingPatchAllResponse;

/**
 * Manage Whatsapp phone numbers.
 *
 * @phpstan-import-type ConnectionIDShape from \Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingPatchAllParams\ConnectionID
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CallingRoutingService implements CallingRoutingContract
{
    /**
     * @api
     */
    public CallingRoutingRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CallingRoutingRawService($client);
    }

    /**
     * @api
     *
     * Retrieve the routing connection currently stored for a BYON (Bring Your Own Number) phone number: the connection that inbound WhatsApp calls to the number are delivered to.
     *
     * Use it to check the result of `PATCH /whatsapp/phone_numbers/{id}/calling_routing`. A read made immediately after an update can still return the previous value.
     *
     * Sub-users need read permission on connections.
     *
     * @param string $id The BYON phone number in E.164 format. The leading `+` is optional.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CallingRoutingListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set or clear the connection that inbound WhatsApp calls to a BYON (Bring Your Own Number) phone number are delivered to.
     *
     * The update is processed asynchronously. A `202` response means the request was accepted, not that the routing changed. Check the result with `GET /whatsapp/phone_numbers/{id}/calling_routing`, which can return the previous value immediately after an update. An update for a number that is not a WhatsApp Calling number in the account returns 404.
     *
     * The connection must belong to the same account and must not be a WhatsApp connection. Send `connection_id: null` to clear the routing; omitting `connection_id` is rejected. Numbers active on Telnyx are rejected, because they route through their own connection assignment.
     *
     * Sub-users need update permission on connections, and read permission to check the result with `GET`.
     *
     * @param string $id The BYON phone number in E.164 format. The leading `+` is optional.
     * @param ConnectionIDShape|null $connectionID ID of the connection to deliver inbound WhatsApp calls to: a positive integer up to 9223372036854775807, sent as a decimal string or an integer. Send a string to keep large IDs exact. Non-null values are returned as strings. `null` clears the routing.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function patchAll(
        string $id,
        string|int|null $connectionID,
        RequestOptions|array|null $requestOptions = null,
    ): CallingRoutingPatchAllResponse {
        $params = array_filter(
            ['connectionID' => $connectionID ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->patchAll($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
