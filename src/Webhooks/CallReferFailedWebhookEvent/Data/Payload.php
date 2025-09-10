<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallReferFailedWebhookEvent\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type payload_alias = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   from?: string|null,
 *   sipNotifyResponse?: int|null,
 *   to?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<payload_alias> */
    use SdkModel;

    /**
     * Unique ID for controlling the call.
     */
    #[Api('call_control_id', optional: true)]
    public ?string $callControlID;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Api('call_leg_id', optional: true)]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api('call_session_id', optional: true)]
    public ?string $callSessionID;

    /**
     * State received from a command.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * Number or SIP URI placing the call.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * SIP NOTIFY event status for tracking the REFER attempt.
     */
    #[Api('sip_notify_response', optional: true)]
    public ?int $sipNotifyResponse;

    /**
     * Destination number or SIP URI of the call.
     */
    #[Api(optional: true)]
    public ?string $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ?string $from = null,
        ?int $sipNotifyResponse = null,
        ?string $to = null,
    ): self {
        $obj = new self;

        null !== $callControlID && $obj->callControlID = $callControlID;
        null !== $callLegID && $obj->callLegID = $callLegID;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $from && $obj->from = $from;
        null !== $sipNotifyResponse && $obj->sipNotifyResponse = $sipNotifyResponse;
        null !== $to && $obj->to = $to;

        return $obj;
    }

    /**
     * Unique ID for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->callControlID = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->callLegID = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->callSessionID = $callSessionID;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * Number or SIP URI placing the call.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * SIP NOTIFY event status for tracking the REFER attempt.
     */
    public function withSipNotifyResponse(int $sipNotifyResponse): self
    {
        $obj = clone $this;
        $obj->sipNotifyResponse = $sipNotifyResponse;

        return $obj;
    }

    /**
     * Destination number or SIP URI of the call.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
