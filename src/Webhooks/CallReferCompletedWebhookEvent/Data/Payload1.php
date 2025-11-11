<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallReferCompletedWebhookEvent\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PayloadShape = array{
 *   call_control_id?: string|null,
 *   call_leg_id?: string|null,
 *   call_session_id?: string|null,
 *   client_state?: string|null,
 *   connection_id?: string|null,
 *   from?: string|null,
 *   sip_notify_response?: int|null,
 *   to?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Unique ID for controlling the call.
     */
    #[Api(optional: true)]
    public ?string $call_control_id;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Api(optional: true)]
    public ?string $call_leg_id;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api(optional: true)]
    public ?string $call_session_id;

    /**
     * State received from a command.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * Number or SIP URI placing the call.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * SIP NOTIFY event status for tracking the REFER attempt.
     */
    #[Api(optional: true)]
    public ?int $sip_notify_response;

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
        ?string $call_control_id = null,
        ?string $call_leg_id = null,
        ?string $call_session_id = null,
        ?string $client_state = null,
        ?string $connection_id = null,
        ?string $from = null,
        ?int $sip_notify_response = null,
        ?string $to = null,
    ): self {
        $obj = new self;

        null !== $call_control_id && $obj->call_control_id = $call_control_id;
        null !== $call_leg_id && $obj->call_leg_id = $call_leg_id;
        null !== $call_session_id && $obj->call_session_id = $call_session_id;
        null !== $client_state && $obj->client_state = $client_state;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $from && $obj->from = $from;
        null !== $sip_notify_response && $obj->sip_notify_response = $sip_notify_response;
        null !== $to && $obj->to = $to;

        return $obj;
    }

    /**
     * Unique ID for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->call_control_id = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->call_leg_id = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->call_session_id = $callSessionID;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

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
        $obj->sip_notify_response = $sipNotifyResponse;

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
