<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangupWebhookEvent\Data1;

use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SipHeader\Name;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data1\Payload\CallQualityStats;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data1\Payload\CallQualityStats\Inbound;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data1\Payload\CallQualityStats\Outbound;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data1\Payload\HangupCause;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data1\Payload\HangupSource;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data1\Payload\State;

/**
 * @phpstan-type PayloadShape = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callQualityStats?: CallQualityStats|null,
 *   callSessionID?: string|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   customHeaders?: list<CustomSipHeader>|null,
 *   from?: string|null,
 *   hangupCause?: value-of<HangupCause>|null,
 *   hangupSource?: value-of<HangupSource>|null,
 *   sipHangupCause?: string|null,
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
     * Call quality statistics aggregated from the CHANNEL_HANGUP_COMPLETE event. Only includes metrics that are available (filters out nil values). Returns nil if no metrics are available.
     */
    #[Optional('call_quality_stats', nullable: true)]
    public ?CallQualityStats $callQualityStats;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * State received from a command.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Custom headers set on answer command.
     *
     * @var list<CustomSipHeader>|null $customHeaders
     */
    #[Optional('custom_headers', list: CustomSipHeader::class)]
    public ?array $customHeaders;

    /**
     * Number or SIP URI placing the call.
     */
    #[Optional]
    public ?string $from;

    /**
     * The reason the call was ended (`call_rejected`, `normal_clearing`, `originator_cancel`, `timeout`, `time_limit`, `user_busy`, `not_found` or `unspecified`).
     *
     * @var value-of<HangupCause>|null $hangupCause
     */
    #[Optional('hangup_cause', enum: HangupCause::class)]
    public ?string $hangupCause;

    /**
     * The party who ended the call (`callee`, `caller`, `unknown`).
     *
     * @var value-of<HangupSource>|null $hangupSource
     */
    #[Optional('hangup_source', enum: HangupSource::class)]
    public ?string $hangupSource;

    /**
     * The reason the call was ended (SIP response code). If the SIP response is unavailable (in inbound calls for example) this is set to `unspecified`.
     */
    #[Optional('sip_hangup_cause')]
    public ?string $sipHangupCause;

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
     * @param CallQualityStats|array{
     *   inbound?: Inbound|null, outbound?: Outbound|null
     * }|null $callQualityStats
     * @param list<CustomSipHeader|array{name: string, value: string}> $customHeaders
     * @param HangupCause|value-of<HangupCause> $hangupCause
     * @param HangupSource|value-of<HangupSource> $hangupSource
     * @param list<SipHeader|array{name: value-of<Name>, value: string}> $sipHeaders
     * @param State|value-of<State> $state
     * @param list<string> $tags
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callLegID = null,
        CallQualityStats|array|null $callQualityStats = null,
        ?string $callSessionID = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ?array $customHeaders = null,
        ?string $from = null,
        HangupCause|string|null $hangupCause = null,
        HangupSource|string|null $hangupSource = null,
        ?string $sipHangupCause = null,
        ?array $sipHeaders = null,
        ?\DateTimeInterface $startTime = null,
        State|string|null $state = null,
        ?array $tags = null,
        ?string $to = null,
    ): self {
        $self = new self;

        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callQualityStats && $self['callQualityStats'] = $callQualityStats;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
        null !== $from && $self['from'] = $from;
        null !== $hangupCause && $self['hangupCause'] = $hangupCause;
        null !== $hangupSource && $self['hangupSource'] = $hangupSource;
        null !== $sipHangupCause && $self['sipHangupCause'] = $sipHangupCause;
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
     * Call quality statistics aggregated from the CHANNEL_HANGUP_COMPLETE event. Only includes metrics that are available (filters out nil values). Returns nil if no metrics are available.
     *
     * @param CallQualityStats|array{
     *   inbound?: Inbound|null, outbound?: Outbound|null
     * }|null $callQualityStats
     */
    public function withCallQualityStats(
        CallQualityStats|array|null $callQualityStats
    ): self {
        $self = clone $this;
        $self['callQualityStats'] = $callQualityStats;

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
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

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
     * Custom headers set on answer command.
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
     * Number or SIP URI placing the call.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The reason the call was ended (`call_rejected`, `normal_clearing`, `originator_cancel`, `timeout`, `time_limit`, `user_busy`, `not_found` or `unspecified`).
     *
     * @param HangupCause|value-of<HangupCause> $hangupCause
     */
    public function withHangupCause(HangupCause|string $hangupCause): self
    {
        $self = clone $this;
        $self['hangupCause'] = $hangupCause;

        return $self;
    }

    /**
     * The party who ended the call (`callee`, `caller`, `unknown`).
     *
     * @param HangupSource|value-of<HangupSource> $hangupSource
     */
    public function withHangupSource(HangupSource|string $hangupSource): self
    {
        $self = clone $this;
        $self['hangupSource'] = $hangupSource;

        return $self;
    }

    /**
     * The reason the call was ended (SIP response code). If the SIP response is unavailable (in inbound calls for example) this is set to `unspecified`.
     */
    public function withSipHangupCause(string $sipHangupCause): self
    {
        $self = clone $this;
        $self['sipHangupCause'] = $sipHangupCause;

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
