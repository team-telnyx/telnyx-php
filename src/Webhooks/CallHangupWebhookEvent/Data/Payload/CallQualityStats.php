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
 * @phpstan-type CallQualityStatsShape = array{
 *   inbound?: Inbound|null, outbound?: Outbound|null
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
     * @param Inbound|array{
     *   jitter_max_variance?: string|null,
     *   jitter_packet_count?: string|null,
     *   mos?: string|null,
     *   packet_count?: string|null,
     *   skip_packet_count?: string|null,
     * } $inbound
     * @param Outbound|array{
     *   packet_count?: string|null, skip_packet_count?: string|null
     * } $outbound
     */
    public static function with(
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null
    ): self {
        $obj = new self;

        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $outbound && $obj['outbound'] = $outbound;

        return $obj;
    }

    /**
     * Inbound call quality statistics.
     *
     * @param Inbound|array{
     *   jitter_max_variance?: string|null,
     *   jitter_packet_count?: string|null,
     *   mos?: string|null,
     *   packet_count?: string|null,
     *   skip_packet_count?: string|null,
     * } $inbound
     */
    public function withInbound(Inbound|array $inbound): self
    {
        $obj = clone $this;
        $obj['inbound'] = $inbound;

        return $obj;
    }

    /**
     * Outbound call quality statistics.
     *
     * @param Outbound|array{
     *   packet_count?: string|null, skip_packet_count?: string|null
     * } $outbound
     */
    public function withOutbound(Outbound|array $outbound): self
    {
        $obj = clone $this;
        $obj['outbound'] = $outbound;

        return $obj;
    }
}
