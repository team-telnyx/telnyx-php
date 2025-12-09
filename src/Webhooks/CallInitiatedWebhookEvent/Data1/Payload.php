<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallInitiatedWebhookEvent\Data1;

use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SipHeader\Name;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallInitiatedWebhookEvent\Data1\Payload\Direction;
use Telnyx\Webhooks\CallInitiatedWebhookEvent\Data1\Payload\State;

/**
 * @phpstan-type PayloadShape = array{
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
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Optional('call_control_id')]
    public ?string $callControlID;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * Call screening result.
     */
    #[Optional('call_screening_result')]
    public ?string $callScreeningResult;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * Caller id.
     */
    #[Optional('caller_id_name')]
    public ?string $callerIDName;

    /**
     * State received from a command.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * The list of comma-separated codecs enabled for the connection.
     */
    #[Optional('connection_codecs')]
    public ?string $connectionCodecs;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Custom headers from sip invite.
     *
     * @var list<CustomSipHeader>|null $customHeaders
     */
    #[Optional('custom_headers', list: CustomSipHeader::class)]
    public ?array $customHeaders;

    /**
     * Whether the call is `incoming` or `outgoing`.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Optional(enum: Direction::class)]
    public ?string $direction;

    /**
     * Number or SIP URI placing the call.
     */
    #[Optional]
    public ?string $from;

    /**
     * The list of comma-separated codecs offered by caller.
     */
    #[Optional('offered_codecs')]
    public ?string $offeredCodecs;

    /**
     * SHAKEN/STIR attestation level.
     */
    #[Optional('shaken_stir_attestation')]
    public ?string $shakenStirAttestation;

    /**
     * Whether attestation was successfully validated or not.
     */
    #[Optional('shaken_stir_validated')]
    public ?bool $shakenStirValidated;

    /**
     * User-to-User and Diversion headers from sip invite.
     *
     * @var list<SipHeader>|null $sipHeaders
     */
    #[Optional('sip_headers', list: SipHeader::class)]
    public ?array $sipHeaders;

    /**
     * ISO 8601 datetime of when the call started.
     */
    #[Optional('start_time')]
    public ?\DateTimeInterface $startTime;

    /**
     * State received from a command.
     *
     * @var value-of<State>|null $state
     */
    #[Optional(enum: State::class)]
    public ?string $state;

    /**
     * Array of tags associated to number.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * Destination number or SIP URI of the call.
     */
    #[Optional]
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
     * @param list<CustomSipHeader|array{name: string, value: string}> $customHeaders
     * @param Direction|value-of<Direction> $direction
     * @param list<SipHeader|array{name: value-of<Name>, value: string}> $sipHeaders
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
        $self = new self;

        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callScreeningResult && $self['callScreeningResult'] = $callScreeningResult;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $callerIDName && $self['callerIDName'] = $callerIDName;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionCodecs && $self['connectionCodecs'] = $connectionCodecs;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
        null !== $direction && $self['direction'] = $direction;
        null !== $from && $self['from'] = $from;
        null !== $offeredCodecs && $self['offeredCodecs'] = $offeredCodecs;
        null !== $shakenStirAttestation && $self['shakenStirAttestation'] = $shakenStirAttestation;
        null !== $shakenStirValidated && $self['shakenStirValidated'] = $shakenStirValidated;
        null !== $sipHeaders && $self['sipHeaders'] = $sipHeaders;
        null !== $startTime && $self['startTime'] = $startTime;
        null !== $state && $self['state'] = $state;
        null !== $tags && $self['tags'] = $tags;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * Call screening result.
     */
    public function withCallScreeningResult(string $callScreeningResult): self
    {
        $self = clone $this;
        $self['callScreeningResult'] = $callScreeningResult;

        return $self;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * Caller id.
     */
    public function withCallerIDName(string $callerIDName): self
    {
        $self = clone $this;
        $self['callerIDName'] = $callerIDName;

        return $self;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * The list of comma-separated codecs enabled for the connection.
     */
    public function withConnectionCodecs(string $connectionCodecs): self
    {
        $self = clone $this;
        $self['connectionCodecs'] = $connectionCodecs;

        return $self;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Custom headers from sip invite.
     *
     * @param list<CustomSipHeader|array{name: string, value: string}> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $self = clone $this;
        $self['customHeaders'] = $customHeaders;

        return $self;
    }

    /**
     * Whether the call is `incoming` or `outgoing`.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    /**
     * Number or SIP URI placing the call.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The list of comma-separated codecs offered by caller.
     */
    public function withOfferedCodecs(string $offeredCodecs): self
    {
        $self = clone $this;
        $self['offeredCodecs'] = $offeredCodecs;

        return $self;
    }

    /**
     * SHAKEN/STIR attestation level.
     */
    public function withShakenStirAttestation(
        string $shakenStirAttestation
    ): self {
        $self = clone $this;
        $self['shakenStirAttestation'] = $shakenStirAttestation;

        return $self;
    }

    /**
     * Whether attestation was successfully validated or not.
     */
    public function withShakenStirValidated(bool $shakenStirValidated): self
    {
        $self = clone $this;
        $self['shakenStirValidated'] = $shakenStirValidated;

        return $self;
    }

    /**
     * User-to-User and Diversion headers from sip invite.
     *
     * @param list<SipHeader|array{name: value-of<Name>, value: string}> $sipHeaders
     */
    public function withSipHeaders(array $sipHeaders): self
    {
        $self = clone $this;
        $self['sipHeaders'] = $sipHeaders;

        return $self;
    }

    /**
     * ISO 8601 datetime of when the call started.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * State received from a command.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * Array of tags associated to number.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * Destination number or SIP URI of the call.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
