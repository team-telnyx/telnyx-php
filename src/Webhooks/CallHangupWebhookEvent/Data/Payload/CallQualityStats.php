<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload\CallQualityStats\Inbound;
use Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload\CallQualityStats\Outbound;

/**
 * Call quality statistics aggregated from the CHANNEL_HANGUP_COMPLETE event. Only includes metrics that are available (filters out nil values). Returns nil if no metrics are available.
 *
 * @phpstan-type call_quality_stats = array{inbound?: Inbound, outbound?: Outbound}
 */
final class CallQualityStats implements BaseModel
{
    /** @use SdkModel<call_quality_stats> */
    use SdkModel;

    /**
     * Inbound call quality statistics.
     */
    #[Api(optional: true)]
    public ?Inbound $inbound;

    /**
     * Outbound call quality statistics.
     */
    #[Api(optional: true)]
    public ?Outbound $outbound;

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
        ?Inbound $inbound = null,
        ?Outbound $outbound = null
    ): self {
        $obj = new self;

        null !== $inbound && $obj->inbound = $inbound;
        null !== $outbound && $obj->outbound = $outbound;

        return $obj;
    }

    /**
     * Inbound call quality statistics.
     */
    public function withInbound(Inbound $inbound): self
    {
        $obj = clone $this;
        $obj->inbound = $inbound;

        return $obj;
    }

    /**
     * Outbound call quality statistics.
     */
    public function withOutbound(Outbound $outbound): self
    {
        $obj = clone $this;
        $obj->outbound = $outbound;

        return $obj;
    }
}
