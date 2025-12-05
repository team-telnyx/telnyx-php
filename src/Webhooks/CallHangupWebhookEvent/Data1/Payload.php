<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangupWebhookEvent\Data1;

use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SipHeader\Name;
use Telnyx\Core\Attributes\Api;
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
 *   call_control_id?: string|null,
 *   call_leg_id?: string|null,
 *   call_quality_stats?: CallQualityStats|null,
 *   call_session_id?: string|null,
 *   client_state?: string|null,
 *   connection_id?: string|null,
 *   custom_headers?: list<CustomSipHeader>|null,
 *   from?: string|null,
 *   hangup_cause?: value-of<HangupCause>|null,
 *   hangup_source?: value-of<HangupSource>|null,
 *   sip_hangup_cause?: string|null,
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
     * Call quality statistics aggregated from the CHANNEL_HANGUP_COMPLETE event. Only includes metrics that are available (filters out nil values). Returns nil if no metrics are available.
     */
    #[Api(nullable: true, optional: true)]
    public ?CallQualityStats $call_quality_stats;

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
     * Custom headers set on answer command.
     *
     * @var list<CustomSipHeader>|null $custom_headers
     */
    #[Api(list: CustomSipHeader::class, optional: true)]
    public ?array $custom_headers;

    /**
     * Number or SIP URI placing the call.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The reason the call was ended (`call_rejected`, `normal_clearing`, `originator_cancel`, `timeout`, `time_limit`, `user_busy`, `not_found` or `unspecified`).
     *
     * @var value-of<HangupCause>|null $hangup_cause
     */
    #[Api(enum: HangupCause::class, optional: true)]
    public ?string $hangup_cause;

    /**
     * The party who ended the call (`callee`, `caller`, `unknown`).
     *
     * @var value-of<HangupSource>|null $hangup_source
     */
    #[Api(enum: HangupSource::class, optional: true)]
    public ?string $hangup_source;

    /**
     * The reason the call was ended (SIP response code). If the SIP response is unavailable (in inbound calls for example) this is set to `unspecified`.
     */
    #[Api(optional: true)]
    public ?string $sip_hangup_cause;

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
     * @param CallQualityStats|array{
     *   inbound?: Inbound|null, outbound?: Outbound|null
     * }|null $call_quality_stats
     * @param list<CustomSipHeader|array{name: string, value: string}> $custom_headers
     * @param HangupCause|value-of<HangupCause> $hangup_cause
     * @param HangupSource|value-of<HangupSource> $hangup_source
     * @param list<SipHeader|array{name: value-of<Name>, value: string}> $sip_headers
     * @param State|value-of<State> $state
     * @param list<string> $tags
     */
    public static function with(
        ?string $call_control_id = null,
        ?string $call_leg_id = null,
        CallQualityStats|array|null $call_quality_stats = null,
        ?string $call_session_id = null,
        ?string $client_state = null,
        ?string $connection_id = null,
        ?array $custom_headers = null,
        ?string $from = null,
        HangupCause|string|null $hangup_cause = null,
        HangupSource|string|null $hangup_source = null,
        ?string $sip_hangup_cause = null,
        ?array $sip_headers = null,
        ?\DateTimeInterface $start_time = null,
        State|string|null $state = null,
        ?array $tags = null,
        ?string $to = null,
    ): self {
        $obj = new self;

        null !== $call_control_id && $obj['call_control_id'] = $call_control_id;
        null !== $call_leg_id && $obj['call_leg_id'] = $call_leg_id;
        null !== $call_quality_stats && $obj['call_quality_stats'] = $call_quality_stats;
        null !== $call_session_id && $obj['call_session_id'] = $call_session_id;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $custom_headers && $obj['custom_headers'] = $custom_headers;
        null !== $from && $obj['from'] = $from;
        null !== $hangup_cause && $obj['hangup_cause'] = $hangup_cause;
        null !== $hangup_source && $obj['hangup_source'] = $hangup_source;
        null !== $sip_hangup_cause && $obj['sip_hangup_cause'] = $sip_hangup_cause;
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
     * Call quality statistics aggregated from the CHANNEL_HANGUP_COMPLETE event. Only includes metrics that are available (filters out nil values). Returns nil if no metrics are available.
     *
     * @param CallQualityStats|array{
     *   inbound?: Inbound|null, outbound?: Outbound|null
     * }|null $callQualityStats
     */
    public function withCallQualityStats(
        CallQualityStats|array|null $callQualityStats
    ): self {
        $obj = clone $this;
        $obj['call_quality_stats'] = $callQualityStats;

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
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * Custom headers set on answer command.
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
     * Number or SIP URI placing the call.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * The reason the call was ended (`call_rejected`, `normal_clearing`, `originator_cancel`, `timeout`, `time_limit`, `user_busy`, `not_found` or `unspecified`).
     *
     * @param HangupCause|value-of<HangupCause> $hangupCause
     */
    public function withHangupCause(HangupCause|string $hangupCause): self
    {
        $obj = clone $this;
        $obj['hangup_cause'] = $hangupCause;

        return $obj;
    }

    /**
     * The party who ended the call (`callee`, `caller`, `unknown`).
     *
     * @param HangupSource|value-of<HangupSource> $hangupSource
     */
    public function withHangupSource(HangupSource|string $hangupSource): self
    {
        $obj = clone $this;
        $obj['hangup_source'] = $hangupSource;

        return $obj;
    }

    /**
     * The reason the call was ended (SIP response code). If the SIP response is unavailable (in inbound calls for example) this is set to `unspecified`.
     */
    public function withSipHangupCause(string $sipHangupCause): self
    {
        $obj = clone $this;
        $obj['sip_hangup_cause'] = $sipHangupCause;

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
