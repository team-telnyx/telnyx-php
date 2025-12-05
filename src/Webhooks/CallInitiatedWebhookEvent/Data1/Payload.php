<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallInitiatedWebhookEvent\Data1;

use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SipHeader\Name;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallInitiatedWebhookEvent\Data1\Payload\Direction;
use Telnyx\Webhooks\CallInitiatedWebhookEvent\Data1\Payload\State;

/**
 * @phpstan-type PayloadShape = array{
 *   call_control_id?: string|null,
 *   call_leg_id?: string|null,
 *   call_screening_result?: string|null,
 *   call_session_id?: string|null,
 *   caller_id_name?: string|null,
 *   client_state?: string|null,
 *   connection_codecs?: string|null,
 *   connection_id?: string|null,
 *   custom_headers?: list<CustomSipHeader>|null,
 *   direction?: value-of<Direction>|null,
 *   from?: string|null,
 *   offered_codecs?: string|null,
 *   shaken_stir_attestation?: string|null,
 *   shaken_stir_validated?: bool|null,
 *   sip_headers?: list<SipHeader>|null,
 *   start_time?: \DateTimeInterface|null,
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
    #[Api(optional: true)]
    public ?string $call_control_id;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Api(optional: true)]
    public ?string $call_leg_id;

    /**
     * Call screening result.
     */
    #[Api(optional: true)]
    public ?string $call_screening_result;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api(optional: true)]
    public ?string $call_session_id;

    /**
     * Caller id.
     */
    #[Api(optional: true)]
    public ?string $caller_id_name;

    /**
     * State received from a command.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * The list of comma-separated codecs enabled for the connection.
     */
    #[Api(optional: true)]
    public ?string $connection_codecs;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * Custom headers from sip invite.
     *
     * @var list<CustomSipHeader>|null $custom_headers
     */
    #[Api(list: CustomSipHeader::class, optional: true)]
    public ?array $custom_headers;

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
    #[Api(optional: true)]
    public ?string $offered_codecs;

    /**
     * SHAKEN/STIR attestation level.
     */
    #[Api(optional: true)]
    public ?string $shaken_stir_attestation;

    /**
     * Whether attestation was successfully validated or not.
     */
    #[Api(optional: true)]
    public ?bool $shaken_stir_validated;

    /**
     * User-to-User and Diversion headers from sip invite.
     *
     * @var list<SipHeader>|null $sip_headers
     */
    #[Api(list: SipHeader::class, optional: true)]
    public ?array $sip_headers;

    /**
     * ISO 8601 datetime of when the call started.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $start_time;

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
     * @param list<CustomSipHeader|array{name: string, value: string}> $custom_headers
     * @param Direction|value-of<Direction> $direction
     * @param list<SipHeader|array{name: value-of<Name>, value: string}> $sip_headers
     * @param State|value-of<State> $state
     * @param list<string> $tags
     */
    public static function with(
        ?string $call_control_id = null,
        ?string $call_leg_id = null,
        ?string $call_screening_result = null,
        ?string $call_session_id = null,
        ?string $caller_id_name = null,
        ?string $client_state = null,
        ?string $connection_codecs = null,
        ?string $connection_id = null,
        ?array $custom_headers = null,
        Direction|string|null $direction = null,
        ?string $from = null,
        ?string $offered_codecs = null,
        ?string $shaken_stir_attestation = null,
        ?bool $shaken_stir_validated = null,
        ?array $sip_headers = null,
        ?\DateTimeInterface $start_time = null,
        State|string|null $state = null,
        ?array $tags = null,
        ?string $to = null,
    ): self {
        $obj = new self;

        null !== $call_control_id && $obj['call_control_id'] = $call_control_id;
        null !== $call_leg_id && $obj['call_leg_id'] = $call_leg_id;
        null !== $call_screening_result && $obj['call_screening_result'] = $call_screening_result;
        null !== $call_session_id && $obj['call_session_id'] = $call_session_id;
        null !== $caller_id_name && $obj['caller_id_name'] = $caller_id_name;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $connection_codecs && $obj['connection_codecs'] = $connection_codecs;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $custom_headers && $obj['custom_headers'] = $custom_headers;
        null !== $direction && $obj['direction'] = $direction;
        null !== $from && $obj['from'] = $from;
        null !== $offered_codecs && $obj['offered_codecs'] = $offered_codecs;
        null !== $shaken_stir_attestation && $obj['shaken_stir_attestation'] = $shaken_stir_attestation;
        null !== $shaken_stir_validated && $obj['shaken_stir_validated'] = $shaken_stir_validated;
        null !== $sip_headers && $obj['sip_headers'] = $sip_headers;
        null !== $start_time && $obj['start_time'] = $start_time;
        null !== $state && $obj['state'] = $state;
        null !== $tags && $obj['tags'] = $tags;
        null !== $to && $obj['to'] = $to;

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
     * Call screening result.
     */
    public function withCallScreeningResult(string $callScreeningResult): self
    {
        $obj = clone $this;
        $obj['call_screening_result'] = $callScreeningResult;

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
     * Caller id.
     */
    public function withCallerIDName(string $callerIDName): self
    {
        $obj = clone $this;
        $obj['caller_id_name'] = $callerIDName;

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
     * The list of comma-separated codecs enabled for the connection.
     */
    public function withConnectionCodecs(string $connectionCodecs): self
    {
        $obj = clone $this;
        $obj['connection_codecs'] = $connectionCodecs;

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
     * Custom headers from sip invite.
     *
     * @param list<CustomSipHeader|array{name: string, value: string}> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $obj = clone $this;
        $obj['custom_headers'] = $customHeaders;

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
        $obj['direction'] = $direction;

        return $obj;
    }

    /**
     * Number or SIP URI placing the call.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * The list of comma-separated codecs offered by caller.
     */
    public function withOfferedCodecs(string $offeredCodecs): self
    {
        $obj = clone $this;
        $obj['offered_codecs'] = $offeredCodecs;

        return $obj;
    }

    /**
     * SHAKEN/STIR attestation level.
     */
    public function withShakenStirAttestation(
        string $shakenStirAttestation
    ): self {
        $obj = clone $this;
        $obj['shaken_stir_attestation'] = $shakenStirAttestation;

        return $obj;
    }

    /**
     * Whether attestation was successfully validated or not.
     */
    public function withShakenStirValidated(bool $shakenStirValidated): self
    {
        $obj = clone $this;
        $obj['shaken_stir_validated'] = $shakenStirValidated;

        return $obj;
    }

    /**
     * User-to-User and Diversion headers from sip invite.
     *
     * @param list<SipHeader|array{name: value-of<Name>, value: string}> $sipHeaders
     */
    public function withSipHeaders(array $sipHeaders): self
    {
        $obj = clone $this;
        $obj['sip_headers'] = $sipHeaders;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when the call started.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj['start_time'] = $startTime;

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
        $obj['state'] = $state;

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
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * Destination number or SIP URI of the call.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }
}
