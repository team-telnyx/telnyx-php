<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallInitiatedWebhookEvent\Data;

use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallInitiatedWebhookEvent\Data\Payload\Direction;
use Telnyx\Webhooks\CallInitiatedWebhookEvent\Data\Payload\State;

/**
 * @phpstan-type payload_alias = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callScreeningResult?: string|null,
 *   callSessionID?: string|null,
 *   callerIDName?: string|null,
 *   clientState?: string|null,
 *   connectionCodecs?: string|null,
 *   connectionID?: string|null,
 *   customHeaders?: list<CustomSipHeader>|null,
 *   direction?: value-of<Direction>|null,
 *   from?: string|null,
 *   offeredCodecs?: string|null,
 *   shakenStirAttestation?: string|null,
 *   shakenStirValidated?: bool|null,
 *   sipHeaders?: list<SipHeader>|null,
 *   startTime?: \DateTimeInterface|null,
 *   state?: value-of<State>|null,
 *   tags?: list<string>|null,
 *   to?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<payload_alias> */
    use SdkModel;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Api('call_control_id', optional: true)]
    public ?string $callControlID;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Api('call_leg_id', optional: true)]
    public ?string $callLegID;

    /**
     * Call screening result.
     */
    #[Api('call_screening_result', optional: true)]
    public ?string $callScreeningResult;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api('call_session_id', optional: true)]
    public ?string $callSessionID;

    /**
     * Caller id.
     */
    #[Api('caller_id_name', optional: true)]
    public ?string $callerIDName;

    /**
     * State received from a command.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * The list of comma-separated codecs enabled for the connection.
     */
    #[Api('connection_codecs', optional: true)]
    public ?string $connectionCodecs;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * Custom headers from sip invite.
     *
     * @var list<CustomSipHeader>|null $customHeaders
     */
    #[Api('custom_headers', list: CustomSipHeader::class, optional: true)]
    public ?array $customHeaders;

    /**
     * Whether the call is `incoming` or `outgoing`.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Api(enum: Direction::class, optional: true)]
    public ?string $direction;

    /**
     * Number or SIP URI placing the call.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The list of comma-separated codecs offered by caller.
     */
    #[Api('offered_codecs', optional: true)]
    public ?string $offeredCodecs;

    /**
     * SHAKEN/STIR attestation level.
     */
    #[Api('shaken_stir_attestation', optional: true)]
    public ?string $shakenStirAttestation;

    /**
     * Whether attestation was successfully validated or not.
     */
    #[Api('shaken_stir_validated', optional: true)]
    public ?bool $shakenStirValidated;

    /**
     * User-to-User and Diversion headers from sip invite.
     *
     * @var list<SipHeader>|null $sipHeaders
     */
    #[Api('sip_headers', list: SipHeader::class, optional: true)]
    public ?array $sipHeaders;

    /**
     * ISO 8601 datetime of when the call started.
     */
    #[Api('start_time', optional: true)]
    public ?\DateTimeInterface $startTime;

    /**
     * State received from a command.
     *
     * @var value-of<State>|null $state
     */
    #[Api(enum: State::class, optional: true)]
    public ?string $state;

    /**
     * Array of tags associated to number.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

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
     *
     * @param list<CustomSipHeader> $customHeaders
     * @param Direction|value-of<Direction> $direction
     * @param list<SipHeader> $sipHeaders
     * @param State|value-of<State> $state
     * @param list<string> $tags
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callScreeningResult = null,
        ?string $callSessionID = null,
        ?string $callerIDName = null,
        ?string $clientState = null,
        ?string $connectionCodecs = null,
        ?string $connectionID = null,
        ?array $customHeaders = null,
        Direction|string|null $direction = null,
        ?string $from = null,
        ?string $offeredCodecs = null,
        ?string $shakenStirAttestation = null,
        ?bool $shakenStirValidated = null,
        ?array $sipHeaders = null,
        ?\DateTimeInterface $startTime = null,
        State|string|null $state = null,
        ?array $tags = null,
        ?string $to = null,
    ): self {
        $obj = new self;

        null !== $callControlID && $obj->callControlID = $callControlID;
        null !== $callLegID && $obj->callLegID = $callLegID;
        null !== $callScreeningResult && $obj->callScreeningResult = $callScreeningResult;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;
        null !== $callerIDName && $obj->callerIDName = $callerIDName;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $connectionCodecs && $obj->connectionCodecs = $connectionCodecs;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $customHeaders && $obj->customHeaders = $customHeaders;
        null !== $direction && $obj->direction = $direction instanceof Direction ? $direction->value : $direction;
        null !== $from && $obj->from = $from;
        null !== $offeredCodecs && $obj->offeredCodecs = $offeredCodecs;
        null !== $shakenStirAttestation && $obj->shakenStirAttestation = $shakenStirAttestation;
        null !== $shakenStirValidated && $obj->shakenStirValidated = $shakenStirValidated;
        null !== $sipHeaders && $obj->sipHeaders = $sipHeaders;
        null !== $startTime && $obj->startTime = $startTime;
        null !== $state && $obj->state = $state instanceof State ? $state->value : $state;
        null !== $tags && $obj->tags = $tags;
        null !== $to && $obj->to = $to;

        return $obj;
    }

    /**
     * Call ID used to issue commands via Call Control API.
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
     * Call screening result.
     */
    public function withCallScreeningResult(string $callScreeningResult): self
    {
        $obj = clone $this;
        $obj->callScreeningResult = $callScreeningResult;

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
     * Caller id.
     */
    public function withCallerIDName(string $callerIDName): self
    {
        $obj = clone $this;
        $obj->callerIDName = $callerIDName;

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
     * The list of comma-separated codecs enabled for the connection.
     */
    public function withConnectionCodecs(string $connectionCodecs): self
    {
        $obj = clone $this;
        $obj->connectionCodecs = $connectionCodecs;

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
     * Custom headers from sip invite.
     *
     * @param list<CustomSipHeader> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $obj = clone $this;
        $obj->customHeaders = $customHeaders;

        return $obj;
    }

    /**
     * Whether the call is `incoming` or `outgoing`.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $obj = clone $this;
        $obj->direction = $direction instanceof Direction ? $direction->value : $direction;

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
     * The list of comma-separated codecs offered by caller.
     */
    public function withOfferedCodecs(string $offeredCodecs): self
    {
        $obj = clone $this;
        $obj->offeredCodecs = $offeredCodecs;

        return $obj;
    }

    /**
     * SHAKEN/STIR attestation level.
     */
    public function withShakenStirAttestation(
        string $shakenStirAttestation
    ): self {
        $obj = clone $this;
        $obj->shakenStirAttestation = $shakenStirAttestation;

        return $obj;
    }

    /**
     * Whether attestation was successfully validated or not.
     */
    public function withShakenStirValidated(bool $shakenStirValidated): self
    {
        $obj = clone $this;
        $obj->shakenStirValidated = $shakenStirValidated;

        return $obj;
    }

    /**
     * User-to-User and Diversion headers from sip invite.
     *
     * @param list<SipHeader> $sipHeaders
     */
    public function withSipHeaders(array $sipHeaders): self
    {
        $obj = clone $this;
        $obj->sipHeaders = $sipHeaders;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when the call started.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * State received from a command.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $obj = clone $this;
        $obj->state = $state instanceof State ? $state->value : $state;

        return $obj;
    }

    /**
     * Array of tags associated to number.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj->tags = $tags;

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
