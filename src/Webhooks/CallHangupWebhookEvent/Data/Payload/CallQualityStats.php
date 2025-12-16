<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload\CallQualityStats\Inbound;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload\CallQualityStats\Outbound;

/**
 * Call quality statistics aggregated from the CHANNEL_HANGUP_COMPLETE event. Only includes metrics that are available (filters out nil values). Returns nil if no metrics are available.
 *
 * @phpstan-import-type InboundShape from \Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload\CallQualityStats\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload\CallQualityStats\Outbound
 *
 * @phpstan-type CallQualityStatsShape = array{
 *   inbound?: null|Inbound|InboundShape, outbound?: null|Outbound|OutboundShape
 * }
 */
final class CallQualityStats implements BaseModel
{
    /** @use SdkModel<CallQualityStatsShape> */
    use SdkModel;

    /**
     * Inbound call quality statistics.
     */
    #[Optional]
    public ?Inbound $inbound;

    /**
     * Outbound call quality statistics.
     */
    #[Optional]
    public ?Outbound $outbound;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InboundShape $inbound
     * @param OutboundShape $outbound
     */
    public static function with(
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null
    ): self {
        $self = new self;

        null !== $inbound && $self['inbound'] = $inbound;
        null !== $outbound && $self['outbound'] = $outbound;

        return $self;
    }

    /**
     * Inbound call quality statistics.
     *
     * @param InboundShape $inbound
     */
    public function withInbound(Inbound|array $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * Outbound call quality statistics.
     *
     * @param OutboundShape $outbound
     */
    public function withOutbound(Outbound|array $outbound): self
    {
        $self = clone $this;
        $self['outbound'] = $outbound;

        return $self;
    }
}
