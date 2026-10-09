<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\CallingRouting;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Set or clear the connection that inbound WhatsApp calls to a BYON (Bring Your Own Number) phone number are delivered to.
 *
 * The update is processed asynchronously. A `202` response means the request was accepted, not that the routing changed. Check the result with `GET /whatsapp/phone_numbers/{id}/calling_routing`, which can return the previous value immediately after an update. An update for a number that is not a WhatsApp Calling number in the account returns 404.
 *
 * The connection must belong to the same account and must not be a WhatsApp connection. Send `connection_id: null` to clear the routing; omitting `connection_id` is rejected. Numbers active on Telnyx are rejected, because they route through their own connection assignment.
 *
 * Sub-users need update permission on connections, and read permission to check the result with `GET`.
 *
 * @see Telnyx\Services\Whatsapp\PhoneNumbers\CallingRoutingService::patchAll()
 *
 * @phpstan-import-type ConnectionIDVariants from \Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingPatchAllParams\ConnectionID
 * @phpstan-import-type ConnectionIDShape from \Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingPatchAllParams\ConnectionID
 *
 * @phpstan-type CallingRoutingPatchAllParamsShape = array{
 *   connectionID: ConnectionIDShape|null
 * }
 */
final class CallingRoutingPatchAllParams implements BaseModel
{
    /** @use SdkModel<CallingRoutingPatchAllParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the connection to deliver inbound WhatsApp calls to: a positive integer up to 9223372036854775807, sent as a decimal string or an integer. Send a string to keep large IDs exact. Non-null values are returned as strings. `null` clears the routing.
     *
     * @var ConnectionIDVariants|null $connectionID
     */
    #[Required('connection_id')]
    public string|int|null $connectionID;

    /**
     * `new CallingRoutingPatchAllParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallingRoutingPatchAllParams::with(connectionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallingRoutingPatchAllParams)->withConnectionID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConnectionIDShape|null $connectionID
     */
    public static function with(string|int|null $connectionID): self
    {
        $self = new self;

        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * ID of the connection to deliver inbound WhatsApp calls to: a positive integer up to 9223372036854775807, sent as a decimal string or an integer. Send a string to keep large IDs exact. Non-null values are returned as strings. `null` clears the routing.
     *
     * @param ConnectionIDShape|null $connectionID
     */
    public function withConnectionID(string|int|null $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }
}
