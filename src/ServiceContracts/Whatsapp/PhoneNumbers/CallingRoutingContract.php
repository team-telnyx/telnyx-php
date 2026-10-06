<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingListResponse;
use Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingPatchAllResponse;

/**
 * @phpstan-import-type ConnectionIDShape from \Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingPatchAllParams\ConnectionID
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallingRoutingContract
{
    /**
     * @api
     *
     * @param string $id The BYON phone number in E.164 format. The leading `+` is optional.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CallingRoutingListResponse;

    /**
     * @api
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
    ): CallingRoutingPatchAllResponse;
}
