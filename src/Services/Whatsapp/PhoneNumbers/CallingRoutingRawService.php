<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\CallingRoutingRawContract;
use Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingListResponse;
use Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingPatchAllParams;
use Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingPatchAllResponse;

/**
 * Manage Whatsapp phone numbers.
 *
 * @phpstan-import-type ConnectionIDShape from \Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingPatchAllParams\ConnectionID
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CallingRoutingRawService implements CallingRoutingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @return BaseResponse<CallingRoutingListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['whatsapp/phone_numbers/%1$s/calling_routing', $id],
            options: $requestOptions,
            convert: CallingRoutingListResponse::class,
        );
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
     * @param array{
     *   connectionID: ConnectionIDShape|null
     * }|CallingRoutingPatchAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallingRoutingPatchAllResponse>
     *
     * @throws APIException
     */
    public function patchAll(
        string $id,
        array|CallingRoutingPatchAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallingRoutingPatchAllParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['whatsapp/phone_numbers/%1$s/calling_routing', $id],
            body: (object) $parsed,
            options: $options,
            convert: CallingRoutingPatchAllResponse::class,
        );
    }
}
