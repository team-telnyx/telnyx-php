<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangupWebhookEvent\Data;

use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload\CallQualityStats;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload\HangupCause;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload\HangupSource;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload\State;

/**
 * @phpstan-type payload_alias = array{
 *   callControlID?: string,
 *   callLegID?: string,
 *   callQualityStats?: CallQualityStats|null,
 *   callSessionID?: string,
 *   clientState?: string,
 *   connectionID?: string,
 *   customHeaders?: list<CustomSipHeader>,
 *   from?: string,
 *   hangupCause?: value-of<HangupCause>,
 *   hangupSource?: value-of<HangupSource>,
 *   sipHangupCause?: string,
 *   sipHeaders?: list<SipHeader>,
 *   startTime?: \DateTimeInterface,
 *   state?: value-of<State>,
 *   tags?: list<string>,
 *   to?: string,
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
     * Call quality statistics aggregated from the CHANNEL_HANGUP_COMPLETE event. Only includes metrics that are available (filters out nil values). Returns nil if no metrics are available.
     */
    #[Api('call_quality_stats', nullable: true, optional: true)]
    public ?CallQualityStats $callQualityStats;

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
     * Custom headers set on answer command.
     *
     * @var list<CustomSipHeader>|null $customHeaders
     */
    #[Api('custom_headers', list: CustomSipHeader::class, optional: true)]
    public ?array $customHeaders;

    /**
     * Number or SIP URI placing the call.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The reason the call was ended (`call_rejected`, `normal_clearing`, `originator_cancel`, `timeout`, `time_limit`, `user_busy`, `not_found` or `unspecified`).
     *
     * @var value-of<HangupCause>|null $hangupCause
     */
    #[Api('hangup_cause', enum: HangupCause::class, optional: true)]
    public ?string $hangupCause;

    /**
     * The party who ended the call (`callee`, `caller`, `unknown`).
     *
     * @var value-of<HangupSource>|null $hangupSource
     */
    #[Api('hangup_source', enum: HangupSource::class, optional: true)]
    public ?string $hangupSource;

    /**
     * The reason the call was ended (SIP response code). If the SIP response is unavailable (in inbound calls for example) this is set to `unspecified`.
     */
    #[Api('sip_hangup_cause', optional: true)]
    public ?string $sipHangupCause;

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
     * @param HangupCause|value-of<HangupCause> $hangupCause
     * @param HangupSource|value-of<HangupSource> $hangupSource
     * @param list<SipHeader> $sipHeaders
     * @param State|value-of<State> $state
     * @param list<string> $tags
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?CallQualityStats $callQualityStats = null,
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
        $obj = new self;

        null !== $callControlID && $obj->callControlID = $callControlID;
        null !== $callLegID && $obj->callLegID = $callLegID;
        null !== $callQualityStats && $obj->callQualityStats = $callQualityStats;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $customHeaders && $obj->customHeaders = $customHeaders;
        null !== $from && $obj->from = $from;
        null !== $hangupCause && $obj['hangupCause'] = $hangupCause;
        null !== $hangupSource && $obj['hangupSource'] = $hangupSource;
        null !== $sipHangupCause && $obj->sipHangupCause = $sipHangupCause;
        null !== $sipHeaders && $obj->sipHeaders = $sipHeaders;
        null !== $startTime && $obj->startTime = $startTime;
        null !== $state && $obj['state'] = $state;
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
     * Call quality statistics aggregated from the CHANNEL_HANGUP_COMPLETE event. Only includes metrics that are available (filters out nil values). Returns nil if no metrics are available.
     */
    public function withCallQualityStats(
        ?CallQualityStats $callQualityStats
    ): self {
        $obj = clone $this;
        $obj->callQualityStats = $callQualityStats;

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
     * Custom headers set on answer command.
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
     * Number or SIP URI placing the call.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

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
        $obj['hangupCause'] = $hangupCause;

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
        $obj['hangupSource'] = $hangupSource;

        return $obj;
    }

    /**
     * The reason the call was ended (SIP response code). If the SIP response is unavailable (in inbound calls for example) this is set to `unspecified`.
     */
    public function withSipHangupCause(string $sipHangupCause): self
    {
        $obj = clone $this;
        $obj->sipHangupCause = $sipHangupCause;

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
