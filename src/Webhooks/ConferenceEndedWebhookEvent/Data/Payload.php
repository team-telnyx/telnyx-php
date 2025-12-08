<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceEndedWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\ConferenceEndedWebhookEvent\Data\Payload\Reason;

/**
 * @phpstan-type PayloadShape = array{
 *   call_control_id?: string|null,
 *   call_leg_id?: string|null,
 *   call_session_id?: string|null,
 *   client_state?: string|null,
 *   conference_id?: string|null,
 *   connection_id?: string|null,
 *   occurred_at?: \DateTimeInterface|null,
 *   reason?: value-of<Reason>|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Optional]
    public ?string $call_control_id;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Optional]
    public ?string $call_leg_id;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Optional]
    public ?string $call_session_id;

    /**
     * State received from a command.
     */
    #[Optional]
    public ?string $client_state;

    /**
     * Conference ID that the participant joined.
     */
    #[Optional]
    public ?string $conference_id;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional]
    public ?string $connection_id;

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    #[Optional]
    public ?\DateTimeInterface $occurred_at;

    /**
     * Reason the conference ended.
     *
     * @var value-of<Reason>|null $reason
     */
    #[Optional(enum: Reason::class)]
    public ?string $reason;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Reason|value-of<Reason> $reason
     */
    public static function with(
        ?string $call_control_id = null,
        ?string $call_leg_id = null,
        ?string $call_session_id = null,
        ?string $client_state = null,
        ?string $conference_id = null,
        ?string $connection_id = null,
        ?\DateTimeInterface $occurred_at = null,
        Reason|string|null $reason = null,
    ): self {
        $obj = new self;

        null !== $call_control_id && $obj['call_control_id'] = $call_control_id;
        null !== $call_leg_id && $obj['call_leg_id'] = $call_leg_id;
        null !== $call_session_id && $obj['call_session_id'] = $call_session_id;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $conference_id && $obj['conference_id'] = $conference_id;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $occurred_at && $obj['occurred_at'] = $occurred_at;
        null !== $reason && $obj['reason'] = $reason;

        return $obj;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj['call_control_id'] = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['call_leg_id'] = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['call_session_id'] = $callSessionID;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

        return $obj;
    }

    /**
     * Conference ID that the participant joined.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $obj = clone $this;
        $obj['conference_id'] = $conferenceID;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj['occurred_at'] = $occurredAt;

        return $obj;
    }

    /**
     * Reason the conference ended.
     *
     * @param Reason|value-of<Reason> $reason
     */
    public function withReason(Reason|string $reason): self
    {
        $obj = clone $this;
        $obj['reason'] = $reason;

        return $obj;
    }
}
